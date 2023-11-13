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

    public function downloadLast()
    {
        $downloaded = File::where('file_type_id', 1)->orderBy('created_at', 'desc')->first();
        return $this->download($downloaded);
    }

    public function last()
    {
        return File::where('file_type_id', 1)->orderBy('created_at', 'desc')->first();
    }

}
