<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','path', 'name', 'extinsion', 'size', 'url', 'code'
    ];

    protected static function booted()
    {
        static::addGlobalScope('user', function (Builder $query) {
            $query->where('user_id', '=', Auth::user()->id);
        });
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
