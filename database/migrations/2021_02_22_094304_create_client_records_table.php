<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_records', function (Blueprint $table) {
            $table->id();
            $table->date('qa_visit_date');
            $table->string('category');
            $table->string('visit_type');
            $table->string('county');
            $table->string('locality');
            $table->string('province');
            $table->string('client_number')->nullable();
            $table->string('client_health_diagnose');
            $table->string('client_name')->nullable();
            $table->date('client_dob');
            $table->date('care_start_date');
            $table->string('duration_of_visit')->nullable();
            $table->string('signatue')->nullable();
            $table->foreignId('care_manager_id')->references('id')->on('users');
            $table->string('care_manager')->nullable();
            $table->integer('Cm_attitud')->nullable();
            $table->integer('Cm_ability')->nullable();
            $table->integer('Cm_reliability')->nullable();
            $table->string('Cm_comment')->nullable();
            $table->float('Cm_average')->default(0.00);
            $table->integer('Off_help')->nullable();
            $table->integer('Off_service')->nullable();
            $table->integer('Off_communication')->nullable();
            $table->float('Off_average')->default(0.00);
            $table->string('Off_comment')->nullable();
            $table->integer('csat')->nullable();
            $table->string('who')->nullable();
            $table->string('adv_name')->nullable();
            $table->string('expectations')->nullable();
            $table->string('adv_disc')->nullable();
            $table->integer('adv_rec')->nullable();
            $table->string('adv_comment')->nullable();
            $table->string('quality_of_Life')->nullable();
            $table->string('cp_details')->nullable();
            $table->string('review_care_needs')->nullable();
            $table->string('review_care_plan')->nullable();
            $table->string('expand_on_unmet_needs')->nullable();
            $table->string('add_other_yes')->nullable();
            $table->string('add_other')->nullable();
            $table->string('cg_meals')->nullable();
            $table->string('medi_set_type')->nullable();
            $table->string('cg_hm_key')->nullable();
            $table->string('cg_hm_key_sign')->nullable();
            $table->string('cg_key_info')->nullable();
            $table->string('cg_key_info_safe')->nullable();
            $table->string('bath_hoist')->nullable();
            $table->string('bt_hoist_service_date')->nullable();
            $table->string('starlift')->nullable();
            $table->string('starlift_service_date')->nullable();
            $table->string('hoist')->nullable();
            $table->date('hoist_service_date')->nullable();
            $table->string('profile_bed')->nullable();
            $table->string('ewchair')->nullable();
            $table->string('sr_other')->nullable();
            $table->string('sr_follow_up')->nullable();
            $table->string('hygine')->nullable();
            $table->string('hygine_detail')->nullable();
            $table->string('cjournal')->nullable();
            $table->string('cj_detail')->nullable();
            $table->string('pref_sheet')->nullable();
            $table->string('pref_sheet_detail')->nullable();
            $table->string('refill')->nullable();
            $table->string('refill_detail')->nullable();
            $table->string('guidline')->nullable();
            $table->string('guidline_detail')->nullable();
            $table->string('time_in')->nullable();
            $table->string('time_in_detail')->nullable();
            $table->string('cg_content_log')->nullable();
            $table->string('cg_content_log_detail')->nullable();
            $table->string('cj_comment')->nullable();
            $table->string('compatible')->nullable();
            $table->string('compatible_detail')->nullable();
            $table->string('dependable')->nullable();
            $table->string('dependable_detail')->nullable();
            $table->string('capable')->nullable();
            $table->string('capable_detail')->nullable();
            $table->string('recomm')->nullable();
            $table->string('dementia')->nullable();
            $table->string('pmh')->nullable();
            $table->string('cater_care');
            $table->string('per_care');
            $table->string('meal_prep');
            $table->string('st_care');
            $table->string('pp_update');
            $table->date('pp_date')->nullable();
            $table->string('train_other')->nullable();
            $table->string('train_note')->nullable();

            $table->string('care_giver')->nullable();
            $table->string('dementia_name')->nullable();
            $table->string('pm_name')->nullable();
            $table->string('cater_carers_name')->nullable();
            $table->string('personal_care_name')->nullable();
            $table->string('meal_preprations_name')->nullable();
            $table->string('stoma_care_name')->nullable();


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
        Schema::dropIfExists('client_records');
    }
}
