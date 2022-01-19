<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareGiverRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('care_giver_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->references('id')->on('client_records');
            $table->integer('care_giver_id');
            $table->string('care_giver_name')->nullable();
            $table->integer('attitude')->nullable();
            $table->integer('ability')->nullable();
            $table->integer('reliability')->nullable();
            $table->float('average_giver')->default(0.00);
            $table->string('cg_comment')->nullable();
            $table->float('average_giver_total')->default(0.00);
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
        Schema::dropIfExists('care_giver_records');
    }
}
