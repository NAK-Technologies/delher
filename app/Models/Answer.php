<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id', 'question_id', 'answer', 'group'
    ];

    public function option()
    {
        return $this->belongsTo(Option::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
