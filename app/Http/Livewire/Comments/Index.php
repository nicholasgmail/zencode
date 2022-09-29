<?php

namespace App\Http\Livewire\Comments;

use App\Models\Commentators;
use App\Models\Options;
use Livewire\Component;

class Index extends Component
{
    /**
     * все комментарии
     * @var $comments
     */
    public $comments;

    /**
     * переключение модального окна
     * @var $isDialogOpen
     */
    public $isDialogOpen;

    /**
     * комментарий к тексту
     * @var $isDialogOpen
     */
    public $comment_id;

    /**
     * обновляем комментарии
     * @var string[]
     */
    protected $listeners = [
        'updCard' => "allComments",
        'noteCard' => "noteComment",
        'removeCard' => "removeComment",
    ];

    public function boot()
    {
        $this->isDialogOpen = false;
    }

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
            "geolocation_ip" => data_get($data, "geolocation_ip")
        ]]);
        $this->ParentСomment($comment->id);
        $this->mount();
        return "";
    }

    private function ParentСomment($id)
    {
        if ($this->comment_id) {
            $comment = Commentators::find($this->comment_id);
            $id_all = data_get(json_decode($comment->options->first()->pivot->get("all_comment")), "id_all");
            $id_all = \Str::of($id_all . " | " . $id)->trim(" | ");
            $comment->options()->first()->pivot->update(["all_comment" => collect(["id_all" => $id_all])->toJson(JSON_PRETTY_PRINT)]);
        }
        $this->isDialogOpen = false;
    }

    public function noteComment($id)
    {
        $this->comment_id = $id;
        $this->isDialogOpen = !$this->isDialogOpen;
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
        $this->comment_id = false;
        $this->comments = Commentators::get();
    }

    public function render()
    {
        return view('livewire.comments.index');
    }
}
