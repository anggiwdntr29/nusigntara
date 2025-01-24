<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlfabetSeeder extends Seeder
{
    /**
     * Seed the alfabet table.
     *
     * @return void
     */
    public function run()
    {
        // Data alfabet yang akan dimasukkan ke tabel alfabet
        $alfabets = [
            ['alfabet' => 'A'],
            ['alfabet' => 'B'],
            ['alfabet' => 'C'],
            ['alfabet' => 'D'],
            ['alfabet' => 'E'],
            ['alfabet' => 'F'],
            ['alfabet' => 'G'],
            ['alfabet' => 'H'],
            ['alfabet' => 'I'],
            ['alfabet' => 'J'],
            ['alfabet' => 'K'],
            ['alfabet' => 'L'],
            ['alfabet' => 'M'],
            ['alfabet' => 'N'],
            ['alfabet' => 'O'],
            ['alfabet' => 'P'],
            ['alfabet' => 'Q'],
            ['alfabet' => 'R'],
            ['alfabet' => 'S'],
            ['alfabet' => 'T'],
            ['alfabet' => 'U'],
            ['alfabet' => 'V'],
            ['alfabet' => 'W'],
            ['alfabet' => 'X'],
            ['alfabet' => 'Y'],
            ['alfabet' => 'Z'],
        ];

        // Menyisipkan data ke dalam tabel alfabet
        DB::table('alfabet')->insert($alfabets);
    }
}
