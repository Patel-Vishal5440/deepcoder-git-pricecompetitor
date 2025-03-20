<?php

namespace App\View\Components\Panel\components\Sidebar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modules extends Component
{

    public function render(): View
    {
        return view('components.sidebar.modules');
    }
}
