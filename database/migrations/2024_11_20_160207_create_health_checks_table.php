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
        Schema::create('health_checks', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->date('check_date');
        $table->integer('blood_pressure_sbp')->nullable(); // ความดันโลหิตตัวบน
        $table->integer('blood_pressure_dbp')->nullable(); // ความดันโลหิตตัวล่าง
        $table->float('fpg')->nullable();                 // ระดับน้ำตาลในเลือด (มก./ดล.)
        $table->boolean('fpg_risk')->nullable();          // สถานะเสี่ยงต่อโรคเบาหวาน
        $table->text('blood_test_results')->nullable();   // ผลตรวจเลือด
        $table->text('other_results')->nullable();        // ผลตรวจอื่น ๆ
        $table->timestamps();

        // Foreign Key
        $table->foreign('user_id')->references('id')->on('user_personal_info')->onDelete('cascade');
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_checks');
    }
};
