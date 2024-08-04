<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Types;
use App\Models\User;
use App\Models\Results;
use App\Models\Questions;
use App\Models\Categories;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Contracts\Session\Session as SessionSession;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Types $types, Questions $question)
    {

      // Mendapatkan tipe yang aktif sebagai koleksi
     $typesCollection = Types::where('is_active', 1)->get();

    // Inisialisasi array untuk menyimpan pertanyaan
    $questions = [];

    // Loop melalui setiap tipe
    foreach ($typesCollection  as $type) {
        // Ambil pertanyaan untuk setiap tipe
        $questions[$type->id] = Questions::where('types_id', $type->id)->get();

        $categoryTexts = Categories::whereIn('id', $questions[$type->id]->pluck('categories_id'))->pluck('category_text', 'id')->toArray();

        foreach ($questions[$type->id] as $question) {
        $question->category_text = $categoryTexts[$question->categories_id] ?? null;
        $category = $question->category_text;
        $groupedQuestions[$category][] = $question;

        }
    }

    // Group questions by category
    $groupedQuestions = [];
    foreach ($typesCollection as $type) {
        foreach ($questions[$type->id] as $question) {
            $category = $question->category_text;
            $groupedQuestions[$category][] = $question;
    }

    $chunkedQuestions = [];
    foreach ($groupedQuestions as $category => $categoryQuestions) {
    $categoryQuestions = collect($categoryQuestions);
    // Convert to collection
    $chunkedQuestions[$category] = array_chunk($categoryQuestions->toArray(), 10);
    }

    $allCategories = array_keys($chunkedQuestions);
    $uniqueCategories = array_values(array_unique($allCategories));

    Session::put('current_type_id', $types->id);
    Session::put('current_type_name', $types->type_name);

    return view('user/quiz', compact('typesCollection', 'chunkedQuestions', 'uniqueCategories'));
    }
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user_tz = 'Asia/Jakarta';

        // Mendapatkan tipe yang aktif sebagai koleksi
        $typesCollection = Types::where('is_active', 1)->get();

        // Ambil data jawaban dari request
        $userAnswers = $request->input('userAnswers');

        // Parsing waktu mulai dan waktu selesai dengan zona waktu pengguna
        $startTime = Carbon::parse($request['startTime'])->tz($user_tz);
        $endTime = Carbon::parse($request['endTime'])->tz($user_tz);

        // Menghitung selisih waktu antara waktu mulai dan waktu selesai
        $duration = $endTime->diff($startTime);

        // Format hasil selisih waktu
        $durationFormatted = $duration->format('%H:%I:%S');

        // Menghitung durasi jika tidak disediakan
        if (!$duration) {
            $duration = $endTime->diffInSeconds($startTime);
        }

        // Inisialisasi array untuk menyimpan hasil per kategori
        $categoryResults = [];

        // Loop melalui setiap kategori pada jawaban pengguna
        foreach ($userAnswers as $category => $answers) {
            // Hitung jumlah jawaban yang memiliki nilai tertentu (misalnya, "6")
            $totalAnswers = array_sum($answers);

            // Simpan hasil per kategori
            $categoryResults[$category] = $totalAnswers;
        }

        // Mendapatkan type_id dari koleksi Types
        $typeId = $typesCollection->pluck('id')->first();

        // Mendapatkan ID pengguna yang sedang masuk
        $user = Auth::user();
        $userID = $user->id;

        // Mendapatkan kembali data event dari session
        $temporaryEvent = Session::get('temporary_event');

        try {
            // Insert ke database
            $result = Results::create([
                'user_id' => $userID,
                'types_id' => $typeId,
                'score' => json_encode($categoryResults),
                'start_time' => $startTime,
                'end_time' => $endTime,
                'difference' => $durationFormatted,
                'event_id' => $temporaryEvent,
            ]);

            // Mengembalikan ID hasil yang baru saja dimasukkan
            return response()->json([
                'id' => $result->id,
            ]);
        } catch (\Exception $e) {
            // Jika terjadi kesalahan saat memasukkan data, Anda dapat menangani kasus tersebut sesuai kebutuhan
            return response()->json([
                'error' => 'Failed to create result',
                'message' => $e->getMessage(), // Mengirim pesan kesalahan untuk tujuan debug
            ], 500); // Menyertakan kode status 500 untuk menunjukkan kesalahan server
        }

    }



    /**
     * Display the specified resource.
     */
    public function show(Types $types)
    {
        return view('quiz');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Types $types)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Types $types)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Types $types)
    {
        //
    }
}
