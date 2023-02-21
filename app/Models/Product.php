<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Product extends Model
{
    use HasFactory, Sortable;

    protected $fillable = ['category_id', 'slug', 'name', 'artisan', 'price', 'stock', 'description', 'image', 'thumbnail'];
    protected $sorted = ['id','category_id', 'slug', 'name', 'artisan', 'price', 'stock', 'description', 'updated_at', 'created_at'];

    // Relationship with category
    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Relationship with order item
    public function orderItem() {
        return $this->hasMany(orderItem::class, 'product_id');
    }
}
