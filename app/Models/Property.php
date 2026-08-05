<?php

namespace App\Models;

use Database\Factories\PropertyFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Property extends Model
{
    /**
     * @use HasFactory<PropertyFactory>
     */
    use HasFactory;

    /* Which attributes can be set during the creation */
    protected $fillable = ['name', 'description', 'price', 'capacity', 'owner_id'];

    /* By default, everything is a string, so I have to present the true type */
    protected $casts = [
        'price' => 'decimal:2',
        'capacity' => 'integer',
        'validated' => 'boolean',
    ];

    /* Relation to user */
    /**
     @return BelongsTo<User, $this>
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /* Scope to filter validated properties */
    /**
     @param Builder<self> $query
     * @return Builder<self>
     */
    public function scopeValidated(Builder $query): Builder
    {
        return $query->where('validated', true);
    }

    /* Scope to filter unvalidated properties */
    /**
     @param Builder<self> $query
     * @return Builder<self>
     */
    public function scopeUnvalidated(Builder $query): Builder
    {
        return $query->where('validated', false);
    }
}
