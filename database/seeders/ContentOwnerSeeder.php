<?php

namespace Database\Seeders;

use App\Models\ContentOwner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentOwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $co = [
            ['name' => 'ခင္ေဆြဦး'],
            ['name' => 'တိုးထက္'],
            ['name' => 'မင္းကိုႏိုင္'],
            ['name' => 'မိုးမိုး (အင္းလ်ား)'],
            ['name' => 'ႏိုင္ေဇာ္ (Lazy Club)'],
            ['name' => 'Synergy Publishing'],
            ['name' => 'သန္း၀င္းလိႈင္'],
            ['name' => 'ရာျပည့္'],
            ['name' => 'ခ်စ္ဦးညိဳ'],
            ['name' => 'အၾကည္ေတာ္']
        ];


        foreach ($co as $d) {
            ContentOwner::create([
                'name' => $d['name'],
            ]);
        }
    }
}
