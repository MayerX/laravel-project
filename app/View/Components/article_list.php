<?php

namespace App\View\Components;

use Illuminate\View\Component;

class article_list extends Component
{

    // 列表标题
    public string $title;

    // 前五个列表内容
    public array $list;

    // 链接
    // public string $urls;

    /**
     * Create a new component instance.
     * @param $title
     * @param $list
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
        return view('components.article_list');
    }
}
