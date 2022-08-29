<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'created_by',
        'role',
        'city',
        'location'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }

    public function isAdmin()
    {
        return $this->role == 'admin';
    }

    public function isViewer()
    {
        return $this->role == 'viewer';
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city');
    }

    public static function search($query = '', $all)
    {
        if ($all) {
            return $query == '' ? static::where('id', '!=', auth()->user()->id) : static::where('id', '!=', auth()->user()->id)->where(function ($q) use ($query) {
                return $q->where('name', 'like', '%' . $query . '%')
                    ->orWhere('location', 'like', '%' . $query . '%')
                    ->orWhereHas('city', function ($q) use ($query) {
                        return $q->where('name', 'like', '%' . $query . '%');
                    });
            });
        } else {
            return $query == '' ? static::where('created_by', auth()->user()->id) : static::where('created_by', auth()->user()->id)->where(function ($q) use ($query) {
                return $q->where('name', 'like', '%' . $query . '%')
                    ->orWhere('location', 'like', '%' . $query . '%')
                    ->orWhereHas('city', function ($q) use ($query) {
                        return $q->where('name', 'like', '%' . $query . '%');
                    });
            });
        }
    }
}
