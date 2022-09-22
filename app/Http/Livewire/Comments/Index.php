<?php

namespace App\Http\Livewire\Comments;

use App\Models\Commentators;
use Livewire\Component;

class Index extends Component
{
    /**
     * все комментарии
     * @var $comment
     */
    public $comments;
    public $comments_new;

    /**
     * обновляем комментарии
     * @var string[]
     */
    protected $listeners = ['updCard' => "allComments"];

    public function allComments($isTru)
    {
        if ($isTru) {
            $this->comments->fresh();
            return $this->mount();
        }
    }

    public function mount()
    {
        $this->comments_new = $this->comments;
    }

    /*public function updatedComments()
    {
        return $this->comments->fresh();
    }*/

    public function render()
    {
        return view('livewire.comments.index');
    }
}
