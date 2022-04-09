<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Portion;

class PortionController extends Controller
{
    /****************************************************************************************************
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response([
            'portions' => Portion::all()
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
            'title'       => 'string|required',
            'description' => 'string|nullable'
        ]);

        $portion = Portion::create([
            'event_id'    => $request->event_id,
            'title'       => $request->title,
            'description' => $request->description,
        ]);

        return response([
            'portion' => $portion
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
            'portion' => Portion::find($id)
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
            'title'       => 'string|required',
            'description' => 'string|nullable'
        ]);

        $portion = Portion::find($id);
        if($portion) {
            $portion->update([
                'event_id'    => $request->event_id,
                'title'       => $request->title,
                'description' => $request->description,
            ]);
        }

        return response([
            'portion' => $portion
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
        $portion = Portion::find($id);
        if($portion) {
            $portion->delete();
        }

        return response([
            'deleted' => $portion
        ]);
    }
}
