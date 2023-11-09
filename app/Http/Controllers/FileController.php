<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        return File::orderBy('created_at', 'desc')->get();
    }

    public function show(File $file)
    {
        return $file;
    }

    public function download(File $file)
    {
        $downloaded = $file;
        return Storage::disk('local')->download("$downloaded->path", $downloaded->title . '.pdf');
    }

}
