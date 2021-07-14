<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function persona(){
        return view('persona');
    }
    public function estado(){
        return view('estado');
    }
    public function usuario(){
        return view('auth.register');
    }
    public function usuarios(){
        return view('auth.view');
    }
    public function info(){
        return view('información');
    }
}
