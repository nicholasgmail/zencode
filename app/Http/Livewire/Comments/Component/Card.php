<?php

namespace App\Http\Livewire\Comments\Component;

use Livewire\Component;

class Card extends Component
{
    public $name;
    public $avatar;
    public $option;
    public $time;
    public $comment;

    public function mount()
    {
        $this->name = $this->comment->name ?? "";
        $this->avatar = $this->comment->avatar ?? "";
        $this->created_at = $this->comment->created_at ?? "";
        $this->option = $this->comment->options ?? "";
    }

    public function render()
    {
        return view('livewire.comments.component.card');
    }
}
