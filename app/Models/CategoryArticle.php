<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryArticle extends Model
{
    use HasFactory;

    // Jika nama tabel tidak jamak, bisa ditentukan:
    // protected $table = 'categories';

    // Kolom yang boleh diisi mass-assignment
    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * Relasi: satu kategori punya banyak artikel.
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
