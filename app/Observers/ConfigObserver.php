<?php

namespace App\Observers;

use App\Models\Config;
use Illuminate\Filesystem\Cache;

class ConfigObserver
{

    public function created()
    {
        $this -> saveConfigToCache();

    }

    public function updated()
    {
        $this -> saveConfigToCache();
    }

    private function saveConfigToCache()
    {

        \Cache ::forever('config_cache', Config ::pluck('data', 'name'));
    }

}
