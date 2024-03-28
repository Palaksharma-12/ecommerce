<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Language;
use Illuminate\Support\Facades\DB;


class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */ 
    
    public function handle(Request $request, Closure $next)
   
    {
        // dd('ghjkl;');
        // Retrieve the first language from the database
        $language = DB::table('languages')->first();

        // dd($language);

        // If a language is found, set the application locale to its code
        if ($language) {
            App::setLocale($language->code);
        } else {
            // If no language is found, fallback to English
            App::setLocale('en');
        }

    
        return $next($request);
    }
}
