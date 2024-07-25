<?php

// app/Models/Vacancy.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'isactive',
        'start_date',
        'is_resume_required',
        'end_date',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'isactive' => 'boolean',
        'is_resume_required' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function applications()
    {
        return $this->hasMany(Application::class, 'vacancy_id');
    }
}
