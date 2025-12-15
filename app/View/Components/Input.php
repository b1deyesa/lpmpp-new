<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $label = null,
        public $type = 'text',
        public $id = null,
        public $name = null,
        public $placeholder = null,
        public $value = false,
    )
    {
        $this->label = $label;
        $this->type = $type;
        $this->id = $id ?? $name;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
