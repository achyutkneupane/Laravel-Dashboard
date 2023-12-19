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
        return view('dashboard.link1');
    }
}