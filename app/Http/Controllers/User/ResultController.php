<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Results;
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
    public function show(Request $request)
    {
    //     // Ambil data hasil dari request
    // $categoryResults = $request->input('categoryResults');

    // // Tambahkan pernyataan dd untuk melihat data hasil
    // dd($categoryResults);

    // // Anda dapat melakukan apa pun yang diperlukan dengan data hasil ini,
    // // misalnya, menyimpannya ke database atau langsung melewatkan ke view.

    // // Misalnya, melewatkan data hasil ke view
    // return view('user.result', compact('categoryResults'));

    return view ('user.result');
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