<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
  use HasFactory, SoftDeletes;

  protected $table = 'customer';
  protected $fillable = [
    'user_id',
    'name',
    'phone',
    'rfc',
    'business_name',
    'postal_code',
    'general_regime',
  ];

  protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
