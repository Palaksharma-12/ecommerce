<?php

namespace App\Http\Controllers;
use App\Models\Language;


use Illuminate\Http\Request;

class LanguageController extends Controller
{
    //
    public function setLanguage(Request $request)
    {

       $existingLanguage = Language::first();

          if ($existingLanguage) {
       
            $existingLanguage->update([
            'code' => $request->code,
           ]);

           return redirect()->back();
    }
        // dd($request->all());
      $save = new Language;
      $save->code = $request->code;
      $save->save();
      return redirect()->back();

    }

    
    }

