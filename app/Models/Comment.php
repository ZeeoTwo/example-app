<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use SoftDeletes, HasFactory;
    protected $fillable = [
        'content_comment',
        'author_id',
        'post_id',
        'parent_id',
    ];
    public function author()
    {
        return $this->belongsTo(User::class,'author_id');
    }
    public function publication()
    {
        return $this->belongsTo(Publication::class, 'post_id');
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
    public function hasParent()
    {
        return $this->parent_id;
    }

}
