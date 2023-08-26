<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EgressMovementClassification extends Model
{
  use HasFactory, SoftDeletes;
  
  protected $table = 'egress_movement_classification';
  protected $fillable = [
    'name',
  ];

  protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
