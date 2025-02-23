<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    protected $fillable = ['name'];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function scopeForUser(Builder $query): Builder
    {
        return $query->where('name', 'user');
    }

    public static function userRole(): self
    {
        return self::forUser()->first() ?? self::create(['name' => 'user']);
    }
}
