<?php

namespace App\Controllers\Admin;

use App\Models\Guest;

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
        $guest = new Guest;
        $guest_count = $guest->where('created_at', '>', (time() - (86400 * 30)))->count();
        $guests = $guest->where('created_at', '>', (time() - (86400 * 30)))->select('*, COUNT(browser) as count')->groupBy('browser')->get();

        $browser_percent = [];
        foreach ($guests as $guest) @$browser_percent[$guest['browser']] += $guest['count'];
        foreach ($browser_percent as $key => $val) $browser_percent[$key] = ($val * 100) / count($browser_percent);

        return view('home.index', ['title' => _l('admin.pages.dashboard.index.title'), 'guests' => $guests, 'browser_percent' => $browser_percent, 'guest_count' => $guest_count], 'main');
    }
}
