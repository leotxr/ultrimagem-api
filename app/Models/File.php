<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FileType;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'path',
        'hash',
        'file_type_id'
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(FileType::class, 'file_type_id', 'id');
    }
}
