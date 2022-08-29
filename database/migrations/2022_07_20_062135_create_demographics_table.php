<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demographics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id');
            $table->timestamp('dob');
            // $table->text('address');
            $table->foreignId('city_id');
            $table->string('area');
            $table->string('street')->nullable();
            $table->string('house_no')->nullable();
            $table->string('education');
            $table->string('occupation');
            $table->string('visit_type');
            $table->boolean('exclusively_breastfed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demographics');
    }
};
