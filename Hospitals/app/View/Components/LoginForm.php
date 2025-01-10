<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LoginForm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $route ,public string $title , public string $id ,)
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.login-form');
    }
}
