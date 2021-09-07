<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    public static array $allowedFields = ['id', 'title', 'description', 'status', 'author'];
    protected $fillable = ['title', 'description', 'image', 'author', 'status'];
}
