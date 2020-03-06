<?php

use Illuminate\Database\Seeder;

class ChordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'A#', 'C#', 'D#', 'F#', 'G#'];
        foreach($letters as $letter){
            DB::table('chords')->insert(['name' => $letter]);
            DB::table('chords')->insert(['name' => $letter.'m']);
        }
    }
}
