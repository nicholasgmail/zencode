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
    public $host;

    public function mount()
    {
        $this->host = \Request::getHost();
    }

    public function save()
    {
        $comment = new Commentators([
            'name' => $this->name,
            'mail' => $this->mail
        ]);
        $option = new Options(["text" => $this->comment_text]);
        $comment->save([$comment]);
        $options = $comment->options()->save($option);
        $options->commentator()->sync([1 => ["commentators_id" => $comment->id, "geolocation_ip" => $this->host,
            "all_comment" => collect(["id_all" => "text"])->toJson(JSON_PRETTY_PRINT)]]);
        $this->emit('updCard', true);
        return $this->new();
    }

    public function new()
    {
        $this->name = "";
        $this->mail = "";
        $this->comment_text = "";
    }

    public function render()
    {
        return view('livewire.comments.component.form');
    }
}
