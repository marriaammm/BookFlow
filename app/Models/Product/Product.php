<?php

namespace App\Models\Product;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "products";
    
    protected $fillable = [
        "name",
        "img",
        "description",
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public $timestamps = true;

    // Relationship with users who have borrowed this product
    public function borrowers()
    {
        return $this->belongsToMany(User::class, 'borrowed_products', 'product_id', 'user_id')
            ->withTimestamps()
            ->withPivot('returned_at');
    }

    // Check if product is currently borrowed
    public function isBorrowed()
    {
        return $this->borrowers()->whereNull('borrowed_products.returned_at')->exists();
    }

    // Get current borrower if any
    public function currentBorrower()
    {
        return $this->borrowers()->whereNull('borrowed_products.returned_at')->first();
    }
}
