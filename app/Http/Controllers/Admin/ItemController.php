<?php

namespace App\Http\Controllers\Admin;

use App\Models\Item;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::paginate();
        return view('admin.items.index', compact('items'));
    }

    public function show(Item $item)
    {
        return view("admin.items.show", compact("item"));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.items.create');
    }

    public function store(Request $request)
    {
       
    
        return redirect()->route('items.index')->with('success', 'Item creato con successo!');
    
    }

    public function edit(Item $item)
    {
        return view("admin.items.edit", compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        
    
        return redirect()->route('items.index')->with('success', 'Item aggiornato con successo!');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index');
    }


}
