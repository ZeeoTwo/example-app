<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    public int $id;
    public string $author;
    public string $content;
    public string $title;
    
    protected $fillable = [
        'title',
        'content',
        'author'
    ];
}
