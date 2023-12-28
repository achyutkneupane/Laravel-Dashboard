<?php

namespace AchyutN\Dashboard\Livewire;

use Livewire\Component;

class Sidebar extends Component
{
    public function render()
    {
        return app('view')->make('dashboard::sidebar');
    }
}
