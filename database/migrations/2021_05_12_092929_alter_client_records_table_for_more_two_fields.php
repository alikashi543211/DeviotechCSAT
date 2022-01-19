<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterClientRecordsTableForMoreTwoFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE `client_records` ADD `profile_service_date` VARCHAR(191) NULL DEFAULT NULL AFTER `profile_bed`, ADD `wheelchair_service_date` VARCHAR(191) NULL DEFAULT NULL AFTER `profile_service_date`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
