<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

 /**
 * Class that corresponds to `authors` table
 *
 * @property string $first_name
 * @property string $last_name
 */

class Author extends Model
{
    use HasFactory;

    public $table = 'authors';

    protected $fillable = [
        'first_name',
        'last_name',
        'active'
    ];

    public function books()
    {
        return $this->hasMany(Book::class, 'author_id', 'id');
    }
}