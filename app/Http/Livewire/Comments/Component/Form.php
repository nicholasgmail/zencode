<?php

namespace App\Http\Livewire\Comments\Component;

use App\Models\Commentators;
use App\Models\Options;
use Livewire\Component;

class Form extends Component
{
    public $name;
    public $comment;
    public $comment_text;
    public $mail;

    public function save()
    {
        $comment = new Commentators([
            'name' => $this->name,
            'mail' => $this->mail
        ]);
        $option = new Options(["text" => $this->comment_text, "like" => 0, "hash_tag" => ""]);
        $comment->save([$comment]);
        $comment->options()->save($option);
    }

    public function updated()
    {

    }

    public function render()
    {
        return view('livewire.comments.component.form');
    }
}
