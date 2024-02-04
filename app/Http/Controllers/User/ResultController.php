<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\ExportDump;
use App\Models\Results;
use App\Models\User;
use App\Models\Jobs;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ResultController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show ($id)
    {
        $result = Results::find($id);
        $categoriesResult = Categories::all();

        // Memastikan hasil ditemukan
        if ($result) {
            //mengakses nama pengguna terkait
            $userId = $result->user_id;
            $score = json_decode($result->score);
            $unsort = $score;
            $userData = User::where('id', $userId)->first(); // Menggunakan first() untuk mendapatkan satu objek
            $userName = $userData->name;
            $scoreToArray = get_object_vars($score);
            $unsort = get_object_vars($score);
            arsort($scoreToArray);
            $highlightCategories = array_slice($scoreToArray, 0, 3, true);
            $topSixCategories = array_slice($scoreToArray, 0, 6, true);


            // dd($result, $userId, $userName, $score, $topCategories);
        } else {
            abort(404);
        }

        $topThreeCategoryNames = array_keys($highlightCategories);
        $category = Categories::whereIn('category_text', $topThreeCategoryNames)->get();

        $categoryValues = [];
            foreach ($category as $categoryItem) {
                $categoryValues[] = $categoryItem->getAttributes();
            }

        // $jobs = [];
        // foreach ($category as $category) {
        //     // Ambil jobs berdasarkan categories_id
        //     $jobs[$category->category_text] = Jobs::where('categories_id', $category->id)->pluck('jobs_text');
        // }

        $mergetArray= [];
        foreach ($categoryValues as $category) {
            $categoryText = $category['category_text'];
            $mergetArray[] = [
                'category' => $category,
            ];
        }

        // Simpan data ke dalam table export_dump
        $exportDump = ExportDump::create([
            'result_id' => $result->id,
            'name' => $userName,
            'score' => json_encode($unsort),
            'description' => json_encode($mergetArray),
        ]);

        return view('/user/result', compact('result', 'userName', 'unsort', 'mergetArray'));
    }

    public function viewPDF($id)
    {
      $data = ExportDump::where('result_id', $id)->first();
      $category = Categories::all();

      $jobs = [];
      foreach ($category as $cate) {
          // Ambil jobs berdasarkan categories_id
          $jobs[$cate->category_text] = Jobs::where('categories_id', $cate->id)->pluck('jobs_text');
      }

      $mergetArray= [];
      foreach ($category as $category) {
          $categoryText = $category['category_text'];
          $categoryJobs = $jobs[$categoryText] ?? [];
          $mergetArray[] = [
              'category' => $category,
              'jobs' => $categoryJobs,
          ];
      }

      $pdf = PDF::loadView('user/pdf-export', compact('data', 'category', 'mergetArray'));

      $pdf->setPaper('landscape');

      return $pdf->download('result.pdf');
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Results $results)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Results $results)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Results $results)
    {
        //
    }


}