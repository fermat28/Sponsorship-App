<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tailwind.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.2/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
    <style>

    </style>
</head>

<body>
<div id='yo'>
    <main class="font-mono">
        <!-- component -->
        <section class="container mx-auto p-6 ">
            <div class="md:flex justify-between">
                <h1 class="border-l-4 border-blue-500  pl-3 text-3xl font-semibold mb-3">Département {{$filiere}}</h1>
                <p class="my-5 md:my-0"><button id="buttonId" class="p-3 text-white bg-blue-500 hover:bg-blue-700">attribuer les
                        Parrains</button></p>
            </div>
            <div class="md:grid grid-cols-2 gap-3 w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                <div class="w-full overflow-x-auto">
                    <h3 class="text-2xl mb-3">Les Parrains</h3>
                    <table class="w-full">
                        <thead>
                            <tr
                                class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                <th class="px-4 py-3">Numéro</th>
                                <th class="px-4 py-3">Nom</th>
                                <th class="px-4 py-3">Axe</th>
                                <th class="px-4 py-3">Contact</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($parrain as $p)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 text-ms font-semibold border">{{$p->id}}</td>
                                <td class="px-4 py-3 border">
                                    <div class="flex items-center text-sm">
                                        <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded-full"
                                                src="{{asset("assets/img/pp/$p->profile_photo") }}"
                                                alt="" loading="lazy" />
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                            </div>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-black">{{$p->nom." ".$p->prenom}}</p>
                                            <p class="text-xs text-gray-600">{{$p->sexe}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-ms font-semibold border">{{$p->filiere}}</td>
                                <td class="px-4 py-3 text-xs border">
                                    {{$p->telephone}}
                                </td>
                            </tr>
                          @endforeach


                        </tbody>
                    </table>
                </div>
                <div class="w-full overflow-x-auto">
                    <h3 class="text-2xl mb-3">Les Fieuls</h3>
                    <table class="w-full">
                        <thead>
                            <tr
                                class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                <th class="px-4 py-3">Numéro</th>
                                <th class="px-4 py-3">Nom</th>
                                <th class="px-4 py-3">Axe</th>
                                <th class="px-4 py-3">Contact</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($filleul as $fil)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 text-ms font-semibold border">{{$fil->id}}</td>
                                <td class="px-4 py-3 border">
                                    <div class="flex items-center text-sm">
                                        <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded-full"
                                                src="{{asset("assets/img/pp/$fil->profile_photo") }}"
                                                alt="" loading="lazy" />
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                            </div>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-black">{{$fil->nom." ".$fil->prenom}}</p>
                                            <p class="text-xs text-gray-600">{{$fil->sexe}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-ms font-semibold border">{{$fil->filiere}}</td>
                                <td class="px-4 py-3 text-xs border">
                                    {{$fil->telephone}}
                                </td>
                            </tr>
                   @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
</div>
<style>
    .imoge{
      z-index: -4;
      margin-left: 35%;
      margin-top: 10%;

    }
</style>
    <img class="imoge" src={{ asset("assets/bankai.gif") }} id="imgid" style="display:none" class="gif"/>
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
<script>
    $('#buttonId').click(function(){
        $("body").css("background-color" , "black");
        $('#yo').hide();
        $('#imgid').show(); //this is where you'll show your loading gif
        setTimeout(function(){window.location= "{{route('parr')}}" ;}, 5000);
     })
    </script>
</body>

</html>
