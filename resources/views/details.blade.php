<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.0.2/dist/js/swiffy-slider.min.js" crossorigin="anonymous"
        defer></script>
    <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.0.2/dist/css/swiffy-slider.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link rel="stylesheet" href="tailwind.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.2/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<style>
    .dark {
        background-color: rgba(0, 0, 0, 0.7);
    }
</style>

<body>
    <div class="dark">
        <div class="w-11/12 mx-auto h-screen z-10">

            <div class="swiffy-slider h-full">
                <!-- slider items -->
                <ul class="slider-container h-full text-white">
                    @foreach ($filleul as $fil)
                    @foreach ($parrain as $p)
                    @if ($fil->id_etudiant == $p->id_etudiant)
                    <li>
                        <div class="h-full">
                            <div class=" w-full h-full border flex">
                                <div
                                    class="w-1/2 h-full dark overflow-hidden flex flex-col justify-center items-center">
                                    <div>
                                        <img class="object-center object-cover h-96 w-96"
                                            src="{{asset("assets/img/pp/$filiere/parrains/$p->profile_photo") }}"
                                            alt="photo" />
                                    </div>
                                    <div class="">
                                        <p class="font-semibold text-xs md:text-base ">{{$p->nom." ".$p->prenom}}</p>
                                        <p class="md:text-sm text-xs">{{$p->filiere}}</p>
                                        <p class="md:text-sm text-xs">{{$p->telephone}}</p>
                                    </div>
                                </div>
                                <div class="w-1/2 dark p-4 flex flex-col justify-center leading-normal">
                                    <div class="flex items-center mt-2">
                                        <img class="w-96 h-96  object-cover mr-4"
                                            src="{{asset("assets/img/pp/$filiere/filleuls/$fil->profile_photo") }}"
                                            alt="Avatar of Jonathan Reinink" />
                                        <div class="text-xl">
                                            <p class=" leading-none">{{$fil->nom." ".$fil->prenom}}</p>
                                            <p class="">{{$fil->telephone}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </li>
                    @endif
                    @endforeach
                  @endforeach
                </ul>
                <!-- les bouton de controle -->
                <button type="button" class="slider-nav"></button>
                <button type="button" class="slider-nav slider-nav-next"></button>

                <!-- les indicateurs -->
                <div class="slider-indicators ">
                    @foreach ($filleul as $fil)
                    @foreach ($parrain as $p)
                    @if ($fil->id_etudiant == $p->id_etudiant)
                    <button class=""></button>
                    @endif
                    @endforeach
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</body>

</html>
