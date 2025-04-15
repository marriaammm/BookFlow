<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product\Product;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BorrowedProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all users and products
        $users = User::all();
        $products = Product::all();

        // Set up some borrowing scenarios
        $borrowings = [
            // John has 2 current books
            [
                'email' => 'john@example.com',
                'books' => [1, 2], // First and second book
                'returned' => false
            ],
            // Jane has 1 current book and returned 1
            [
                'email' => 'jane@example.com',
                'books' => [3], // Third book
                'returned' => false
            ],
            [
                'email' => 'jane@example.com',
                'books' => [4], // Fourth book
                'returned' => true
            ],
            // Alice has 3 current books
            [
                'email' => 'alice@example.com',
                'books' => [5, 6, 7], // Fifth, sixth, and seventh book
                'returned' => false
            ],
            // Bob has returned all his books
            [
                'email' => 'bob@example.com',
                'books' => [8], // Eighth book
                'returned' => true
            ],
            // Sarah has 1 current book
            [
                'email' => 'sarah@example.com',
                'books' => [1], // First book
                'returned' => false
            ]
        ];

        // Process each borrowing scenario
        foreach ($borrowings as $borrowing) {
            $user = User::where('email', $borrowing['email'])->first();
            
            foreach ($borrowing['books'] as $productId) {
                $now = Carbon::now();
                
                DB::table('borrowed_products')->insert([
                    'user_id' => $user->id,
                    'product_id' => $productId,
                    'created_at' => $now,
                    'updated_at' => $now,
                    'returned_at' => $borrowing['returned'] ? $now : null
                ]);

                // Update user's borrowed_books count for current borrows
                if (!$borrowing['returned']) {
                    $user->borrowed_books++;
                    $user->save();
                }
            }
        }
    }
}
