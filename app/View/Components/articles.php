<?php

namespace App\View\Components;

use Illuminate\View\Component;

class articles extends Component
{

    // 列表标题
    public $title;

    // 前五个列表内容
    public $list;

    // 链接
    public $urls;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $list)
    {
        $this->title = $title;
        $this->list = $list;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.articles');
    }
}
