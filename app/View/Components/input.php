<?php

namespace App\View\Components;

use Illuminate\View\Component;

class input extends Component
{
    public string $show;
    public string $name;
    public string $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $show, string $name, string $type)
    {
        $this->name = $name;
        $this->show = $show;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input');
    }
}
