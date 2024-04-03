<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
  public function index()
  {
    $title = "Team 5";
    return view('guest.home', compact('title'));
  }
}
