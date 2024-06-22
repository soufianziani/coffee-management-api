<?php

namespace App\Models;

use App\Models\Shift;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coffee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'locations'
    ];

    public function Shift(): HasMany
    {
        return $this->hasMany(Shift::class);
    }

}
