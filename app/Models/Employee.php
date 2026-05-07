<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasUlids, SoftDeletes;

    protected $table = 'employees';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'employee_number',
        'full_name',
        'preferred_name',
        'ic_number',
        'date_of_birth',
        'gender',
        'marital_status',
        'religion',
        'mobile_phone',
        'personal_email',
        'work_email',
        'joined_date',
        'confirmed_date',
        'employment_status_id',
        'branch_id',
        'department_id',
        'position_id',
        'job_grade_id',
        'reporting_manager_id',
        'is_migrated',
        'source_type',
        'migrated_at',
        'is_active',
        'remarks',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'joined_date' => 'date',
        'confirmed_date' => 'date',
        'migrated_at' => 'datetime',
        'is_migrated' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function employmentStatus(): BelongsTo
    {
        return $this->belongsTo(EmploymentStatus::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function jobGrade(): BelongsTo
    {
        return $this->belongsTo(JobGrade::class);
    }

    public function reportingManager(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'reporting_manager_id');
    }

    public function subordinates(): HasMany
    {
        return $this->hasMany(Employee::class, 'reporting_manager_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByEmployeeNumber($query, string $employeeNumber)
    {
        return $query->where('employee_number', $employeeNumber);
    }
}
