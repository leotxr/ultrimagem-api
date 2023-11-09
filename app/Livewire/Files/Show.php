<?php

namespace App\Livewire\Files;

use Livewire\Component;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class Show extends Component
{
    public $files;
    public File $downloaded;

    public File $deleted;

    public function mount()
    {
        $this->files = File::all();
    }

    public function download(File $downloaded)
    {
        $this->downloaded = $downloaded;
        return Storage::disk('local')->download($this->downloaded->path);
    }

    public function delete(File $deleted)
    {
    $this->deleted = $deleted;
    Storage::disk('local')->delete($this->deleted->path);
    $this->deleted->delete();
        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.files.show');
    }
}
