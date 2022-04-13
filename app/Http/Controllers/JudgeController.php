<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\Event;
use App\Models\Judge;

class JudgeController extends Controller
{
    /****************************************************************************************************
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'event' => 'numeric|required'
        ]);

        $judges = [];
        if($event = Event::find($request['event'])) {
            $judges = $event->judges;
        }

        return response([
            'judges' => $judges
        ]);
    }


    /****************************************************************************************************
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_id'    => 'numeric|required',
            'full_name'   => 'string|required',
            'is_chairman' => 'boolean|required',
            'photo'       => 'string|required',
            'username'    => 'string|required',
            'password'    => 'string|required'
        ]);

        $judge = Judge::create([
            'event_id'    => $request->event_id,
            'full_name'   => $request->full_name,
            'is_chairman' => $request->is_chairman,
            'photo'       => $request->photo,
            'username'    => $request->username,
            'password'    => Hash::make($request->password)
        ]);

        return response([
            'judge' => $judge
        ]);
    }


    /****************************************************************************************************
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return response([
            'judge' => Judge::find($id)
        ]);
    }


    /****************************************************************************************************
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'event_id'    => 'numeric|required',
            'full_name'   => 'string|required',
            'is_chairman' => 'boolean|required',
            'photo'       => 'string|required',
            'username'    => 'string|required',
            'password'    => 'string|required'
        ]);

        $judge = Judge::find($id);
        if($judge) {
            $judge->update([
                'event_id'    => $request->event_id,
                'full_name'   => $request->full_name,
                'is_chairman' => $request->is_chairman,
                'photo'       => $request->photo,
                'username'    => $request->username,
                'password'    => Hash::make($request->password)
            ]);
        }

        return response([
            'judge' => $judge
        ]);
    }


    /****************************************************************************************************
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $judge = Judge::find($id);
        if($judge) {
            $judge->delete();
        }

        return response([
            'deleted' => $judge
        ]);
    }
}
