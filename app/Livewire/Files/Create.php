<?php

namespace App\Livewire\Files;

use App\Models\File;
use App\Models\FileType;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;

class Create extends Component
{
    use WithFileUploads;

    #[Rule('mimes:pdf,jpg,png')]
    public $file;
    public $saving;
    public $title;
    public $type_id;
    public $type;

    protected $rules = [
        'title' => 'required',
        'type_id' => 'required',
        'file' => 'required|max:10240',
    ];

    public function save()
    {
        $path = $this->file->store('files/' . $this->type_id);
        $this->saving = new File();
        $this->saving->title = $this->title;
        $this->saving->path = $path;
        $this->saving->file_type_id = $this->type_id;
        if ($this->saving->save())
            return redirect('files');
        else return redirect()->back();
    }

    public function render()
    {
        return view('livewire.files.create', ['types' => FileType::all()]);
    }
}
