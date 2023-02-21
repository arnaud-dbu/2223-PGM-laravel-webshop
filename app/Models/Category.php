<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Category extends Model
{
    use HasFactory, Sortable;

    protected $fillable = ['name', 'slug', 'description', 'image', 'thumbnail'];
    protected $sortable = ['id', 'name', 'slug', 'description', 'image', 'thumbnail', 'created_at', 'updated_at'];

    // Relationship with products
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
