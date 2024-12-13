<?php
namespace Database\Seeders;
use App\Models\Round;
use Illuminate\Database\Seeder;

class RoundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Round::create([
            'name' => 'Ronde 1',
            'description' => '- Peserta 200  Penyisihan 100
                                - 15 Menit 
                                - 20 Bank soal -> pilihan ganda A,B,C,D
                                - Soal Pengetahuan Umum 
                                ',
            'duration' => 900,
        ]);
    }
}