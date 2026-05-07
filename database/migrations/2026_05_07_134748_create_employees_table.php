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
        Schema::create('employees', function (Blueprint $table) {
            $table->ulid('id')->primary();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('employee_number', 50)->unique();
            $table->string('full_name', 200);
            $table->string('preferred_name', 100)->nullable();

            $table->string('ic_number', 30)->nullable()->unique();
            $table->date('date_of_birth')->nullable();
            $table->string('gender', 20)->nullable();
            $table->string('marital_status', 30)->nullable();
            $table->string('religion', 50)->nullable();

            $table->string('mobile_phone', 30)->nullable();
            $table->string('personal_email', 150)->nullable()->unique();
            $table->string('work_email', 150)->nullable()->unique();

            $table->date('joined_date')->nullable();
            $table->date('confirmed_date')->nullable();

            $table->foreignUlid('employment_status_id')
                ->nullable()
                ->constrained('employment_statuses')
                ->nullOnDelete();

            $table->foreignUlid('branch_id')
                ->nullable()
                ->constrained('branches')
                ->nullOnDelete();

            $table->foreignUlid('department_id')
                ->nullable()
                ->constrained('departments')
                ->nullOnDelete();

            $table->foreignUlid('position_id')
                ->nullable()
                ->constrained('positions')
                ->nullOnDelete();

            $table->foreignUlid('job_grade_id')
                ->nullable()
                ->constrained('job_grades')
                ->nullOnDelete();

            $table->ulid('reporting_manager_id')->nullable();

            $table->boolean('is_migrated')->default(false);
            $table->string('source_type', 50)->nullable();
            $table->timestamp('migrated_at')->nullable();

            $table->boolean('is_active')->default(true);
            $table->text('remarks')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index('user_id');
            $table->index('employment_status_id');
            $table->index('branch_id');
            $table->index('department_id');
            $table->index('position_id');
            $table->index('job_grade_id');
            $table->index('reporting_manager_id');
            $table->index('is_active');
            $table->index(['is_migrated', 'source_type']);
        });

        Schema::table('employees', function (Blueprint $table) {
            $table->foreign('reporting_manager_id')
                ->references('id')
                ->on('employees')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign(['reporting_manager_id']);
        });

        Schema::dropIfExists('employees');
    }
};
