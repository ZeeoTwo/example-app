<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'content_comment',
        'author_id',
        'post_id',
        'title_comment'
    ];
    public function author()
    {
        return $this->belongsTo(User::class,'author_id');
    }
    public function publication()
    {
        return $this->belongsTo(Publication::class, 'post_id');
    }
}
