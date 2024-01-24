<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Types;
use App\Models\Questions;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Results;
use Symfony\Component\Console\Question\Question;
use lluminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;
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

    // // Loop melalui setiap tipe
    // foreach ($types as $type) {
    //     // Ambil pertanyaan untuk setiap tipe
    //     $questions[$type->id] = Questions::where('types_id', $type->id)->get();

        // Ambil data category_text dari Categories berdasarkan categories_id dan konversi ke associative array

    //     // Loop melalui setiap pertanyaan dan ganti categories_id dengan category_text
    //     foreach ($questions[$type->id] as $question) {
    //     $question->category_text = $categoryTexts[$question->categories_id] ?? null;
    //     unset($question->categories_id); // Hapus categories_id jika diperlukan
    //     }
    // }

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
    public function store(Request $request): RedirectResponse
    {

        // dd($request->all());
    // Mendapatkan tipe yang aktif sebagai koleksi
    $typesCollection = Types::where('is_active', 1)->get();

      // Ambil data jawaban dari request
      $userAnswers = $request->input('userAnswers');

      // Inisialisasi array untuk menyimpan hasil per kategori
      $categoryResults = [];

       // Mendapatkan type_id
    $typeId = $request->input('type_id');
    $typeName = $request->input('type_name');

      // Loop melalui setiap kategori pada jawaban pengguna
      foreach ($userAnswers as $category => $answers) {
          // Hitung jumlah jawaban yang memiliki nilai tertentu (misalnya, "6")
          $totalAnswers = array_sum($answers);

          // Simpan hasil per kategori
          $categoryResults[$category] = $totalAnswers;
      }

      // Mendapatkan type_id dari koleksi Types
    $typeId = $typesCollection->pluck('id')->first();
    $typeName = $typesCollection->pluck('type_name')->first();

      // Session masing - masing pengguna
      $username = Session::get('registration_username');
    //   dd($categoryResults, $typeId, $typeName);

      session(['quiz_completed' => true]);

      // Redirect ke ResultController dengan membawa data hasil
    //   return view('result.show', compact('categoryResults', 'typeId', 'typeName'));
    return redirect()->route('result.show', compact('categoryResults', 'typeId', 'typeName'));

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