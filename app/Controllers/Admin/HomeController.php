<?php

namespace App\Controllers\Admin;

class HomeController
{
    public function __construct()
    {
        // Set models here (suggestion)
        // $this->user = new User();
        // $this->user->where('id', '=', 1)->first();
    }

    public function index()
    {
        return view('home.index', ['title' => _l('admin.pages.dashboard.index.title')], 'main');
    }
}
