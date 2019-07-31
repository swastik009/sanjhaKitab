<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'name' => 'Book | '.Str::random(10),
            'author' => 'Author | '.Str::random(10),
            'release_date' => $this->randomDateInRange(),
            'quantity' => mt_rand(1,10),
            'image' => 'dummy.jpg',
            'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }

    public function randomDateInRange() {
        return date('Y-m-d', strtotime( '+'.mt_rand(0,30).' days'));
    }
}
