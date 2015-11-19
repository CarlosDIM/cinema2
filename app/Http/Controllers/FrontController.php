<?php

namespace cinema\Http\Controllers;

use Illuminate\Http\Request;
use cinema\Http\Requests;
use cinema\Http\Controllers\Controller;

class FrontController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index(){
        return view('index');
    }

    public function contacto(){
        return view('contacto');
    }

    public function reviews(){
        return view('reviews');
    }

    public function admin(){
        return view('admin.index');
    }
}
