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
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->integer('tipo_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->dateTime('fecha')->default(\Carbon\Carbon::now());
            $table->string('descripcion');
            $table->decimal('ingreso', 10, 2)->nullable();
            $table->decimal('egreso', 10, 2)->nullable();
            $table->decimal('fichas', 10, 2)->nullable();
            $table->float('porcentaje')->nullable();
            $table->integer('comprobante_id')->unsigned()->nullable();            
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
        Schema::dropIfExists('movimientos');
    }
};
