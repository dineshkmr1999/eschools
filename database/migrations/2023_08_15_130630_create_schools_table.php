<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // School Name
            $table->string('address'); // Address
            $table->string('phone_number'); // Phone Number
            $table->string('email')->unique(); // Email Address
            $table->string('principal_name')->nullable(); // Principal Name
            $table->date('founded_date')->nullable(); // Founded Date
            $table->string('affiliation')->nullable(); // Affiliation
            $table->string('website')->nullable(); // Website
            $table->text('description')->nullable(); // Description
            $table->date('registration_date'); // Registration Date
            $table->enum('status', ['active', 'inactive', 'under_review'])->default('active'); // Status
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
        Schema::dropIfExists('schools');
    }
};
