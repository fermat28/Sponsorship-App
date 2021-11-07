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
     <section id="container">
       <!-- **********************************************************************************************************************************************************
           TOP BAR CONTENT & NOTIFICATIONS
           *********************************************************************************************************************************************************** -->
       <!--header start-->
       @include('gabarits.sidebar')
       <!--sidebar end-->
       <!-- **********************************************************************************************************************************************************
           MAIN CONTENT
           *********************************************************************************************************************************************************** -->
       <!--main content start-->
       <section id="main-content">
         <section class="wrapper">
           <h3><i class="fa fa-angle-right"></i> Gestion des Etudiants </h3>
           <div class="row">
               <div class="col-md-12">
                 <div class="content-panel">
                   <table class="table table-striped table-advance table-hover">
                     <h4><i class="fa fa-angle-right"></i> Liste des Etudiants <a class="btn btn-success" title="Parrainer" href="{{route("index")}}"> <i class="fa fa-trash"></i></a></h4>
                     <hr>
               <thead>
                 <tr>
                   <th scope="col">Nom</th>
                   <th scope="col">Prenom</th>
                   <th scope="col">Niveau</th>
                   <th scope="col">Filiere</th>
                 </tr>
               </thead>
               <tbody>
                   @foreach ($user as $users)
                   <tr>
                       <th>{{$users->nom}}</th>
                       <td>{{$users->prenom}}</td>
                       <td>{{$users->niveau}}</td>
                       <td>{{$users->filiere}}<td>
                     </tr>
                   @endforeach
               </tbody>
             </table>


                    {{-- Modal Create --}}
       {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog" role="document">

               <form method="POST" action="{{route('admin.userStore')}}"  enctype="multipart/form-data">
                   @csrf()
           <div class="modal-content">
               <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Créer Matiere</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
               </div>
               <div class="modal-body">
                   <label for="name">
                       {{ __('nom') }}
                   </label>
                   <input type="text" name="name" class="form-control md-6"> <br>
                   <label for="code">
                       {{ __('Code') }}
                   </label>
                   <input type="text" name="code" class="form-control md-6"> <br>
                   {{-- <label for="logo">
                       {{ __('logo') }}
                   </label>
                   <input type="file" name="logo" class="form-control"> <br> --}}
                 {{--  <label for="active">
                       {{ __('active') }}
                   </label>

                   <select name="active" class="form-control">
                       <option value="1">actif</option>
                       <option value="0">inactif</option>
                   </select>
                   <br>
               </div><br>
               {{-- <div class="modal-footer"> --}}
               {{-- </div> --}}
           </div>
       </form>

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
    @include('gabarits.footer')
</body>
</html>
