<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question', 'parent_id', 'group', 'alias'
    ];

    public function options()
    {
        return $this->hasMany(Option::class, 'parent_id', 'id')->where('is_active', true);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public static function search($query = '', $all)
    {
        if ($all) {
            return $query == '' ?
                static::query() : static::where(function ($q) use ($query) {
                    return $q->where('question', 'like', '%' . $query . '%');
                })
                ->orWhere(function ($q) use ($query) {
                    return $q->where('group', 'like', '%' . $query . '%');
                })
                ->orWhereHas('options', function ($q) use ($query) {
                    return $q->where('question', 'LIKE', '%' . $query . '%');
                })
                ->orWhereHas('options.options', function ($q) use ($query) {
                    return $q->where('question', 'LIKE', '%' . $query . '%');
                });
        } else {
            return $query == '' ? static::query()
                ->where('is_active', true) : static::where(function ($q) use ($query) {
                    return $q->where('question', 'like', '%' . $query . '%')
                        ->where('is_active', true);
                })
                ->orWhere(function ($q) use ($query) {
                    return $q->where('group', 'like', '%' . $query . '%')
                        ->where('is_active', true);
                })
                ->orWhereHas('options', function ($q) use ($query) {
                    return $q->where('question', 'LIKE', '%' . $query . '%')
                        ->where('is_active', true);
                })
                ->orWhereHas('options.options', function ($q) use ($query) {
                    return $q->where('question', 'LIKE', '%' . $query . '%')
                        ->where('is_active', true);
                });
        }
    }

    protected $hidden = [
        'is_active', 'created_at', 'updated_at', 'parent_id'
    ];
}
