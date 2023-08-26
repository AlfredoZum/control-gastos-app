<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movement extends Model
{
  use HasFactory, SoftDeletes;

  protected $table = 'movement';

  public static function getMovementByUser($userId)
  {
    try {
      $movements = DB::table('movement')
        ->join('movement_type', 'movement.movement_type_id', '=', 'movement_type.id')
        ->select('movement.*', 'movement_type.name AS movement_type_name')
        ->where('user_id', $userId)
        ->get();
      return [
        "code"      => 200,
        "invitados"   => $movements,
      ];
      // $reserve = CoverModel::find($coverId)->delete();
    } catch (\Throwable $th) {
      //throw $th;
      return back()->with('message', __('messages.errorDeleteCover'));
    }
  }
}
