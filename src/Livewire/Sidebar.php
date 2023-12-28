<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Sidebar extends Component
{
    public function render()
    {
        return app('view')->make('dashboard::sidebar');
    }
}
