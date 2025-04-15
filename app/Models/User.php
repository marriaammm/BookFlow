<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'borrowed_books',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relationship with borrowed products
    public function borrowedProducts()
    {
        return $this->belongsToMany(Product::class, 'borrowed_products', 'user_id', 'product_id')
            ->withTimestamps()
            ->withPivot('returned_at');
    }

    // Get currently borrowed products
    public function currentlyBorrowed()
    {
        return $this->borrowedProducts()->whereNull('borrowed_products.returned_at');
    }

    // Check if user can borrow more products
    public function canBorrow()
    {
        $currentlyBorrowed = $this->currentlyBorrowed()->count();
        return $currentlyBorrowed < config('bookflow.max_borrowed_items', 5);
    }

    // Borrow a product
    public function borrowProduct(Product $product)
    {
        if (!$this->canBorrow()) {
            throw new \Exception('Maximum borrowed items limit reached');
        }

        if ($product->isBorrowed()) {
            throw new \Exception('Product is already borrowed');
        }

        return $this->borrowedProducts()->attach($product->id);
    }

    // Return a product
    public function returnProduct(Product $product)
    {
        return $this->borrowedProducts()
            ->whereNull('returned_at')
            ->wherePivot('product_id', $product->id)
            ->updateExistingPivot($product->id, ['returned_at' => now()]);
    }
}
