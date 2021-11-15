<!DOCTYPE html>
<html lang="en">

    <head>
        @include("gabarits.header")

     <!-- =======================================================
       Template Name: Dashio
       Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
       Author: TemplateMag.com
       License: https://templatemag.com/license/
     ======================================================= -->
   </head>

   <body>
    @include('gabarits.sidebar')
     <section id="container">
       <!-- **********************************************************************************************************************************************************
           TOP BAR CONTENT & NOTIFICATIONS
           *********************************************************************************************************************************************************** -->
       <!--header start-->

       <!--sidebar end-->
       <!-- **********************************************************************************************************************************************************
           MAIN CONTENT
           *********************************************************************************************************************************************************** -->
       <!--main content start-->
       <section id="main-content">
         <section class="wrapper">
            <div>
           <h3><i class="fa fa-angle-right"></i> Gestion des Etudiants </h3>
           <div class="row">
               <div class="col-md-12">
                 <div class="content-panel">
                   <table class="table table-striped table-advance table-hover">
                     <h4><i class="fa fa-angle-right"></i> Liste des Etudiants <a  title="Parrainer" href="{{route("index")}}"> <button id="parrain">parrainer</button></a></h4>
                     <hr>
               <thead>
                 <tr>
                    <th scope="col">#</th>
                   <th scope="col">Nom</th>
                   <th scope="col">Prenom</th>
                   <th scope="col">Niveau</th>
                   <th scope="col">Photo</th>
                 </tr>
               </thead>
               <tbody>
                   @foreach ($user as $users)
                   <tr>
                    <th>{{$users->id}}</th>
                       <th>{{$users->nom}}</th>
                       <td>{{$users->prenom}}</td>
                       <td>{{$users->niveau}}</td>
                       <td><img width="50" height="50" src="{{asset("assets/img/pp/$users->profile_photo") }}"/><td>
                     </tr>
                   @endforeach
               </tbody>
             </table>
           </div>
       </form>

           </div>
       </div>
    </div>
       <div class="py-12">
   </body>

   </html>
















    <div>
        <div class="modal-dialog" role="document">

            <form method="POST" action="{{route("csv")}}"  enctype="multipart/form-data">
                @csrf()
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ajouter Liste Etudiants</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <label for="logo">
                    {{ __('Fichier') }}
                </label>
                <input type="file" name="fichier" class="form-control"> <br>
            {{-- <div class="modal-footer"> --}}
            <button type="submit" class="btn btn-primary">Soumettre</button>
            {{-- </div> --}}
        </div>
    </form>


    {{-- </div> --}}
</div>
        </div>
    </div>

    <div class="container" >


 <img src="{{asset("assets/img/loading.gif")}}"/>
    </div>
    {{-- <script>
        const loader = document.querySelector(".loader");
        window.onload = function() {
            setTimeout(function() {
                loader.style.opacity = "0";
                setTimeout(function() {
                    loader.style.display = "none";
                }, 500);
            }, 5000);
        }
    </script> --}}
    @include('gabarits.footer')
</body>
</html>
