<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEscalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escalas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('incidencia_id');
            $table->unsignedBigInteger('equipo_id');
            $table->unsignedBigInteger('empleado_id'); 
            $table->string('nombre')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['en progreso', 'terminado', 'resuelto'])->default('en progreso');
            $table->decimal('precio', 8, 2)->nullable();
            $table->dateTime('hora_inicio')->nullable();
            $table->dateTime('hora_fin')->nullable();
            $table->timestamps();
    
            $table->foreign('incidencia_id')->references('id')->on('incidencias')->onDelete('cascade');
            $table->foreign('equipo_id')->references('id')->on('devices')->onDelete('cascade');
            $table->foreign('empleado_id')->references('id')->on('users')->onDelete('cascade'); 
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('escalas');
    }
}
