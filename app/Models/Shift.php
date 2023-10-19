<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Shift extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_serial',
        'Now_SBU',
        'Shift_Date',
        'Shift_by',
      ];



      protected $guarded = [];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_serial', 'serial');
    }
}
