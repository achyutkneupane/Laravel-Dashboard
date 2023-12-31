<?php

namespace AchyutN\Dashboard\Livewire;

use Livewire\Component;

class Navbar extends Component
{
    public $title;
    public function mount($title)
    {
        $this->title = $title;
    }
    public function render()
    {
        return app('view')->make('dashboard::navbar');
    }
}
