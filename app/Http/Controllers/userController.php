<?php

namespace App\Http\Controllers;

use App\Imports\UserImport;
use App\Models\User;
use Illuminate\Http\Request;
use Excel;


class userController extends Controller
{
    //
    public function importCsv(Request $request)
    {
            Excel::import(new UserImport , $request->fichier);
            return redirect()->back()->with('status', 'Records  Imported Successfully');
    }

    public function addview()

    {
            $numbers = User::all();
             return view('csv' , compact('numbers'));
    }
}
