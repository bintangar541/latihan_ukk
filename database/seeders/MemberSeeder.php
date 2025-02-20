<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    public function run()
    {
        Member::create([
            'name' => 'Budi',
            'no_phone' => '08123456789',
            'poin' => 100
        ]);

        Member::create([
            'name' => 'Siti',
            'no_phone' => '08987654321',
            'poin' => 200
        ]);
    }
}

