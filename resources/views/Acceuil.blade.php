<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tailwind.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.2/tailwind.min.css" rel="stylesheet">
    <title>home</title>
</head>

<body class="font-mono">
    <main class="px-10">
        <section class="">
            <div class="md:flex items-center">
                <div class="flex-1">
                    <h1 class="text-2xl md:text-4xl font-semibold">Bienvenue Aux Parrainages de <span
                            class="text-blue-700">L'Ecole
                            Nationale Supérieure Polytechnique de Douala 2021/2022</span></h1>
                </div>
                <div class="flex-1">
                    <div>
                        <img src="./image/1.png" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section class="">
            <div>
                <div>
                    <label class="font-light text-gray-600">Ajouter des Etudiants</label>
                        <form method="POST" action="{{route("csv")}}">
                            @csrf()
                    <div class="flex items-center mt-2 mb-6">
                        <input type="file" name="fichier" class="w-full px-3 py-2 text-gray-700 border rounded">
                        <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 border border-blue-700 rounded hover:bg-blue-700">Valider</button>
                    </div>
                </form>
                <h1 class="border-l-4 ml-3 mb-5 border-blue-700 pl-3 text-2xl">Les Filières</h1>
                <div class="grid grid-cols-3">
                    @foreach ($filieres as $filiere)
                    <div class=" flex justify-center items-center px-5 m-2 h-10 text-red-100 transition-colors
                    duration-150a bg-blue-700 rounded-lg focus:shadow-outline hover:bg-red-800">
                        <a class="cursor-pointer w-full text-center" href="{{route('list' , ["filiere" => $filiere->nom])}}">
                            {{$filiere->nom}}
                        </a>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
    </main>
</body>

</html>
