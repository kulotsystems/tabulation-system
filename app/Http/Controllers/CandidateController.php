<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Candidate;
use App\Models\Event;

class CandidateController extends Controller
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

        $candidates = [];
        if($event = Event::find($request['event'])) {
            $candidates = $event->candidates;
        }

        return response([
            'candidates' => $candidates
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
            'event_id'  => 'numeric|required',
            'full_name' => 'string|required',
            'origin'    => 'string|required',
            'photo'     => 'string|required',
        ]);

        $candidate = Candidate::create([
            'event_id'  => $request->event_id,
            'full_name' => $request->full_name,
            'origin'    => $request->origin,
            'photo'     => $request->photo
        ]);

        return response([
            'candidate' => $candidate
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
            'candidate' => Candidate::find($id)
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
            'event_id'  => 'numeric|required',
            'full_name' => 'string|required',
            'origin'    => 'string|required',
            'photo'     => 'string|required',
        ]);

        $candidate = Candidate::find($id);
        if($candidate) {
            $candidate->update([
                'event_id'  => $request->event_id,
                'full_name' => $request->full_name,
                'origin'    => $request->origin,
                'photo'     => $request->photo
            ]);
        }

        return response([
            'candidate' => $candidate
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
        $candidate = Candidate::find($id);
        if($candidate) {
            $candidate->delete();
        }

        return response([
            'deleted' => $candidate
        ]);
    }
}
