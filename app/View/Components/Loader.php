<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Loader extends Component
{
    // public $target;

    public function __construct()
    {
        // $this->target = $target;
    }

    public function render(): View
    {
        return view('components.loader');
    }
}
