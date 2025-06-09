<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Apartment extends Model
{
    /** @use HasFactory<\Database\Factories\ApartmentFactory> */
    use HasFactory;

    public function mainTenant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'main_tenant_id');
    }

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }
}
