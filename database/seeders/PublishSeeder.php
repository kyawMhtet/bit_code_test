<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $publishers = [
            ['name' => 'ခင္ေဆြဦး'],
            ['name' => 'ဆင္ျဖဴကၽြန္း ေက်ာ္လႈိင္ဦး'],
            ['name' => 'မင္းကိုႏိုင္'],
            ['name' => 'မိုးမိုး (အင္းလ်ား)'],
            ['name' => 'ႏိုင္ေဇာ္ (Lazy Club)'],
            ['name' => 'ႏိုင္းႏိုင္းစေန'],
            ['name' => 'သန္း၀င္းလိႈင္'],
            ['name' => 'ရာျပည့္ဦးစိုးညြန္႕'],
            ['name' => 'ခ်စ္ဦးညိဳ'],
            ['name' => 'အၾကည္ေတာ္']
        ];


        foreach ($publishers as $p) {
            Publisher::create([
                'name' => $p['name'],
            ]);
        }
    }
}
