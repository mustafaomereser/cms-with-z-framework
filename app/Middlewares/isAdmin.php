<?php

namespace App\Middlewares;

use Core\Facedas\Auth;

class IsAdmin
{
    public function __construct()
    {
        if (!Auth::check()) return false;
        if (Auth::user()['priv'] == 1) return true;
        return false;
    }

    // (optional) if you don't need that, you can remove. !!! BUT if you use that middleware in Routes you need this.
    public function error()
    {
        abort(403);
    }
}
