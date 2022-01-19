<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->date('care_start_date');
            $table->string('name');
            $table->string('id_number')->nullable();
            $table->date('dob')->nullable();
            $table->string('type')->nullable();
            $table->string('condition')->nullable();
            $table->string('county')->nullable();
            $table->string('locality')->nullable();
            $table->string('eircode')->nullable();
            $table->string('care_manager')->nullable();
            $table->unsignedInteger('care_manager_id')->nullable();
            $table->enum('status',['Active','Suspend'])->default('Active');
            $table->softDeletes();
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
        Schema::dropIfExists('clients');
    }
}
