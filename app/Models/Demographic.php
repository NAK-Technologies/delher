<?php

namespace App\Models;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Demographic extends Model
{
    use HasFactory, Helper;

    protected $fillable = [
        'dob',
        'city_id',
        'area',
        'street',
        'house_no',
        'education',
        'occupation',
        'visit_type',
        'exclusively_breastfed',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
