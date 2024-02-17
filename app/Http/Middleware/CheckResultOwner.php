<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Results;

class CheckResultOwner
{
    public function handle(Request $request, Closure $next)
    {
        $resultId = $request->route('slug');
        $result = Results::findOrFail($resultId);

        if ($result->user_id !== auth()->id()) {
            return redirect()->route('home')->with('error', 'Anda tidak memiliki izin untuk mengakses hasil tes ini.');
        }

        return $next($request);
    }
}
