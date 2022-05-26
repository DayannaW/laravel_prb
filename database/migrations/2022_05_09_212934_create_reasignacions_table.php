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
        Schema::create('reasignacions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('numeroLinea_id')->nullable();
            $table->string('usuario_actual');
            $table->unsignedBigInteger('usuario_nuevo_id')->nullable();

            $table->foreign('numeroLinea_id')
                    ->references('id')->on('lineas')
                    ->onDelete('set null');

            $table->foreign('usuario_nuevo_id')
                    ->references('id')->on('usuarios')
                    ->onDelete('set null');


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
        Schema::dropIfExists('reasignacions');
    }
};
