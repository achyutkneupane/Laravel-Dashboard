<?php

namespace AchyutN\Dashboard\Controllers;

use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    /**
     * Link1
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function link1(): \Illuminate\Contracts\Support\Renderable
    {
        return app('view')->make('dashboard::link1');
    }
}