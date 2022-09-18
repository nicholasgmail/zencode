<?php

namespace App\Http\Livewire\Comments\Component;

use App\Models\Commentators;
use Livewire\Component;

class Form extends Component
{
    public $name;
    public $comment;
    public $comment_text;
    public $mail;

    public function save()
    {
        $comments = new Commentators([
            'name' => $this->name,
            'mail' => $this->mail
        ]);
        $comments->save();
    }

    public function updated()
    {
        $this->name = "";
        $this->mail = "";
    }

    public function render()
    {
        return view('livewire.comments.component.form');
    }
}
