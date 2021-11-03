<?php

namespace App\Imports;

use App\Models\Numero;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class NumeroImport implements ToModel , WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Numero([
            //
            'nom' => $row['nom'],
            'prenom' => $row['prenom'],
            'matricule' => $row['matricule'],
            "sexe" => $row["sexe"],
            "filiere" => $row["filiere"],
            "niveau" => $row["niveau"],
            "telephone" => $row["telephone"],
            "email" => $row["email"]
        ]);
    }
}
