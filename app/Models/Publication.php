<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/** 
 * @property int $id
 * @property int $author_id
 * @property string $title
 * @property string $content
 *
 * @property User $author
 */
class Publication extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'author_id'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id')->withTrashed();

    }

    public function comments(){

        return $this->hasMany(Comment::class, 'post_id');
    }
}
