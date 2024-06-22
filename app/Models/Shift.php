<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shift extends Model
{
    use HasFactory;
    protected $fillable = [
        'coffee_id',
        'employee_id',
        'start_time',
        'end_time'
    ];
    public function Coffee(){
        return $this->belongsTo(Coffee::class);
        }
    public function Employee(){
        return $this->belongsTo(Employee::class);
        }
}
