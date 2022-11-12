<?php

namespace InnovaCondomi\Http\Controllers;

use InnovaCondomi\Http\Requests;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getAdminHome(){
        //dd(Request::capture());
        \Session::put('contextoAp.tipoMenu','admin');
        //$resp = Request::is('com.orgs.*');
        //dd();
        return view('home_admin');
    }
}
