<?php namespace ThreeAccents\Pages\Http\Controllers;

use ThreeAccents\Core\Http\Controllers\Controller;

class PageController extends Controller
{
    public function getHome()
    {
        return view('pages.home');
    }
}