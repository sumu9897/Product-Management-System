<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assign extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
  
    protected $guarded = [];

    protected $dates = ['created_at', 'updated_at'];

    public function createdBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }

    public function updatedBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\User', 'updated_by', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_serial');
    }
    public function products(){
        return $this->belongsTo('App\Models\Product');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    
   
}
