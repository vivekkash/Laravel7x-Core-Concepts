<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Post;

class posts extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title;
    public $data;

    public function __construct($title,$data)
    {
        $this->title = $title;
        $this->data = $data;
    }

    public function posts(){

        return Post::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.posts');
    }
}
