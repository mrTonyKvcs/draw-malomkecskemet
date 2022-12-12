<?php

namespace Database\Seeders;

use App\Models\Gift;
use Illuminate\Database\Seeder;

class GiftsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gifts = config('gifts');

        foreach($gifts as $gift) {
            Gift::create([ 'name' => $gift ]);
        }

        return 200;
    }
}
