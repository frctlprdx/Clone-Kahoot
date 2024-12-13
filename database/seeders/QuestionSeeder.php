<?php
namespace Database\Seeders;
use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pastikan round_id sesuai dengan yang ada di tabel rounds
        $questions = [
            [
                'content' => 'Darimana alat musik Fu berasal?',
                'options' => json_encode(['a' => 'Sumatra', 'b' => 'Aceh', 'c' => 'Maluku Utara', 'd' => 'Kalimantan']),
                'correct_option' => 'c',
                'round_id' => 1
            ],
            [
                'content' => 'Kapan Hari Kebangkitan Nasional diperingati?',
                'options' => json_encode(['a' => '5 Mei', 'b' => '2 Juni', 'c' => '20 Mei', 'd' => '18 Juni']),
                'correct_option' => 'c',
                'round_id' => 1
            ],
            [
                'content' => 'Berapa jumlah program studi di Fakultas Ilmu Komputer UDINUS?',
                'options' => json_encode(['a' => '6', 'b' => '7', 'c' => '5', 'd' => '8']),
                'correct_option' => 'b',
                'round_id' => 1
            ],
            [
                'content' => 'Bahan bakar pesawat?',
                'options' => json_encode(['a' => 'Avtur', 'b' => 'Avgas', 'c' => 'Diesel', 'd' => 'Kerosene']),
                'correct_option' => 'a',
                'round_id' => 1
            ],
            [
                'content' => 'Apa nama sungai terpanjang di Amerika Serikat?',
                'options' => json_encode(['a' => 'Nil', 'b' => 'Amazon', 'c' => 'Missouri', 'd' => 'Mississippi']),
                'correct_option' => 'c',
                'round_id' => 1
            ],
            [
                'content' => 'Untuk menekan laju pertumbuhan penduduk, pemerintah menggalangkan program?',
                'options' => json_encode(['a' => 'Keluarga Berencana', 'b' => 'Bidik Misi', 'c' => 'Program Keluarga Harapan', 'd' => 'Pemulihan Ekonomi Nasional']),
                'correct_option' => 'a',
                'round_id' => 1
            ],
            [
                'content' => 'Dimana letak Lab Komputer di UDINUS?',
                'options' => json_encode(['a' => 'Gedung A', 'b' => 'Gedung C', 'c' => 'Gedung D', 'd' => 'Gedung H']),
                'correct_option' => 'd',
                'round_id' => 1
            ],
            [
                'content' => 'Apa nama alat yang digunakan untuk mengukur tekanan udara?',
                'options' => json_encode(['a' => 'Barometer', 'b' => 'Termometer', 'c' => 'Higrometer', 'd' => 'Parameter']),
                'correct_option' => 'a',
                'round_id' => 1
            ],
            [
                'content' => 'Siapakah presiden pertama Amerika Serikat?',
                'options' => json_encode(['a' => 'Joe Biden', 'b' => 'Abraham Lincoln', 'c' => 'James Buchanan', 'd' => 'George Washington']),
                'correct_option' => 'd',
                'round_id' => 1
            ],
            [
                'content' => 'Apa nama Ibukota Australia?',
                'options' => json_encode(['a' => 'Adelaide', 'b' => 'Brisbane', 'c' => 'Canberra', 'd' => 'Sydney']),
                'correct_option' => 'c',
                'round_id' => 1
            ],
            [
                'content' => 'Apa nama latin dari beras?',
                'options' => json_encode(['a' => 'Zingiber Officinale', 'b' => 'Oryza Sativa', 'c' => 'Mangifera Indica', 'd' => 'Pyrus']),
                'correct_option' => 'b',
                'round_id' => 1
            ],
            [
                'content' => 'Dimana letak gedung Fakultas Ilmu Komputer UDINUS?',
                'options' => json_encode(['a' => 'Gedung H', 'b' => 'Gedung A', 'c' => 'Gedung C', 'd' => 'Gedung I']),
                'correct_option' => 'a',
                'round_id' => 1
            ],
            [
                'content' => 'Ibukota Kabupaten Banyumas adalah?',
                'options' => json_encode(['a' => 'Sokaraja', 'b' => 'Ajibarang', 'c' => 'Purwokerto', 'd' => 'Banyumas']),
                'correct_option' => 'c',
                'round_id' => 1
            ],
            [
                'content' => 'Raja pertama Mataram Islam adalah?',
                'options' => json_encode(['a' => 'Sultan Hadiwijaya', 'b' => 'Danang Sutowijoyo', 'c' => 'Sultan Agung', 'd' => 'Sultan Hamengkubowono']),
                'correct_option' => 'b',
                'round_id' => 1
            ],
            [
                'content' => 'Pulau Bintan merupakan daerah penghasil?',
                'options' => json_encode(['a' => 'Minyak bumi', 'b' => 'Bauksit', 'c' => 'Kayu', 'd' => 'Batu bara']),
                'correct_option' => 'b',
                'round_id' => 1
            ],
            [
                'content' => 'Semboyan “ing ngarsa sung tuladha, ing madya mangun karsa, tut wuri handayani” dicetuskan oleh....',
                'options' => json_encode(['a' => 'Ki Hajar Dewantoro', 'b' => 'Prof. Dr. Soepomo', 'c' => 'Drs. Moh. Hatta', 'd' => 'Ir. Soekarno', 'e' => 'Mr. Moh. Yamin']),
                'correct_option' => 'a',
                'round_id' => 1
            ],
            [
                'content' => 'Ada berapa banyak biro/organisasi yang ada di Fakultas Ilmu Komputer?',
                'options' => json_encode(['a' => '8', 'b' => '9', 'c' => '10', 'd' => '11']),
                'correct_option' => 'b',
                'round_id' => 1
            ],
            [
                'content' => 'Siapakah nama Menteri Luar Negeri Indonesia Kabinet Merah Putih?',
                'options' => json_encode(['a' => 'Retno Marsudi', 'b' => 'Sugiono', 'c' => 'Budi Gunawan', 'd' => 'Muhammad Tito Karnavian']),
                'correct_option' => 'a',
                'round_id' => 1
            ],
            [
                'content' => 'Fakultas Ilmu Komputer UDINUS memiliki akreditasi apa untuk program studi Teknik Informatika?',
                'options' => json_encode(['a' => 'A', 'b' => 'B', 'c' => 'Unggul', 'd' => 'Baik Sekali']),
                'correct_option' => 'a',
                'round_id' => 1
            ],
            [
                'content' => 'Kota tertua di Jawa Tengah adalah?',
                'options' => json_encode(['a' => 'Magelang', 'b' => 'Semarang', 'c' => 'Solo', 'd' => 'Salatiga']),
                'correct_option' => 'b',
                'round_id' => 1
            ],
        ];

        // Insert all questions
        foreach ($questions as $question) {
            Question::create($question);
        }
    }
}