<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['content','author','reply_id'];

    protected $with = ['replies'];

    protected $casts = [
        'created_at' => 'datetime:y-M-d H:i'
    ];

    /**
    * Get replies of a comment
    *
    * @return array
    */

    public function replies()
    {
        return $this->hasMany(Comment::class,'reply_id','id')->latest();
    }

    public function scopeTopComments($query)
    {
        return $query->where('reply_id', 0);
    }

}

