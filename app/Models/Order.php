<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Order extends Model
{
    use HasFactory, Sortable;

    protected $fillable = ['user_id', 'status', 'total', 'updated_at'];
    protected $sortable = ['id', 'user_id', 'status', 'total'];


    // Relationship with order item
    public function orderItem() {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    // Relationship with user
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
