<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class that corresponds to `books` table
 * 
 * @property int $id 
 * @property string $name
 * @property int $author_id
 * @property string $release_date
 * @property string $details
 * @property string $editorial
 * @property float $price
 * @property string $language
 * @property int $active
 */
class Book extends Model
{
    use HasFactory;

    public $table = 'books';

    protected $fillable = [
        'name',
        'author_id',
        'release_date',
        'details',
        'editorial',
        'price',
        'language',
        'active'
    ];

    public function author()
    {
        return $this->hasOne(Author::class, 'id', 'author_id');
    }
}
