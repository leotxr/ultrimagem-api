<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\LeadType;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'active',
        'sendable',
        'lead_type_id'
    ];

    public function leadType(): BelongsTo
    {
       return $this->belongsTo(LeadType::class, 'lead_type_id', 'id');
    }
}
