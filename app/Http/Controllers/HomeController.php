<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //https://www.youtube.com/watch?v=YefFZ-nyASo&list=PL1JpS8jP1wgC8Uud_DKhL3jAtcPzeQ9pn&index=4
    public function __construct()
    {
        return $this->middleware('auth')->except(['index']);
    }

    public function index()
    {
        return view('home.index');
    }
}
