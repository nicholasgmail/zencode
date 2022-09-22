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

    public function mount()
    {
        /*$this->comments->first()->options->first()->commentinfo()->save(collect([1 => ['geolocation_ip' => "192.168.1.1"],
            2 => ['comment_all' => collect(['id_all' => "1 | 2"])->toJson(JSON_PRETTY_PRINT)]])->toArray());*/
    }

    public function render()
    {
        return view('livewire.comments.index');
    }
}
