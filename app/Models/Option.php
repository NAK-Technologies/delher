<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $table = 'questions';

    public function question()
    {
        return $this->belongsTo(Question::class, 'parent_id', 'id')->where('is_active', true);
    }

    public function options()
    {
        return $this->hasMany(Option::class, 'parent_id', 'id')->where('is_active', true);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id');
    }

    protected $hidden = [
        'is_active', 'created_at', 'updated_at', 'parent_id'
    ];
}
