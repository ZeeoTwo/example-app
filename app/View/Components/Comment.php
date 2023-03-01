<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Comment extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $comment;
    public $replies;
    public $depth;

    public function __construct($comment, $depth = 0)
    {
        //
        $this->comment = $comment;
        $this->replies = $comment->replies;
        $this->depth = $depth;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.comment');
    }
}
