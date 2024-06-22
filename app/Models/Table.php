<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    protected $fillable = ['number', 'coffee_id'];

    public function coffee()
    {
        return $this->belongsTo(Coffee::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
