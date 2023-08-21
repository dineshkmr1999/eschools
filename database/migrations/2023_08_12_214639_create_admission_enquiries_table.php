<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admission_enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('admission_number');
            $table->string('student_name');
            $table->string('phone_number');
            $table->string('email')->nullable();
            $table->date('student_dob');
            $table->text('address')->nullable();
            $table->string('added_by');
            $table->string('class_applying_for');
            $table->text('previous_school')->nullable();
            $table->string('gender');
            $table->string('language_of_medium');
            $table->string('parent_name')->nullable();
            $table->date('enquiry_date');
            $table->unsignedBigInteger('enquiry_mode_id');
            $table->foreign('enquiry_mode_id')->references('id')->on('enquiry_modes')
                ->onDelete('cascade');
            $table->unsignedBigInteger('school_id')->nullable();
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
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
        Schema::dropIfExists('admission_enquiries');
    }
};