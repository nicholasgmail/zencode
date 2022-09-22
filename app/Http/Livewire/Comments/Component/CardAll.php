<?php

namespace App\Http\Livewire\Comments\Component;

use Livewire\Component;

class CardAll extends Component
{
    public $list_comments;
    public $comments;
    //комментарий на коментарий
    public $comment_all;

    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.comments.component.card-all');
    }
}
