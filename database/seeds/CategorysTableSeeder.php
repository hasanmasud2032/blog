<?php

use Illuminate\Database\Seeder;

class CategoryTableSeede extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Models\post::create([
        'id' => 1,
        'name' => 'Poem',
        'slug' => 'Poem',
        'status' => 'draft',
      ])
    }
}
