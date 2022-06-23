<?php

namespace App\Http\Middleware;

use App\Models\CommunityName;
use App\Models\HospitalName;
use App\Models\PersonalDetail;
use Closure;
use Illuminate\Http\Request;

class CheckAndSession
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('user')) {
            $userID = auth()->user()['userId'];
            $user = PersonalDetail::query()->where('userId', '=', $userID)->first();
            $request->session()->put('user', $user);
        }

        if (!$request->session()->has('hospitalName')) {
            $hospitalName = HospitalName::all();
            $request->session()->put('hospitalName', $hospitalName);
        }

        if (!$request->session()->has('communityName')) {
            $communityName = CommunityName::all();
            $request->session()->put('communityName', $communityName);
        }

        return $next($request);
    }
}
