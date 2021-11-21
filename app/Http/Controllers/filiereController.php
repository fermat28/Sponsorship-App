<?php

namespace App\Http\Controllers;

use App\Models\filiere;
use App\Models\filleul;
use GifCreator\GifCreator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class filiereController extends Controller
{
    public function Acceuil()
    {
        $filieres = filiere::all();
        return view("Acceuil", compact("filieres"));
    }

    public function list($filiere = null)
    {
        $filleul = DB::table('users')->where([["niveau", "=", 3], ["filiere", "=", $filiere]])->get();
        $parrain = DB::table('users')->where([["niveau", "=", 4], ["filiere", "=", $filiere]])->get();

        if (is_file(public_path("assets/img/pp/$filiere/parrains/$filiere._parrains.gif")) == false) {

            if ($handle = opendir(public_path("assets/img/pp/$filiere/parrains"))) {

                while (false !== ($entry = readdir($handle))) {

                    if ($entry != "." && $entry != "..") {
                        $imgFile = \Image::make(public_path("assets/img/pp/$filiere/parrains/$entry"));
                        $imgFile->resize(500, 500, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save(public_path("assets/img/pp/$filiere/parrains/$entry"));
                        $frames_parrains[]  = public_path("assets/img/pp/$filiere/parrains/$entry");
                    }
                }
                foreach ($frames_parrains as $fr) {
                    $i = 0;
                    $durations[] = 10;
                    $i++;
                }
                $gc = new GifCreator();
                $gc->create($frames_parrains, $durations, 4);
                $gifBinary = $gc->getGif();
                file_put_contents(public_path("assets/img/pp/$filiere/parrains/$filiere._parrains.gif"), $gifBinary);
                closedir($handle);
            }
        }

        if (is_file(public_path("assets/img/pp/$filiere/filleuls/$filiere._filleuls.gif")) == false) {

            if ($handle = opendir(public_path("assets/img/pp/$filiere/filleuls"))) {

                while (false !== ($entry = readdir($handle))) {

                    if ($entry != "." && $entry != "..") {
                        $imgFile = \Image::make( public_path("assets/img/pp/$filiere/filleuls/$entry"));
                        $imgFile->resize(500, 500, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save( public_path("assets/img/pp/$filiere/filleuls/$entry"));
                        $frames_filleuls[]  = public_path("assets/img/pp/$filiere/filleuls/$entry");
                    }
                }
                foreach ($frames_filleuls as $fro) {
                    // $i = 0;
                    $durations[] = 10;
                    // $i++;
                }
                $gc = new GifCreator();
                $gc->create($frames_filleuls, $durations, 4);
                $gifBinary = $gc->getGif();
                file_put_contents(public_path("assets/img/pp/$filiere/filleuls/$filiere._filleuls.gif"), $gifBinary);
                closedir($handle);
            }
        }
        return view("list", compact("filleul", "parrain", "filiere"));
    }
    public function details($filiere)
    {

        $filleul = DB::table('users')->join("filleuls",  "users.id", "=", "filleuls.id_etudiant")
            ->where("filiere", $filiere)->get();
        $parrain = DB::table('users')->join("filleuls",  "users.id", "=", "filleuls.id_parrain")
            ->where("filiere", $filiere)->get();
        return view("details", compact("filleul", "parrain", "filiere"));
    }

    public function parrainer($filiere)
    {
        $parrainsize = DB::table('users')->where([["niveau", 4], ["filiere", "=", $filiere]])->count();
        $filleulsize =  DB::table('users')->where([["niveau", 3], ["filiere", "=", $filiere]])->count();
        $filleul = DB::table('users')->where([["niveau", 3], ["filiere", "=", $filiere]])->get();
        foreach ($filleul as $f) {
            $tabid[] = $f->id;
        }
        $parrains = DB::table('users')->where([["niveau", 4], ["filiere", "=", $filiere]])->get();
        foreach ($parrains as $p) {
            $parrid[] = $p->id;
        }
        if ($filleulsize  <= $parrainsize) {
            foreach ($filleul as $tb) {
                while (DB::table('filleuls')->where('id_etudiant', $tb->id)->exists() == false) {
                    $k = array_rand($tabid);
                    $randomFilleulsId = $tabid[$k];
                    $kl = array_rand($parrid);
                    $randomParrainId = $parrid[$kl];
                    $filleulExists = DB::table('filleuls')
                        ->where([['id_etudiant', "=", $randomFilleulsId], ['id_parrain', "=", $randomParrainId]])
                        ->exists();
                    $yo = DB::table('filleuls')->where([['id_etudiant', "=", $randomFilleulsId]])->exists();
                    $foo = DB::table('filleuls')->where([['id_parrain', "=", $randomParrainId]])->exists();

                    $newFilleul = new filleul();
                    $newFilleul->id_etudiant = $randomFilleulsId;
                    $newFilleul->id_parrain = $randomParrainId;
                    if ($filleulExists != true && $yo != true && $foo != true) {
                        $save = $newFilleul->save();
                    }
                }
            }
        }
        if ($filleulsize > $parrainsize) {
            foreach ($parrains as $p) {
                while (DB::table('filleuls')->where('id_parrain', $p->id)->exists() == false) {
                    $k = array_rand($tabid);
                    $randomFilleulsId = $tabid[$k];
                    $kl = array_rand($parrid);
                    $randomParrainId = $parrid[$kl];
                    $filleulExists = DB::table('filleuls')
                        ->where([['id_etudiant', "=", $randomFilleulsId], ['id_parrain', "=", $randomParrainId]])
                        ->exists();
                    $yo = DB::table('filleuls')->where([['id_etudiant', "=", $randomFilleulsId]])->exists();
                    $foo = DB::table('filleuls')->where([['id_parrain', "=", $randomParrainId]])->exists();
                    if ($filleulExists != true && $yo != true && $foo != true) {
                        $newFilleul = new filleul();
                        $newFilleul->id_etudiant = $randomFilleulsId;
                        $newFilleul->id_parrain = $randomParrainId;
                        $save = $newFilleul->save();
                    }
                }
            }

            foreach ($filleul as $tb) {
                if (DB::table('filleuls')->where('id_etudiant', $tb->id)->exists() == false) {
                    $kl = array_rand($parrid);
                    $randomParrainId = $parrid[$kl];
                    $newFilleul = new filleul();
                    $newFilleul->id_etudiant = $tb->id;
                    $newFilleul->id_parrain = $parrid[array_rand($parrid)];
                    $save = $newFilleul->save();
                }
            }
        }

        return redirect()->route('details', ["filiere" => $filiere]);
    }
}
