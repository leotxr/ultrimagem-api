<?php

namespace App\Livewire\Images;

use App\Http\Controllers\ImageController;
use App\Models\Image;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    protected $imageController;
    public $saving;
    public $title;
    public $mobile;
    public $file;

    public function mount()
    {
        $this->imageController = new ImageController();
    }

    public function salvar()
    {
        //teste
        $path = $this->file->store('files', 'public');
        $this->saving = new Image();
        $this->saving->title = $this->title;
        $this->saving->path = $path;
        $this->saving->mobile = $this->mobile;
        $this->saving->active = true;
        if ($this->saving->save())
            return redirect('imagens');
        else return redirect()->back();
    }

    public function render()
    {
        return view('livewire.images.create');
    }
}
