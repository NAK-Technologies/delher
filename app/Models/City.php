<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'state'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function demographics()
    {
        return $this->hasMany(Demographic::class);
    }
}
