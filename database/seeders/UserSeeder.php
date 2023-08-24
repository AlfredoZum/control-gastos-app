<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('users')->insert([
      'name' => 'test',
      'email' => 'prueba@gmail.com',
      'password' => Hash::make('123456789'),
      'type' => 'customer',
      'phone' => '9982109220',
      'rfc' => 'CICO9922991',
      'business_name' => 'Razon social',
      'postal_code' => '44620',
      'general_regime' => 'regimen general',
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
    ]);
  }
}
