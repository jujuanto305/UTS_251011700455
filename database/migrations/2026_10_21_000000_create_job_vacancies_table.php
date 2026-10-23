<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('company');
            $table->string('location');
            $table->unsignedBigInteger('salary');   // gaji per bulan (Rp)
            $table->string('type', 30);             // Full-time, Part-time, Kontrak, Magang, Remote
            $table->text('requirements');           // satu persyaratan per baris
            $table->date('posted_date');
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
