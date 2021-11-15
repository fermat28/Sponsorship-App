<?php

namespace App\Http\Controllers;

use App\Models\filiere;
use App\Models\filleul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class filiereController extends Controller
{
    public function Acceuil()
    {
        $filieres = filiere::all();
        return view("Acceuil" , compact("filieres"));
    }

    public function list($filiere = null)
    {
        $filleul = DB::table('users')->where([["niveau",3] , ["filiere",$filiere]])->get();
        $parrain = DB::table('users')->where([["niveau", 4] , ["filiere",$filiere]])->get();
        return view("list" , compact("filleul" , "parrain" , "filiere"));
    }
    public function details()
    {

        $filleul = DB::table('users')->join("filleuls" ,  "users.id" , "=" , "filleuls.id_etudiant")->get();
        $parrain = DB::table('users')->join("filleuls" ,  "users.id" , "=" , "filleuls.id_parrain")->get();

        return view("details" , compact("filleul" , "parrain"));
    }

    public function parrainer()
    {
        $parrainsize = DB::table('users')->where("niveau", 4)->count();
        $filleulsize =  DB::table('users')->where("niveau", 3)->count();
        $filleul = DB::table('users')->where("niveau", 3)->get();
        foreach ($filleul as $f) {
            $tabid[] = $f->id;
        }
        $parrains = DB::table('users')->where("niveau", 4)->get();
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
                    $filleulExists = DB::table('filleuls')->where([['id_etudiant', "=", $randomFilleulsId], ['id_parrain', "=", $randomParrainId]])->exists();
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
                    $filleulExists = DB::table('filleuls')->where([['id_etudiant', "=", $randomFilleulsId], ['id_parrain', "=", $randomParrainId]])->exists();
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
        return redirect()->route('details');
    }


}
