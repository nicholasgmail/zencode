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
    public $comments;
    public $text;


    public function mount()
    {
        $this->name = $this->comment->name ?? "";
        $this->avatar = $this->comment->avatar ?? "";
        $this->option = $this->comment->options->first();
        $this->text = $this->option->text ?? "";
        $this->time = now()->parse($this->comment->created_at)->format('Y-m-d H:i:s');
        $this->comments = $this->comments->filter(function ($v) {
            $all_comment = collect(json_decode($this->comment->options->first()->pivot->all_comment))->toArray();
            $id = data_get($v, "id");
            return \Str::of(data_get($all_comment, "id_all"))->is("*$id*");
        });
    }

    public function remove($id)
    {
        $this->emitUp('removeCard', $id);
    }

    public function note($id)
    {
        $this->emitUp('noteCard', $id);
    }

    public function render()
    {
        return view('livewire.comments.component.card');
    }
}
