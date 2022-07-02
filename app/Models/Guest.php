<?php

namespace App\Models;

use Core\Abstracts\Model;

class Guest extends Model
{
    public $table = "guests";

    public function record()
    {
        $browser = getBrowser();
        $try = $this->where('ip', '=', ip())->where('created_at', '>', (time() - 86400))->where('browser', '=', $browser['name'])->where('device', '=', $browser['platform'])->first(true);
        if (!isset($try->id)) $this->insert([
            'ip' => ip(),
            'browser' => $browser['name'],
            'ub_browser' => $browser['ub'],
            'device' => $browser['platform']
        ]);
    }

    public function getAttributes()
    {
        return [$this->attributes, $this->attrCount];
    }
}
