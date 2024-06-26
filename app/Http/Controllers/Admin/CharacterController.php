<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Character;
use App\Models\Item;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {
        $characters = Character::paginate(10);
        return view("admin.characters.index", compact("characters"));
    }

    /**
     * Show the form for creating a new resource.
     *

     */
    public function create()
    {
        return view("admin.characters.create");
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
        return view("admin.characters.show", compact("character"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Character  $character

     */
    public function edit(Character $character)
    {
        return view("admin.characters.edit", compact('character'));
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
        return redirect()->route('characters.show', compact('character'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Character  $character

     */
    public function destroy(Character $character)
    {
        $character->delete();
        return redirect()->route('characters.index');
    }
}
