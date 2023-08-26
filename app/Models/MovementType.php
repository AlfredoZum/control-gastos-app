<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MovementType extends Model
{
  use HasFactory, SoftDeletes;

  protected $table = 'movement_type';
  protected $fillable = [
    'name',
  ];

  protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
