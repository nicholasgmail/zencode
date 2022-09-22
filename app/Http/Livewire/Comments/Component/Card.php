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
    public $text;

    public function mount()
    {
        $this->name = $this->comment->name ?? "";
        $this->avatar = $this->comment->avatar ?? "";
        $this->option = $this->comment->options->first();
        $this->text = $this->option->text ?? "";
        $this->time = now()->parse($this->comment->created_at)->format('Y-m-d H:i:s');
    }

    public function render()
    {
        return view('livewire.comments.component.card');
    }
}
