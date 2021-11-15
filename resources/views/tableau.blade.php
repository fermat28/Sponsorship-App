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
           <h3><i class="fa fa-angle-right"></i> Tableau de Parrainage </h3>
           <div class="row">
               <div class="col-md-12">
                 <div class="content-panel">
                   <table class="table table-striped table-advance table-hover">
                     <hr>
               <thead>
                 <tr>
                    <th scope="col">#</th>
                   <th scope="col">Filleul</th>
                   <th scope="col">Parrain</th>
                 </tr>
               </thead>
               <tbody>
                   @foreach ($filleul as $fil)
                      @foreach ($parrain as $p)
                      @if ($fil->id_etudiant == $p->id_etudiant)
                   <tr>
                    <th>{{$fil->id}}</th>
                       <th><img width="50" height="50" src="{{asset("assets/img/pp/$fil->profile_photo") }}" />  {{$fil->nom." ".$fil->prenom}}</th>
                       <td><img width="50" height="50" src="{{asset("assets/img/pp/$p->profile_photo") }}"/> {{$p->nom." ".$p->prenom}}</td>
                     </tr>
                     @endif
                     @endforeach
                   @endforeach
               </tbody>
             </table>
           </div>
       </form>

           </div>
       </div>

       <div class="py-12">
   </body>

   </html>


    @include('gabarits.footer')
</body>
</html>
