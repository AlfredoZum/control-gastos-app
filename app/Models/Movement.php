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
      $movements = DB::table('movement as m')
        ->join('movement_type as mt', 'm.movement_type_id', '=', 'mt.id')
        ->join('way_pay as wp', 'm.way_pay_id', '=', 'wp.id')
        ->join('income_movement_classification as imc', 'm.income_movement_classification_id', '=', 'imc.id')
        ->join('egress_movement_classification as emc', 'm.egress_movement_classification_id', '=', 'emc.id')
        ->leftJoin('supplier as s', 'm.supplier_id', '=', 's.id')
        ->leftJoin('customer as c', 'm.customer_id', '=', 's.id')
        ->select('m.*', 
          'mt.name AS movement_type_name', 
          'wp.name AS way_pay_name', 
          'imc.name as income_movement_classification_name', 
          'emc.name as egress_movement_classification_name',
          's.name as supplier_name',
          'c.name as customer_name'
        )
        ->where('m.user_id', $userId)
        ->get();
      return [
        "code"      => 200,
        "invitados"   => $movements,
      ];
      // $reserve = CoverModel::find($coverId)->delete();
    } catch (\Throwable $th) {
      //throw $th;
      dd($th);
      return back()->with('message', __('messages.errorDeleteCover'));
    }
  }
}
