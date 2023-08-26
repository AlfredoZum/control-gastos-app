<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IncomeMovementClassification extends Model
{
  use HasFactory, SoftDeletes;
  
  protected $table = 'income_movement_classification';
  protected $fillable = [
    'name',
  ];

  protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
