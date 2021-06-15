<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = [
        'name'
    ];

    protected $primaryKey = 'id';

    /**
     * Returns all values with same foreign key
     *
     * @return object
     */
    public function itemsInCategory() {
        return $this->hasMany(Item::class, 'category');
    }

    /**
     * Deletes all related items
     *
     * @return void
     */
    public function delete()
    {
        $this->itemsInCategory()->delete();
    }
}
