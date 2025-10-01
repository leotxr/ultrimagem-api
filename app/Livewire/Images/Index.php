<?php

namespace App\Livewire\Images;

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Models\Image;

class Index extends Component
{
    public $imagens = [];
    private $imagem = [];


    public function mount()
    {
        $controller = new ImageController();

        $response = $controller->index();

        $retorno = $response->getData();
        $this->imagens = $retorno->dados;
    }

    public function download(Image $baixada)
    {
        //implementar chamando o controller futuramente
        $this->imagem = $baixada;
        return Storage::disk('local')->download($this->imagem->path);
    }

    public function delete(Image $deleted)
    {
        $this->imagem = $deleted;
        Storage::disk('local')->delete($this->imagem->path);
        $this->imagem->delete();
        return redirect()->to('/imagens');
    }

    public function render()
    {
        return view('livewire.images.index');
    }
}
