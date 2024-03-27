<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {
        $characters = Character::paginate();
        return view("characters.index", compact("characters"));
    }

    /**
     * Show the form for creating a new resource.
     *

     */
    public function create()
    {
        return view("characters.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     */
    public function store(Request $request)
    {
        $data = $request->all();
        $character = new Character();
        $character->fill($data);
        $character->save();
        return redirect()->route("characters.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Character  $character

     */
    public function show(Character $character)
    {
        return view("characters.show", compact("character"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Character  $character

     */
    public function edit(Character $character)
    {
        return view("characters.edit", compact('character'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Character  $character

     */
    public function update(Request $request, Character $character)
    {
        $data = $request->all();
        $character->update($data);
        return redirect()->route('characters.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Character  $character

     */
    public function destroy(Character $character)
    {
        //
    }
}
