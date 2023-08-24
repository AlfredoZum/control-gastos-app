<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('customer')->insert([
      [
        'user_id' => 2,
        'name' => 'cliente test',
        'phone' => '9982109220',
        'rfc' => 'CICO9922991',
        'business_name' => 'Razon social',
        'postal_code' => '44620',
        'general_regime' => 'regimen general',
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ],
      [
        'user_id' => 2,
        'name' => 'cliente test 2',
        'phone' => '9982109221',
        'rfc' => 'CICO9922991',
        'business_name' => 'Razon social',
        'postal_code' => '44620',
        'general_regime' => 'regimen general',
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]
    ]);
  }
}
