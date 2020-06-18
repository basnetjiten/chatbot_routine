<?php

namespace App\Http\Controllers;

use App\Models\Streamer;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{

    public function transaction()
    {

        $transaction = Transaction::where('streamer_id', ChartController::getStreamer())
            ->whereNotNull('token')->get();

        return $transaction;
    }

    public function donors()
    {

        $columns = ['transactions.*', 'donor.name'];
        $transaction = Transaction::select($columns)
            ->Join('donors as donor', 'transactions.donor_id', '=', 'donor.id')
            ->where('transactions.streamer_id', ChartController::getStreamer())
            ->whereNotNull('transactions.token')
            ->get();


        return $transaction->paginate(5);


    }

    public function transpage()
    {

        return Transaction::latest()->paginate(3);


    }

    public function getStreamer()
    {
        $userId = Auth::user()->id;
        return Streamer::where('user_id', $userId)->first()->id;

    }

}