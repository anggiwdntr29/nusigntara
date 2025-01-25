<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonSeeder extends Seeder
{
    /**
     * Seed the lessons table.
     *
     * @return void
     */
    public function run()
    {
        // Data lessons yang akan dimasukkan ke tabel lessons
        $lessons = [
            ['id_alfabet' => 1, 'text_indo' => 'Anjing', 'text_eng' => 'Dog', 'video_sibi' => 'url_to_video_sibi_anjing', 'video_bisindo' => 'url_to_video_bisindo_anjing', 'video_asl' => 'url_to_video_asl_anjing', 'image' => 'image'],
            ['id_alfabet' => 2, 'text_indo' => 'Buku', 'text_eng' => 'Book', 'video_sibi' => 'url_to_video_sibi_buku', 'video_bisindo' => 'url_to_video_bisindo_buku', 'video_asl' => 'url_to_video_asl_buku', 'image' => 'image'],
            ['id_alfabet' => 3, 'text_indo' => 'Cinta', 'text_eng' => 'Love', 'video_sibi' => 'url_to_video_sibi_cinta', 'video_bisindo' => 'url_to_video_bisindo_cinta', 'video_asl' => 'url_to_video_asl_cinta', 'image' => 'image'],
            ['id_alfabet' => 4, 'text_indo' => 'Dapur', 'text_eng' => 'Kitchen', 'video_sibi' => 'url_to_video_sibi_dapur', 'video_bisindo' => 'url_to_video_bisindo_dapur', 'video_asl' => 'url_to_video_asl_dapur', 'image' => 'image'],
            ['id_alfabet' => 5, 'text_indo' => 'Es', 'text_eng' => 'Ice', 'video_sibi' => 'url_to_video_sibi_es', 'video_bisindo' => 'url_to_video_bisindo_es', 'video_asl' => 'url_to_video_asl_es', 'image' => 'image'],
            ['id_alfabet' => 6, 'text_indo' => 'Foto', 'text_eng' => 'Photo', 'video_sibi' => 'url_to_video_sibi_foto', 'video_bisindo' => 'url_to_video_bisindo_foto', 'video_asl' => 'url_to_video_asl_foto', 'image' => 'image'],
            ['id_alfabet' => 7, 'text_indo' => 'Gula', 'text_eng' => 'Sugar', 'video_sibi' => 'url_to_video_sibi_gula', 'video_bisindo' => 'url_to_video_bisindo_gula', 'video_asl' => 'url_to_video_asl_gula', 'image' => 'image'],
            ['id_alfabet' => 8, 'text_indo' => 'Hari', 'text_eng' => 'Day', 'video_sibi' => 'url_to_video_sibi_hari', 'video_bisindo' => 'url_to_video_bisindo_hari', 'video_asl' => 'url_to_video_asl_hari', 'image' => 'image'],
            ['id_alfabet' => 9, 'text_indo' => 'Ikan', 'text_eng' => 'Fish', 'video_sibi' => 'url_to_video_sibi_ikan', 'video_bisindo' => 'url_to_video_bisindo_ikan', 'video_asl' => 'url_to_video_asl_ikan', 'image' => 'image'],
            ['id_alfabet' => 10, 'text_indo' => 'Jalan', 'text_eng' => 'Road', 'video_sibi' => 'url_to_video_sibi_jalan', 'video_bisindo' => 'url_to_video_bisindo_jalan', 'video_asl' => 'url_to_video_asl_jalan', 'image' => 'image'],
            ['id_alfabet' => 11, 'text_indo' => 'Kucing', 'text_eng' => 'Cat', 'video_sibi' => 'url_to_video_sibi_kucing', 'video_bisindo' => 'url_to_video_bisindo_kucing', 'video_asl' => 'url_to_video_asl_kucing', 'image' => 'image'],
            ['id_alfabet' => 12, 'text_indo' => 'Laut', 'text_eng' => 'Sea', 'video_sibi' => 'url_to_video_sibi_laut', 'video_bisindo' => 'url_to_video_bisindo_laut', 'video_asl' => 'url_to_video_asl_laut', 'image' => 'image'],
            ['id_alfabet' => 13, 'text_indo' => 'Makan', 'text_eng' => 'Eat', 'video_sibi' => 'url_to_video_sibi_makan', 'video_bisindo' => 'url_to_video_bisindo_makan', 'video_asl' => 'url_to_video_asl_makan', 'image' => 'image'],
            ['id_alfabet' => 14, 'text_indo' => 'Nama', 'text_eng' => 'Name', 'video_sibi' => 'url_to_video_sibi_nama', 'video_bisindo' => 'url_to_video_bisindo_nama', 'video_asl' => 'url_to_video_asl_nama', 'image' => 'image'],
            ['id_alfabet' => 15, 'text_indo' => 'Orang', 'text_eng' => 'Person', 'video_sibi' => 'url_to_video_sibi_orang', 'video_bisindo' => 'url_to_video_bisindo_orang', 'video_asl' => 'url_to_video_asl_orang', 'image' => 'image'],
            ['id_alfabet' => 16, 'text_indo' => 'Pintu', 'text_eng' => 'Door', 'video_sibi' => 'url_to_video_sibi_pintu', 'video_bisindo' => 'url_to_video_bisindo_pintu', 'video_asl' => 'url_to_video_asl_pintu', 'image' => 'image'],
            ['id_alfabet' => 17, 'text_indo' => 'Quest', 'text_eng' => 'Quest', 'video_sibi' => 'url_to_video_sibi_quest', 'video_bisindo' => 'url_to_video_bisindo_quest', 'video_asl' => 'url_to_video_asl_quest', 'image' => 'image'],
            ['id_alfabet' => 18, 'text_indo' => 'Roti', 'text_eng' => 'Bread', 'video_sibi' => 'url_to_video_sibi_roti', 'video_bisindo' => 'url_to_video_bisindo_roti', 'video_asl' => 'url_to_video_asl_roti', 'image' => 'image'],
            ['id_alfabet' => 19, 'text_indo' => 'Sapi', 'text_eng' => 'Cow', 'video_sibi' => 'url_to_video_sibi_sapi', 'video_bisindo' => 'url_to_video_bisindo_sapi', 'video_asl' => 'url_to_video_asl_sapi', 'image' => 'image'],
            ['id_alfabet' => 20, 'text_indo' => 'Tikus', 'text_eng' => 'Rat', 'video_sibi' => 'url_to_video_sibi_tikus', 'video_bisindo' => 'url_to_video_bisindo_tikus', 'video_asl' => 'url_to_video_asl_tikus', 'image' => 'image'],
            ['id_alfabet' => 21, 'text_indo' => 'Ular', 'text_eng' => 'Snake', 'video_sibi' => 'url_to_video_sibi_ular', 'video_bisindo' => 'url_to_video_bisindo_ular', 'video_asl' => 'url_to_video_asl_ular', 'image' => 'image'],
            ['id_alfabet' => 22, 'text_indo' => 'Vaksin', 'text_eng' => 'Vaccine', 'video_sibi' => 'url_to_video_sibi_vaksin', 'video_bisindo' => 'url_to_video_bisindo_vaksin', 'video_asl' => 'url_to_video_asl_vaksin', 'image' => 'image'],
            ['id_alfabet' => 23, 'text_indo' => 'Waktu', 'text_eng' => 'Time', 'video_sibi' => 'url_to_video_sibi_waktu', 'video_bisindo' => 'url_to_video_bisindo_waktu', 'video_asl' => 'url_to_video_asl_waktu', 'image' => 'image'],
            ['id_alfabet' => 24, 'text_indo' => 'Xylophone', 'text_eng' => 'Xylophone', 'video_sibi' => 'url_to_video_sibi_xylophone', 'video_bisindo' => 'url_to_video_bisindo_xylophone', 'video_asl' => 'url_to_video_asl_xylophone', 'image' => 'image'],
            ['id_alfabet' => 25, 'text_indo' => 'Yakin', 'text_eng' => 'Sure', 'video_sibi' => 'url_to_video_sibi_yakin', 'video_bisindo' => 'url_to_video_bisindo_yakin', 'video_asl' => 'url_to_video_asl_yakin', 'image' => 'image'],
            ['id_alfabet' => 26, 'text_indo' => 'Zebra', 'text_eng' => 'Zebra', 'video_sibi' => 'url_to_video_sibi_zebra', 'video_bisindo' => 'url_to_video_bisindo_zebra', 'video_asl' => 'url_to_video_asl_zebra', 'image' => 'image'],
            // New entry for Q
        ];
        

        // Menyisipkan data ke dalam tabel lessons
        DB::table('lessons')->insert($lessons);
    }
}
