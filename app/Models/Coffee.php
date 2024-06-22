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
    protected $fillable = ['name', 'location'];

    public function tables()
    {
        return $this->hasMany(Table::class);
    }

    public function shifts()
    {
        return $this->hasMany(Shift::class);
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'shifts');
    }
}
