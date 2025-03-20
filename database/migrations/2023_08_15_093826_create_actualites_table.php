<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActualitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actualites', function (Blueprint $table) {
            $table->id();
            $table->string('auteur');
            $table->string('appelTitre');
            $table->string('title');
            $table->string('legende');
            $table->string('chapeau');
            $table->text('corpsTexte');
            $table->string('date');
            $table->string('image')->default('');
            $table->string('id_tags');
            $table->boolean('archive')->default(0);
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
        Schema::dropIfExists('actualites');
    }
}
