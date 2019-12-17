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
        // notify()->success('Welcome to Laravel Notify ⚡️');
        // connectify('success', 'Connection Found', 'Success Message Here');
        // drakify('success');
        // drakify('error');
        // smilify('success', 'You are successfully reconnected');
        // emotify('success', 'You are awesome, your data was successfully created');

        return view('home');
    }
}
