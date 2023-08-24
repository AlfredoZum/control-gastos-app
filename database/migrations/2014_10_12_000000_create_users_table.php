<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
          $table->id();
          $table->string('name');
          $table->string('email')->unique();
          $table->timestamp('email_verified_at')->nullable();
          $table->string('password');
          $table->string('type')->default('customer')->comment('admin = administrador, customer = cliente');
          // $table->tinyInteger('type')->comment('0 = administrador, 1 = cliente')->default(1);
          $table->string('phone', 12)->nullable();
          $table->string('rfc', 50)->nullable();
          $table->string('business_name', 50)->nullable()->comment('razon social');
          $table->string('postal_code', 10)->nullable()->comment('codigo postal');
          $table->string('general_regime', 50)->nullable()->comment('regimen general');
          
          $table->rememberToken();
          $table->timestamps();
          $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
