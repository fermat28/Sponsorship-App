<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class UserImport implements ToModel , WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            //
            'nom' => $row['nom'],
            'prenom' => $row['prenom'],
            'matricule' => $row['matricule'],
            "sexe" => $row["sexe"],
            "filiere" => $row["filiere"],
            "niveau" => $row["niveau"],
            "telephone" => $row["telephone"],
            "email" => $row["email"],
            "profile_photo" => $row["profile_photo"]
        ]);
    }
}
