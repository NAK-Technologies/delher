<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    // protected $primarykey = 'mr_no';

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . ($this->middle_name . ' ' ?: '') . $this->last_name;
    }

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'father_name',
        'mother_name',
        'contact',
        'cnic',
        'mr_no',
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function demographic()
    {
        return $this->hasOne(Demographic::class);
    }
}
