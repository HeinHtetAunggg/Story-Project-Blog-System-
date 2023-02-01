<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Story;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $steven=User::factory()->create(['name'=>'steven','username'=>'steven']);
        $harry=User::factory()->create(['name'=>'harry','username'=>'harry']);

        $horror=Category::factory()->create(['name'=>'horror','slug'=>'horror']);
        $comedy=Category::factory()->create(['name'=>'comedy','slug'=>'comedy']);

        Story::factory(2)->create(['category_id'=>$horror->id,'user_id'=>$steven->id]);
        Story::factory(2)->create(['category_id'=>$comedy->id,'user_id'=>$harry->id]);

        
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
