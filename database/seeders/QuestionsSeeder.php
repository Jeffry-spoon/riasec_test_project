<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Questions;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $questionsList = [
            ['id' => 1,
            'questions_text' => 'Melakukan pemeliharaan rutin pada mesin.',
            'types_id'=> 1,
            'categories_id'=> 1,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
          ],
           ['id' => 2,
            'questions_text' => 'Memasang kabel dalam rumah.',
            'types_id'=> 1,
            'categories_id'=> 1,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
          ],
           ['id' => 3,
            'questions_text' => 'Mengoperasikan mesin berat.',
            'types_id'=> 1,
            'categories_id'=> 1,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
          ],
           ['id' => 4,
            'questions_text' => 'Mengelas bagian logam menjadi satu.',
            'types_id'=> 1,
            'categories_id'=> 1,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
          ],
           ['id' => 5,
            'questions_text' => 'Melakukan eksperimen ilmiah.',
            'types_id'=> 1,
            'categories_id'=> 1,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
          ],
           ['id' => 6,
            'questions_text' => 'Meningkatkan efisiensi dalam bisnis.',
            'types_id'=> 1,
            'categories_id'=> 2,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
          ],
          ['id' => 7,
            'questions_text' => 'Mengembangkan obat baru dalam laboratorium.',
            'types_id'=> 1,
            'categories_id'=> 2,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
          ],
          ['id' => 8,
            'questions_text' => 'Meneliti monumen purbakala.',
            'types_id'=> 1,
            'categories_id'=> 2,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
          ],
          ['id' => 9,
            'questions_text' => 'Meneliti serangga dalam laboratorium.',
            'types_id'=> 1,
            'categories_id'=> 2,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
          ],
          ['id' => 10,
            'questions_text' => 'Meneliti mineral dalam tanah.',
            'types_id'=> 1,
            'categories_id'=> 2,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
          ],
          ['id' => 11,
            'questions_text' => 'Berakting dalam drama.',
            'types_id'=> 1,
            'categories_id'=> 3,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
          ],
          ['id' => 12,
            'questions_text' => 'Memainkan alat musik.',
            'types_id'=> 1,
            'categories_id'=> 3,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
          ],
          ['id' => 13,
            'questions_text' => 'Memainkan alat musik.',
            'types_id'=> 1,
            'categories_id'=> 3,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
          ],
          ['id' => 14,
            'questions_text' => 'Menulis buku.',
            'types_id'=> 1,
            'categories_id'=> 3,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
          ],
          ['id' => 15,
            'questions_text' => 'Menulis puisi.',
            'types_id'=> 1,
            'categories_id'=> 3,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
          ],
          ['id' => 16,
            'questions_text' => 'Memberikan konsultasi kepada orang untuk membantu mereka menghadapi masalah mereka.',
            'types_id'=> 1,
            'categories_id'=> 4,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
          ],
          ['id' => 17,
            'questions_text' => 'Mengadakan acara amal.',
            'types_id'=> 1,
            'categories_id'=> 4,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
          ],
          ['id' => 18,
            'questions_text' => 'Menjaga anak - anak.',
            'types_id'=> 1,
            'categories_id'=> 4,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
          ],
          ['id' => 19,
            'questions_text' => 'Mengajar di sekolah.',
            'types_id'=> 1,
            'categories_id'=> 4,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
          ],
          ['id' => 20,
            'questions_text' => 'Mengajar keterampilan hidup.',
            'types_id'=> 1,
            'categories_id'=> 4,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
          ],
          ['id' => 21,
            'questions_text' => 'Mengajar keterampilan hidup.',
            'types_id'=> 1,
            'categories_id'=> 5,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
          ],
          ['id' => 22,
            'questions_text' => 'Meningkatkan efisiensi dalam bisnis.',
            'types_id'=> 1,
            'categories_id'=> 5,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
          ],
          ['id' => 23,
            'questions_text' => 'Mengatur departemen pemasaran.',
            'types_id'=> 1,
            'categories_id'=> 5,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
          ],
          ['id' => 24,
            'questions_text' => 'Membimbing staf dalam perusahaan.',
            'types_id'=> 1,
            'categories_id'=> 5,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
          ],
          ['id' => 25,
            'questions_text' => 'Menegosiasikan gaji bagi orang-orang.',
            'types_id'=> 1,
            'categories_id'=> 5,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
          ],
          ['id' => 26,
            'questions_text' => 'Mengarsipkan dokumen untuk perusahaan.',
            'types_id'=> 1,
            'categories_id'=> 6,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
          ],
          ['id' => 27,
            'questions_text' => 'Menghitung upah dan gaji karyawan.',
            'types_id'=> 1,
            'categories_id'=> 6,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
          ],
          ['id' => 28,
            'questions_text' => 'Memantau pembukaan perusahaan.',
            'types_id'=> 1,
            'categories_id'=> 6,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
          ],
          ['id' => 29,
            'questions_text' => 'Memesan persediaan kantor.',
            'types_id'=> 1,
            'categories_id'=> 6,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
          ],
          ['id' => 30,
            'questions_text' => 'Mengatur transportasi produk dari pabrik.',
            'types_id'=> 1,
            'categories_id'=> 6,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
          ],
          ];

    Questions::insert($questionsList);


    }
}
