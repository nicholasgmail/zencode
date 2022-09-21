<?php

namespace App\Http\Livewire\Comments;

use Livewire\Component;

class Index extends Component
{
    /**
     * все комментарии
     * @var $comment
     */
    public $comments;

    public function render()
    {
        return view('livewire.comments.index');
    }
}
