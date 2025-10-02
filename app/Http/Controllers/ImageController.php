<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    private $model;

    public function __construct($model = null)
    {
        $this->model = $model ?? new Image();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $imagens = $this->model->where('active', true)->orderBy('id')->get();

        dd($imagens);

        foreach ($imagens as $imagem) {
            $retornoImagens = [
                'id'        =>  $imagem['id'],
                'image'     =>  asset('storage/' . $imagem['path']),
                'mobile'    =>  $imagem['mobile']
            ];
        }


        return response()->json([
            'erro'      =>  false,
            'mensagem'  => 'Dados recuperados!',
            'dados'     => $retornoImagens
        ], 201);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //teste
        $request->validate([
            'imagem'    => 'required|image|max:202400'
        ]);

        $path = $request->file('imagem')->store('files', 'public');

        if (!$path) {
            return response()->json([
                'erro'      => true,
                'mensagem'  => 'Ocorreu um erro ao salvar a imagem.',
                'dados'   => $path
            ], 400);
        }

        $created = $this->model->create([
            'title'     =>  $request->descricao ?? $path,
            'path'      =>  $path,
            'mobile'    =>  $request->mobile ?? false,
            'active'    =>  $request->ativo ?? true
        ]);

        if (!$created) {
            return response()->json([
                'erro'      => true,
                'mensagem'  => 'Ocorreu um erro ao salvar a imagem!',
                'dados'     => $created
            ], 201);
        }


        return response()->json([
            'erro'      =>  false,
            'mensagem'  => 'Imagem salva com sucesso!',
            'dados'     => $created
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!$id) {
            return response()->json([
                'erro'      =>  false,
                'mensagem'  => 'Informe o ID da imagem',
                'dados'     => []
            ], 400);
        }

        $imagem = $this->model->find($id);

        if (!$imagem) {
            return response()->json([
                'erro'      =>  false,
                'mensagem'  => 'Imagem não encontrada',
                'dados'     => []
            ], 404);
        }

        return response()->json([
            'erro'      =>  false,
            'mensagem'  => 'Imagem encontrada com sucesso!',
            'dados'     => $imagem
        ], 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getMobileImages(Request $request)
    {
        $imagens = $this->model->where('mobile', true)->where('active', true)->get();

        return response()->json([
            'erro'      =>  false,
            'mensagem'  => 'Imagens encontradas com sucesso!',
            'dados'     => $imagens
        ], 201);
    }

    public function getDesktopImages(Request $request)
    {
        $imagens = $this->model->where('mobile', false)->where('active', true)->get();

        return response()->json([
            'erro'      =>  false,
            'mensagem'  => 'Imagens encontradas com sucesso!',
            'dados'     => $imagens
        ], 201);
    }

    public function download($id) {}
}
