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
        Schema::create('movement', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('folio');
            $table->date('date');
            $table->decimal('total', 8, 2);
            $table->boolean('invoiced')->default(false);
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('supplier');
            $table->unsignedBigInteger('movement_type_id');
            $table->foreign('movement_type_id')->references('id')->on('movement_type');
            $table->unsignedBigInteger('way_pay_id');
            $table->foreign('way_pay_id')->references('id')->on('way_pay');
            $table->unsignedBigInteger('income_movement_classification_id');
            $table->foreign('income_movement_classification_id')->references('id')->on('income_movement_classification');
            $table->unsignedBigInteger('egress_movement_classification_id');
            $table->foreign('egress_movement_classification_id')->references('id')->on('egress_movement_classification');
            $table->string('nota')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movement');
    }
};
