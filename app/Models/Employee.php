<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function shifts()
    {
        return $this->hasMany(Shift::class);
    }

    public function coffees()
    {
        return $this->belongsToMany(Coffee::class, 'shifts');
    }
}
