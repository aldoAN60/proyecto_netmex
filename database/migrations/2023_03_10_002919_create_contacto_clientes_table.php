<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactoClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacto_clientes', function (Blueprint $table) {
            $table->id("contacto");
            $table->String("nombre");
            $table->String("n_subscriptor")->nullable();
            $table->String("email");
            $table->String("asunto");
            $table->longText("descripcion");
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
        Schema::dropIfExists('contacto-clientes');
    }
}
