<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lead;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LeadType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'active',
        'sendable'
    ];

    public function leads(): HasMany
    {
       return $this->hasMany(Lead::class);
    }
}
