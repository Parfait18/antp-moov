<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCollumnsBeneficiareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('beneficiares', function (Blueprint $table) {
            $table->string('action_done')->nullable();
            $table->string('identifiant')->nullable();
            $table->string('code_agent_rappelle')->nullable();
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
