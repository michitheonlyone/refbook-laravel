<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::insert('insert into categories (name,slug,description) values (?,?,?)', ['Uncategorized','uncategorized','Uncategorized posts']);
        DB::insert('insert into posts (category_id,title,slug) values (?,?,?)', [1,'Testpost','test']);
    }
}
