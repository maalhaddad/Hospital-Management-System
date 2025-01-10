<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DataModal extends Component
{
    /**
     * Create a new component instance.
     */

     public $btntype;
    public function __construct(

        public $type,
        public $title,
        public $route,
        public $data = '',
    )
    {
        if ($type == 'delete') {

            $this->btntype='danger';
        }
        else
        {
            $this->btntype = 'primary';
        }


    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.data-modal');
    }
}
