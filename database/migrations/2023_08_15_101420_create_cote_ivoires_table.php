<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoteIvoiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cote_ivoires', function (Blueprint $table) {
            $table->id();
            $table->string('chefGouvernement');
            $table->string('gouvernement');
            $table->string('capitalePolitique');
            $table->string('superficie');
            $table->string('population');
            $table->string('independanceDay');
            $table->string('langOfficielle');
            $table->string('langParle');
            $table->string('esperanceVie');
            $table->string('pipHabitant');
            $table->string('tauxCroissanceAnnuel');
            $table->string('monnaie');
            $table->string('indiceDeveHumain');
            $table->string('fuseauHoraire');
            $table->string('websiteGouvernement');
            $table->string('ministery');
            $table->string('ministerName');
            $table->string('ministerAdress');
            $table->string('ministerTel');
            $table->string('ministerFax');
            $table->string('ministerEmail');
            $table->string('ministerOfficialWebsite');
            $table->string('managerBnc');
            $table->string('managerBncFunction');
            $table->string('managerBncTel');
            $table->string('managerBncFax');
            $table->string('managerBncEmail');
            $table->string('managerBncOfficialWebsite');
            $table->string('outCedeao');
            $table->string('outCedeaoAdresse');
            $table->string('outCedeaoTel');
            $table->string('outCedeaoFax');
            $table->string('outCedeaoMail');
            $table->string('inCedeao');
            $table->string('inCedeaoAdresse');
            $table->string('inCedeaoMail');
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
        Schema::dropIfExists('cote_ivoires');
    }
}
