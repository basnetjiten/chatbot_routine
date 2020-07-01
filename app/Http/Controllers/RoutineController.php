<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\Models\Routine;
use App\MyRoutine;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RoutineController extends Controller
{
    public function storeRoutine(Request $request)
    {


        try {
            $this->validate($request, [
                'day' => 'required|string|max:191',
                'time' => 'required|string|max:191',
                'class_type' => 'required|string|max:191',
                'module_code' => 'required|string|max:191',
                'module_title' => 'required|string|max:191',
                'lecturer' => 'required|string|max:191',
                'group' => 'required|string|max:191',
                'block' => 'required|string|max:191',
                'room' => 'required|string|max:191'
            ]);
        } catch (ValidationException $e) {
        }

        $routine = Routine::create([
            'day' => $request['day'],
            'time' => $request['time'],
            'class_type' => $request['class_type'],
            'module_code' => $request['module_code'],
            'module_title' => $request['module_title'],
            'lecturer' => $request['lecturer'],
            'group' => $request['group'],
            'block' => $request['block'],
            'room' => $request['room'],


        ]);
    }

    public function sendRequestedRoutine(Request $request)
    {

        $id = Routine::where('group', $request->message)->first()->id;

        $myroutine =
            MyRoutine::updateOrCreate(['user_id' => auth()->user()->id],
                ['routine_code' => $id,
                    'user_id' => auth()->user()->id,
                    'receiverid' => $request->id]);
            if($myroutine){

                $columns = ['routines.*', 'myroutine.receiverid'];
                $requestedRoutine = Routine::select($columns)
                    ->leftJoin('my_routines as myroutine', 'routines.id', '=', 'myroutine.routine_code')
                    ->where('receiverid', $request->id)
                    ->get();
                $jsonRoutine = $requestedRoutine[0]->toJson();
                $finalRoutine = json_decode($jsonRoutine);

                if ($finalRoutine != null) {
                    broadcast(new ChatEvent($finalRoutine))->toOthers();
                    return ['status' => 'success'];
                }
            }




    }

    public function myRoutine(Request $request)
    {

        $routineId = MyRoutine::where('receiverid', $request->id)->first()->routine_code;
        return Routine::find($routineId);
    }
}
