<?php

namespace App\Http\Controllers;

use App\Models\UserAvator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $userAvator = UserAvator::where('user_id', Auth::user()->id)->first();
            if (empty($userAvator)) {
                return redirect()->route('user_avators.create');
            }
            return redirect()->route('challenges.create');
        }

        return view('welcome');
    }
}
