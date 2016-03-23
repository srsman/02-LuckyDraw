<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder {

  public function run()
  {
    //DB::table('pages')->delete();
    Category::create([
        'type'   => 'link',
        'award_rate'   => '0.5',
      ]);
    Category::create([
        'type'   => 'code',
        'award_rate'   => '0.3',
      ]);
    Category::create([
        'type'   => 'thing',
        'award_rate'   => '0.2',
      ]);

  }

}