<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $characters = Character::select(['id', 'type_id', 'name', 'description', 'strength', 'defence', 'speed', 'intelligence', 'life'])
            ->with(['type:id,name,image,description', 'items:id,name,dice_num,dice_faces,damege'])
            ->paginate(8);

        return response()->json($characters);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $characters = Character::select(['id', 'type_id', 'name', 'description', 'strength', 'defence', 'speed', 'intelligence', 'life'])
            ->where('id', $id)
            ->with(['type:id,name,image,description', 'items:id,name,dice_num,dice_faces,damege'])
            ->first();

        return response()->json($characters);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
