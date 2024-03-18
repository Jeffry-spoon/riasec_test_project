<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\MailNotify;
use App\Models\Categories;
use App\Models\Event;
use App\Models\ExportDump;
use App\Models\Results;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Models\UsersDetail;
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
    public function show ($slug)
    {

        $result = Results::where('slug', $slug)->first();
        $categoriesResult = Categories::all();
        // Memastikan hasil ditemukan
        if ($result) {
            //mengakses nama pengguna terkait
            $userId = $result->user_id;

            $eventId = $result->event_id;
            $score = json_decode($result->score);
            $unsort = $score;
            $userData = User::where('id', $userId)->first();

            $userDetailData = UsersDetail::where('user_id', $userId)
                                ->select('school_name', 'education_level')
                                ->first();

            $event = Event::where('id', $eventId)->first();
            $userName = $userData->name;
            $scoreToArray = get_object_vars($score);
            $unsort = get_object_vars($score);
            arsort($scoreToArray);
            $highlightCategories = array_slice($scoreToArray, 0, 3, true);
            $topSixCategories = array_slice($scoreToArray, 0, 6, true);
        } else {
            abort(404);
        }

        $topThreeCategoryNames = array_keys($highlightCategories);
        $category = Categories::whereIn('category_text', $topThreeCategoryNames)->get();

        $categoryValues = [];
            foreach ($category as $categoryItem) {
                $categoryValues[] = $categoryItem->getAttributes();
            }

        $mergetArray= [];
        foreach ($categoryValues as $category) {
            $categoryText = $category['category_text'];
            $mergetArray[] = [
                'category' => $category,
            ];
        }

        $userEmail = $userData->email;


        // Simpan data ke dalam table export_dump
        // $exportDump = ExportDump::create([
        //     'result_id' => $result->id,
        //     'name' => $userName,
        //     'school_name' => $userDetailData->school_name,
        //     'grade' => $userDetailData->education_level,
        //     'event' => $event->title,
        //     'score' => json_encode($unsort),
        //     'description' => json_encode($mergetArray),
        // ]);

        // Kirim email
         Mail::to($userEmail)->send(new MailNotify([
            'subject' => 'Test Result',
            'name' => $userName,
            'event' => $event->title,
            'score' => json_encode($unsort),
        ]));


        return view('/user/result', compact('result', 'userName', 'unsort', 'mergetArray', 'event'));
    }

    public function viewPDF($slug)
    {
      $data = ExportDump::where('result_id', $slug)->first();
      $category = Categories::all();

      $mergetArray= [];
      foreach ($category as $category) {
          $categoryText = $category['category_text'];
          $categoryJobs = $jobs[$categoryText] ?? [];
          $mergetArray[] = [
              'category' => $category,
          ];
      }

      $pdf = PDF::loadView('user/pdf-export', compact('data', 'mergetArray'));

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
