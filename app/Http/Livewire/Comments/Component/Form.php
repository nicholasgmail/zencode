<?php

namespace App\Http\Livewire\Comments\Component;

use App\Models\Commentators;
use App\Models\Options;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    public $name;
    public $comment;
    public $comment_text;
    public $email;
    public $host;
    public $photoFile;
    public $url;

    public function mount()
    {
        $this->host = \Request::getHost();
    }

    public function save()
    {
        $this->validatePhoto();
        $data = \Arr::wrap([
            'name' => $this->name,
            'mail' => $this->email,
            "text" => $this->comment_text,
            "url" => $this->url,
            "geolocation_ip" => $this->host,
            "all_comment" => collect(["id_all" => "text"])->toJson(JSON_PRETTY_PRINT)
        ]);

        $this->emit('updCard', $data);
        return $this->new();
    }

    /**
     * проверка картинки
     * @return array|void
     */
    public function validatePhoto()
    {
        $validatedData = Validator::make(
            ['name' => $this->name],
            ['name' => "required|max:64"],
            ['required' => '🖊️ заполнени',
                'max' => '🖊️ длинное не больше 64 символа']
        )->validate();

        $validatedData = Validator::make(
            ['email' => $this->email],
            ['email' => "required|email|regex:/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/"],
            ['required' => '🖊️ нужен email',
                'email' => '🖊️ упс не похож',
                'regex' => '🖊️ не отвечает формату']
        )->validate();

        $validatedData = \Validator::make(
            ['photoFile' => $this->photoFile],
            ['photoFile' => "required|file|image|mimes:jpg|max:1024"],
            ['required' => '📷 Выберете файл',
                'file' => '📷 Выберете файл в формате jpg',
                'image' => '📷 Должна быть картинка jpg',
                'mimes' => '📷 Картинка не в jpg формате',
                'max' => '📷 Не более 1Мб'],
        )->validate();
        $this->url = Storage::url($this->photoFile->store('public/avatar'));
    }

    public function new()
    {
        $this->name = "";
        $this->email = "";
        $this->comment_text = "";
        $this->photoFile = null;
    }

    public function render()
    {
        return view('livewire.comments.component.form');
    }
}
