<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    private $model;

    public function __construct(Image $model)
    {
        $this->model = $model;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $imagens = $this->model->where('active', true)->orderBy('id')->get();

        return response()->json([
            'erro'      =>  false,
            'mensagem'  => 'Dados recuperados!',
            'dados'     => $imagens
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
        $request->validate([
            'imagem'    => 'required|image|max:2048'
        ]);

        $path = $request->file('imagem')->store('imagens', 'public');

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
}
