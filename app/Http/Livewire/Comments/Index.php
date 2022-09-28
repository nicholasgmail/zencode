<?php

namespace App\Http\Livewire\Comments;

use App\Models\Commentators;
use App\Models\Options;
use Livewire\Component;

class Index extends Component
{
    /**
     * все комментарии
     * @var $comment
     */
    public $comments;

    /**
     * обновляем комментарии
     * @var string[]
     */
    protected $listeners = [
        'updCard' => "allComments",
        'noteCard' => "noteComment",
        'removeCard' => "removeComment",
    ];

    public function allComments($data)
    {
        $comment = new Commentators([
            'name' => data_get($data, "name"),
            'mail' => data_get($data, "mail")
        ]);
        $option = new Options(["text" => data_get($data, "text")]);
        $comment->save([$comment]);
        $options = $comment->options()->save($option);
        $options->commentator()->sync([1 => [
            "commentators_id" => $comment->id,
            "geolocation_ip" => data_get($data, "geolocation_ip"),
            "all_comment" => data_get("all_comment", collect(["id_all" => "text"])->toJson(JSON_PRETTY_PRINT))]]);
        $this->mount();
        return "";
    }

    public function noteComment($id)
    {
        dd($id);
    }

    public function removeComment($id)
    {
        $comment = Commentators::find($id);
        $options = $comment->options();
        $options->delete();
        $options->detach();
        $comment->delete();
        return $this->mount();
    }

    public function mount()
    {
        $this->comments = Commentators::get();
    }

    public function render()
    {
        return view('livewire.comments.index');
    }
}
