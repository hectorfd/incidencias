<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ticket')->unique();
            $table->string('problem');
            $table->text('description');
            $table->string('numero_boleta')->nullable();
            $table->date('fecha_boleta')->nullable(); 
            $table->enum('status', ['resuelto', 'pendiente'])->default('pendiente');
            $table->unsignedBigInteger('empleado_id'); 
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('empleado_id')->references('id')->on('users'); 
            $table->foreign('cliente_id')->references('id')->on('users');
            $table->foreign('categoria_id')->references('id')->on('categories');
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
        Schema::dropIfExists('incidencias');
    }
}
