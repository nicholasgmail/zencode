<?php

namespace App\Http\Livewire\Comments;

use App\Models\Commentators;
use App\Models\Options;
use App\Models\Urls;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;

class Index extends Component
{
    /**
     * все комментарии
     * @var $comments
     */
    public $comments;
    /**
     * все комментарии родительские
     * @var $comments
     */
    public $comments_parents;

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
            "avatar" => data_get($data, "url"),
            'mail' => data_get($data, "email")
        ]);
        $option = new Options(["text" => data_get($data, "text")]);
        $comment->save([$comment]);
        $options = $comment->options()->save($option);
        $all_comment = data_get($this->AllCollect($comment), "id_all");
        data_set($all_comment, "auth_id", auth()->id());
        if ($this->comment_id) {
            data_set($all_comment, "child_element", true);
        }
        $options->commentator()->sync([1 => [
            "commentators_id" => $comment->id,
            "geolocation_ip" => data_get($data, "geolocation_ip"),
            "all_comment" => collect($all_comment ?? "")->toJson(JSON_PRETTY_PRINT)
        ]]);
        $this->ParentСomment($comment->id);
        $this->mount();
        return "";
    }

    private function ParentСomment($id)
    {
        if ($this->comment_id) {
            $comment = $this->comments->find($this->comment_id);
            $all_collect = $this->AllCollect($comment);
            $id_all = data_get($all_collect, "id_all");
            $id_all = \Str::of($id_all . " | " . $id)->trim(" | ");
            data_set($all_comment, "id_all", $id_all);
            $comment->options()->first()->pivot->update(["all_comment" => collect($all_comment)->toJson(JSON_PRETTY_PRINT)]);
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
        $path = Str::replaceFirst('storage/', '/public/', $comment->avatar);
        Storage::delete($path);
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
        $this->comments_parents = $this->comments->filter(function ($v) {
            $all_collect = $this->AllCollect($v);
            return !data_get($all_collect, "child_element");
        });
    }

    private function AllCollect($comment)
    {
        return collect(json_decode($comment->options->first()->pivot->all_comment))->toArray();
    }

    public function render()
    {
        return view('livewire.comments.index');
    }
}
