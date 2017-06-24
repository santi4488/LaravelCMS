<?php

use Illuminate\Database\Seeder;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->truncate();

        DB::table('pages')->insert([
          [
            'title' => 'About',
            'uri' => 'about',
            'content' => 'This is the about page.',
            'parent_id' => null,
            '_lft' => 3,
            '_rgt' => 8,
          ],
          [
            'title' => 'Contact',
            'uri' => 'contact',
            'content' => 'This is the contact page.',
            'parent_id' => 1,
            '_lft' => 4,
            '_rgt' => 5,
          ],
          [
            'title' => 'FAQ',
            'uri' => 'faq',
            'content' => 'This is the FAQ page.',
            'parent_id' => 1,
            '_lft' => 6,
            '_rgt' => 7,
          ],
          [
            'title' => 'Media',
            'uri' => 'media',
            'content' => 'This is the media page.',
            'parent_id' => null,
            '_lft' => 1,
            '_rgt' => 2,
          ],
          [
            'title' => 'Characters',
            'uri' => 'characters',
            'content' => 'This is the characters page.',
            'parent_id' => null,
            '_lft' => 9,
            '_rgt' => 10,
          ],
        ]);
    }
}
