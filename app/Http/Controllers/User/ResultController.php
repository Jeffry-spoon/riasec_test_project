<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Results;
use App\Models\User;
use Illuminate\Http\Request;

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

    //  dd($id);

        $result = Results::find($id);


        // Memastikan hasil ditemukan
        if ($result) {
            //mengakses nama pengguna terkait
            $userId = $result->user_id;
            $score = json_decode($result->score);
            $userData = User::where('id', $userId)->first(); // Menggunakan first() untuk mendapatkan satu objek
            $userName = $userData->name;
            $scoreToArray = get_object_vars($score);
            arsort($scoreToArray);
            $topCategories = array_slice($scoreToArray, 0, 3, true);


            // dd($result, $userId, $userName, $score, $topCategories);
        } else {
            abort(404);
        }


    return view ('/user/result', compact('userName', 'topCategories', 'score'));
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