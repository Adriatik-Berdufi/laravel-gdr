<?php

namespace App\Http\Controllers\Admin;

use App\Models\Item;
use App\Http\Controllers\Controller;

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
}
