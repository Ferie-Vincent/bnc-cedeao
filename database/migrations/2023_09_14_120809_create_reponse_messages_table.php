<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReponseMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reponse_messages', function (Blueprint $table) {
            $table->id();
            $table->string('idMessage');
            $table->string('name');
            $table->string('email');
            $table->string('subjet');
            $table->text('contenue');
            $table->boolean('statu')->default(0);
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
        Schema::dropIfExists('reponse_messages');
    }
}
