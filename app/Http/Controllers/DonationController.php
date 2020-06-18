<?php

namespace App\Http\Controllers;

use App\Events\DonationAlertEvent;
use App\Jobs\ProcessDonation;
use App\Models\Donor;
use App\Models\Streamer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\Models\Transaction;

class DonationController extends Controller
{
    public function donationForm($slug)
    {

        $data['streamer'] = [];
        $value = DB::table('users')->where('username', '=', $slug)->get();

        if (!$value->isEmpty()) {
            $user = $value[0];
            array_push($data['streamer'], [
                'id' => $user->id,
                'username' => $user->username,
                'photo' => asset('img/profile/' . $user->photo)
            ]);
            return view('donation')->with('streamer', $data['streamer']);
        } else {
            abort(404);
        }


    }

    public function proceedPayment(Request $request)
    {
        //STREAMER ID FROM PAYMENT FORM
        $userId = ($request["userId"]);

        $streamerId = Streamer::where('user_id', $userId)->first()->id;

        try {
            $this->validate($request, [
                'name' => 'required|string|max:191',
                'email' => 'required|string|email|max:191|',
                'phone' => 'required|numeric|min:14',
                'amount' => 'required|numeric|min:4',
                'message' => 'required|string|min:10',
            ]);
        } catch (ValidationException $e) {
        }


        $donor = Donor::firstOrCreate(
            [
                'email' => $request['email']
            ], [
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
        ]);

        if ($donor->id != null) {


            $transaction = Transaction::create([
                'amount' => $request['amount'],
                'message' => $request['message'],
                'donor_id' => $donor->id,
                'streamer_id' => $streamerId,
            ]);

            if ($transaction->donor_id != null) {


                //remove amount when using this test && add when not
                $currentTransByDonorForStreamer = Transaction::where("id", $transaction->id)->where("donor_id", $donor->id)->where("streamer_id", $streamerId)->first();

                /*                dd($currentTransByDonorForStreamer->streamer->email);*/
                //event(new DonationAlertEvent($currentTransByDonorForStreamer));
                // ProcessDonation::dispatch($currentTransByDonorForStreamer)->onConnection(env('QUEUE_CONNECTION'))->onQueue(env('SQS_QUEUE'))->delay(now()->addSecond(10));
                //dd($currentTransByDonorForStreamer->streamer->id);
                //dd( $currentTransByDonorForStreamer);

                ProcessDonation::dispatch($currentTransByDonorForStreamer)->onConnection(env('QUEUE_CONNECTION'))->onQueue(env('SQS_QUEUE'))->delay(now()->addSecond(10));

                return response()->json($currentTransByDonorForStreamer);
            }
        }
    }


    public function donationAlertLink($slugToken)
    {

        $streamerParam = Streamer::where('alert_link', $slugToken)->first();

        if ($streamerParam != null) {

            $path = asset('moneyalert.mp3');
            $streamer = $streamerParam->user_id;

            return view('donationmaster')->with(compact('path', 'streamer'));

        } else {
            abort(404);
        }
    }


    public function updateSuccessTransaction(Request $request)
    {
        //get last entry of user with $requested phone number
        //update transaction with the token and success field
        $columns = ['transactions.*', 'donor.name'];
        $transaction = Transaction::select($columns)
            ->leftJoin('donors as donor', 'transactions.donor_id', '=', 'donor.id')
            ->where('donor.phone', $request["mobile"])
            ->orWhere('donor.email', $request["mobile"])
            ->latest('transactions.created_at')
            ->first();

        $transaction->token = $request["idx"];
        $transaction->phone = $request["mobile"];
        $transaction->donation_statue = 'verified';
        $saved = $transaction->save();


        // event(new DonationAlertEvent($transaction));
        // ProcessDonation::dispatch($transaction)->onConnection(env('QUEUE_CONNECTION'));
        if ($saved) {
            ProcessDonation::dispatch($transaction)->onConnection(env('QUEUE_CONNECTION'))->onQueue(env('SQS_QUEUE'))->delay(now()->addSecond(20));

        }


    }


}
