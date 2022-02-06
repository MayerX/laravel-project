<?php

namespace App\View\Components;

use Illuminate\View\Component;

class articels extends Component
{

    // 列表标题
    public $title;

    // 前五个列表内容
    public $list;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.articels');
    }
}
