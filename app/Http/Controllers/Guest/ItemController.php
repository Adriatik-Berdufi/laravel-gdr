<?php

namespace App\Http\Controllers\Guest;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::paginate();
        return view('guest.item', compact('items'));
    }
}
