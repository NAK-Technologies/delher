<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    // protected $primarykey = 'mr_no';

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function demographic()
    {
        return $this->hasOne(Demographic::class);
    }
}
