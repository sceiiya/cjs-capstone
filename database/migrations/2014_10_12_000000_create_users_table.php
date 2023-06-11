<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            //0 = Applicant // 1 = Employee // 2 = Admin
            $table->tinyInteger('role')->default(0);
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->string('phone_number')->unique()->nullable();
            $table->timestamp('applied_at')->nullable();
            $table->timestamp('joined_at')->nullable();
            $table->timestamp('archived_at')->nullable();
            $table->string('status')->nullable();
            $table->string('otp')->nullable();
            $table->string('profile_pic')->nullable();
            $table->string('job_position')->nullable();
            $table->string('job_type')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('province_state')->nullable();
            $table->string('street')->nullable();
            $table->string('postal_id')->nullable();
            $table->string('google_id')->nullable();
            //
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
