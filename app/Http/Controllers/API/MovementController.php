<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WayPay;
use App\Models\Movement;
use App\Models\Customer;
use App\Models\Supplier;
use App\Models\MovementType;
use App\Models\EgressMovementClassification;
use App\Models\IncomeMovementClassification;
use Illuminate\Http\JsonResponse;
use Exception;

class MovementController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index($userId): JsonResponse
  {
    try {
     
      $movements = Movement::getMovementByUser($userId);
      // dd($a);
      // $movements = Movement::where('user_id', $userId)->get();

      $data = [
        'movements' => $movements,
      ];
      return response()->json(['message' => 'Movimientos obtenidos', 'data' => $data, "code" => 200], 200);
    } catch (Exception $e) {
      return response()->json(['error' => 'error en la obtencion del recurso', "code" => 500], 500);
    }
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create($userId): JsonResponse
  {
    try {
      $folio = $this->getFolio($userId);
      $wayPay = WayPay::get();
      $customers = Customer::where('user_id', $userId)->get();
      $suppliers = Supplier::where('user_id', $userId)->get();
      $movementTypes = MovementType::get();
      $egressMovementClassification = EgressMovementClassification::get();
      $incomeMovementClassification = IncomeMovementClassification::get();

      $data = [
        'folio' => $folio,
        'wayPay' => $wayPay,
        'customers' => $customers,
        'suppliers' => $suppliers,
        'movementTypes' => $movementTypes,
        'egressMovementClassification' => $egressMovementClassification,
        'incomeMovementClassification' => $incomeMovementClassification,
      ];
      return response()->json(['message' => 'Clientes obtenidos', 'data' => $data, "code" => 200], 200);
    } catch (Exception $e) {
      return response()->json(['error' => 'error en la obtencion del recurso', "code" => 500], 500);
    }
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    try {
      
      $movement = new Movement;
      $movement->user_id = $request->user_id;
      $movement->folio = $this->getFolio($request->user_id);
      $movement->date = $request->date;
      $movement->total = $request->total;
      $movement->invoiced = $request->invoiced;
      $movement->supplier_id = $request->supplier_id;
      $movement->customer_id = $request->customer_id;
      $movement->movement_type_id = $request->movement_type_id;
      $movement->way_pay_id = $request->way_pay_id;
      $movement->income_movement_classification_id = $request->income_movement_classification_id;
      $movement->egress_movement_classification_id = $request->egress_movement_classification_id;
      $movement->nota = $request->nota;
      $movement->invoice_path = $request->invoice_path;
      $movement->save();

      $data = [
        'movement' => $movement,
      ];
      return response()->json(['message' => 'Movimientos creado', 'data' => $data, "code" => 200], 200);
    } catch (Exception $e) {
      dd($e);
      return response()->json(['error' => 'error en la obtencion del recurso', "code" => 500], 500);
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }

  public function getFolio($userId) {
    $lastMovement = Movement::where('user_id', $userId)->latest()->first();
    return $lastMovement->folio + 1;
  }
}
