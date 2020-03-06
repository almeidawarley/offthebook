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
        $modifiers = ['9', '4', '6', '7', 'º'];
        foreach($letters as $letter){
            DB::table('chords')->insert(['name' => $letter]);
            DB::table('chords')->insert(['name' => $letter.'m']);
            foreach($modifiers as $modifier){
                DB::table('chords')->insert(['name' => $letter.$modifier, 'key' => false]);
                DB::table('chords')->insert(['name' => $letter.'m'.$modifier, 'key' => false]);
            }
        }
    }
}
