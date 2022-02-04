<?php

namespace App\View\Components;

use Illuminate\View\Component;

class intro extends Component
{

    // 文章标题
    public $title;

    // 文章内容
    public $message;

    // 图片路径
    public $imageSrc;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $message, $imageSrc)
    {
        $this->title = $title;
        $this->message = $message;
        $this->imageSrc = $imageSrc;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.intro');
    }
}
