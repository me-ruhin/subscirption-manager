<?php

namespace Database\Seeders;

use App\Models\WebSite;
use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebSite::create(['name'=>'test.com']);
    }
}
