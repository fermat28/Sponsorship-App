<?php

namespace App\Http\Controllers;

use App\Imports\NumeroImport;
use App\Models\Numero;
use App\Models\User;
use Illuminate\Http\Request;
use Excel;

class numberController extends Controller
{
    public function importCsv(Request $request)
    {
            Excel::import(new NumeroImport , $request->fichier);
            dd($request->fichier);
            return redirect()->back()->with('status', 'Records  Imported Successfully');
    }

    public function addview()

    {
            $numbers = User::all();
             return view('csv' , compact('numbers'));
    }
}
