<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

    $listCategories = [
        [
            'id' => 1,
            'category_text' => 'REALISTIC',
            'slug' => 'realistic',
            'description'=> 'Orang-orang ini sering baik dalam pekerjaan mekanik atau atletik. Jurusan kuliah yang baik untuk orang-orang Realistis adalah..
            - Pertanian
            - Asisten Kesehatan
            - Komputer
            - Konstruksi
            - Mekanik/Mesin
            - Teknik
            - Makanan dan Perhotelan',
            'images' => 'images/realistic.png',
            'user_id' => 1,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ],
        [
            'id' => 2,
            'description'=> 'Orang-orang ini suka menonton, belajar, menganalisis, dan memecahkan masalah. Jurusan-jurusan yang cocok untuk orang-orang dengan sifat Investigative adalah...
            - Biologi Kelautan
            - Teknik
            - Kimia
            - Zoologi
            - Kedokteran/Bedah
            - Ekonomi Konsumen
            - Psikologi',
            'category_text' => 'INVESTIGATIVE',
            'slug' => 'investigative',
            'images' => 'images/invetigative.png',
            'user_id' => 1,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ],
        [
            'id' => 3,
            'description'=> 'Orang-orang ini suka bekerja dalam situasi yang tidak terstruktur di mana mereka dapat menggunakan kreativitas mereka.
            Jurusan-jurusan yang bisa dipertimbangkan:
            - Komunikasi
            - Kosmetologi
            - Seni Rupa dan Pertunjukan
            - Fotografi
            - Radio dan Televisi
            - Desain Interior
            - Arsitektur
            - Pelayanan Publik dan Kemanusiaan
            - Seni dan Komunikasi',
            'category_text' => 'ARTISTIC',
            'slug' => 'artistic',
            'images' => 'images/artisitic.png',
            'user_id' => 1,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ],
        [
            'id' => 4,
            'description'=> 'Orang-orang ini suka bekerja dengan orang lain, daripada dengan barang. Jurusan-jurusan yang cocok untuk orang-orang dengan sifat Sosial adalah...
            - Konseling
            - Keperawatan
            - Terapi Fisik
            - Perjalanan
            - Periklanan
            - Hubungan Masyarakat
            - Pendidikan',
            'category_text' => 'SOCIAL',
            'slug' => 'social',
            'images' => 'images/social.png',
            'user_id' => 1,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ],
        [
            'id' => 5,
            'description'=> 'Orang-orang ini suka bekerja dengan orang lain dan menikmati meyakinkan dan tampil. Jurusan-jurusan yang cocok untuk orang-orang dengan sifat Enterprising adalah...
            - Pemasaran Mode
            - Properti
            - Pemasaran/Penjualan
            - Hukum
             -Ilmu Politik
            - Perdagangan Internasional
            - Perbankan/Keuangan',
            'category_text' => 'ENTERPRISING',
            'slug' => 'enterprising',
            'images' => 'images/enterprising.png',
            'user_id' => 1,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ],
        [
            'id' => 6,
            'description'=> 'Orang-orang ini sangat memperhatikan detail, terorganisir, dan menyukai pekerjaan dengan data. Jurusan-jurusan yang cocok untuk orang-orang dengan sifat Konvensional adalah...
            - Akuntansi
            - Pelaporan Pengadilan
            - Asuransi
            - Administrasi
            - Rekam Medis
            - Perbankan
            - Pemrosesan Data',
            'category_text' => 'CONVENTIONAL',
            'slug' => 'conventional',
            'images' => 'images/conventional.png',
            'user_id' => 1,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ],
    ];

    Categories::insert($listCategories);
    }
}
