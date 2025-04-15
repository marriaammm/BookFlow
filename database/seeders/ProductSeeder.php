<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'name' => 'The Great Gatsby',
                'description' => 'A novel by F. Scott Fitzgerald that follows a cast of characters living in the fictional town of West Egg on prosperous Long Island in the summer of 1922.',
                'img' => 'menu-1.jpg'
            ],
            [
                'name' => 'To Kill a Mockingbird',
                'description' => 'Harper Lee\'s Pulitzer Prize-winning masterwork of honor and injustice in the deep South—and the heroism of one man in the face of blind and violent hatred.',
                'img' => 'menu-2.jpg'
            ],
            [
                'name' => '1984',
                'description' => 'George Orwell\'s dystopian social science fiction novel that follows the life of Winston Smith, a low ranking member of \'the Party\', who is frustrated by the omnipresent eyes of the party, and its ominous ruler Big Brother.',
                'img' => 'menu-3.jpg'
            ],
            [
                'name' => 'Pride and Prejudice',
                'description' => 'Jane Austen\'s romantic novel of manners that follows the character development of Elizabeth Bennet, who learns about the repercussions of hasty judgments.',
                'img' => 'menu-4.jpg'
            ],
            [
                'name' => 'The Hobbit',
                'description' => 'J.R.R. Tolkien\'s beloved fantasy novel that follows the quest of home-loving Bilbo Baggins to win a share of the treasure guarded by Smaug the dragon.',
                'img' => 'drink-1.jpg'
            ],
            [
                'name' => 'The Catcher in the Rye',
                'description' => 'J.D. Salinger\'s controversial novel that follows sixteen-year-old Holden Caulfield\'s experiences in New York City in the days following his expulsion from Pencey Prep.',
                'img' => 'drink-2.jpg'
            ],
            [
                'name' => 'Lord of the Flies',
                'description' => 'William Golding\'s novel about a group of British boys stuck on an uninhabited island who try to govern themselves with disastrous results.',
                'img' => 'drink-3.jpg'
            ],
            [
                'name' => 'The Alchemist',
                'description' => 'Paulo Coelho\'s masterpiece tells the mystical story of Santiago, an Andalusian shepherd boy who yearns to travel in search of a worldly treasure.',
                'img' => 'drink-4.jpg'
            ],
        ];

        foreach ($books as $book) {
            Product::create($book);
        }
    }
}
