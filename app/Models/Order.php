<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'status', 'table_id', 'note', 'total', 'employee_id', 'mode'];

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function orderItems()
    {
        return $this->hasMany(Order_items::class);
    }

}
