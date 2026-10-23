<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobVacancy extends Model
{
    protected $table = 'jobs';

    protected $fillable = [
        'title', 'company', 'location', 'salary',
        'type', 'requirements', 'posted_date', 'description',
    ];

    protected $casts = [
        'posted_date' => 'date',
        'salary'      => 'integer',
    ];

    /** Gambar (disimpan di public/assets/images/) berdasarkan tipe pekerjaan */
    public function getImageAttribute(): string
    {
        return match ($this->type) {
            'Remote'    => 'assets/images/job-remote.svg',
            'Magang'    => 'assets/images/job-intern.svg',
            'Part-time' => 'assets/images/job-parttime.svg',
            default     => 'assets/images/job-fulltime.svg',
        };
    }

    public function getSalaryFormattedAttribute(): string
    {
        return 'Rp ' . number_format($this->salary, 0, ',', '.');
    }

    public function getRequirementListAttribute(): array
    {
        return array_values(array_filter(array_map('trim', preg_split('/\R/', $this->requirements))));
    }
}
