<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'serial',
    'price',
    'model',
    'status',
    'document',
    'SBU',
    'capacity',
    'description',
    'Purchase_Date',
    'P_WG',
  ];

  public function assign()
  {
    return $this->belongsTo(Assign::class);
  }

  public function getDocumentUrlAttribute()
  {
    return $this->document
        ? Storage::disk('public')->url('documents/' . $this->document)
        : null;
  }
}
