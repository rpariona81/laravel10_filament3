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
        Schema::create('t_regiones', function (Blueprint $table) {
            $table->id();
            $table->string('codregion',100)->nullable();;
            $table->string('region',100);
            $table->string('region_alias',100)->nullable();
            $table->string('region_politica',100)->nullable();
            $table->string('mapa',100)->nullable();
            $table->string('departamento',100)->nullable();
            $table->string('nombre_iso_3166_2',100)->nullable();
            $table->string('codigo_iso_3166_2',20)->nullable();
            $table->string('folder',100)->nullable();;
            $table->string('url_folder',255)->nullable();;
            $table->string('ruta_alterna',255)->nullable();;
            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_regiones');
    }
};
