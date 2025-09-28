<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // protected $table = 'articles'; // jika ingin eksplisit

    protected $fillable = [
        'title',
        'excerpt',
        'content',
        'slug',
        'published_at',
        'category_id',
        'author_id',
        'thumbnail',
        'status',
        'views',
    ];

    protected $dates = [
        'published_at',
    ];
    protected $casts = [
        'published_at' => 'datetime',  // <— penting
    ];

    /**
     * Relasi: artikel milik satu kategori.
     */
    public function category()
    {
        return $this->belongsTo(CategoryArticle::class, 'category_id');
    }

    /**
     * (Opsional) Relasi ke user/penulis jika menggunakan tabel users.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
