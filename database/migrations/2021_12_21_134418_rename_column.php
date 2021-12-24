<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('beneficiares', function (Blueprint $table) {
            $table->renameColumn('msisdn', 'msisdn_moov_transafered');
            $table->renameColumn('msisdn_moov', 'msisdn');
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

        });
    }
}
