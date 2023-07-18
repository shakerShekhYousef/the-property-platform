<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function swap($locale)
    {
        session()->put('curr_language', $locale);
        App::setLocale($locale);
        return redirect()->back();
    }

}
