<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColloneBeneficiareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('beneficiares', function (Blueprint $table) {
            $table->string('code_agent')->nullable();
            $table->string('code_agent_irm')->nullable();
            $table->string('call_status')->nullable();
            $table->string('nom_prenom_conforme')->nullable();
            $table->string('num_for_tranaction')->nullable();
            $table->string('irm_check')->nullable();
            $table->string('mc_check')->nullable();
            $table->string('depatement')->nullable();
            $table->string('mc_status')->nullable();
            $table->string('commenter')->nullable();
            $table->string('conformite_commenter')->nullable();
            $table->string('contact_done')->nullable();
            $table->string('point_contact')->nullable();
            $table->string('cantact_loc')->nullable();
            $table->string('reason')->nullable();
            $table->string('date_rdv')->nullable();
            $table->string('hours_rdv')->nullable();
            $table->string('status_paiement')->nullable();
            $table->integer('a_appeller')->nullable();
            $table->integer('statut')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('beneficiares', function (Blueprint $table) {
            //
        });
    }
}
