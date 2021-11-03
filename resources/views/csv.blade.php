<!DOCTYPE html>
<html lang="en">
<head>
    @include('gabarits.header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <div>
        <div class="modal-dialog" role="document">

            <form method="POST" action="{{route("csv")}}"  enctype="multipart/form-data">
                @csrf()
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ajouter Liste Numero</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <label for="logo">
                    {{ __('List File') }}
                </label>
                <input type="file" name="fichier" class="form-control"> <br>
            {{-- <div class="modal-footer"> --}}
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            {{-- </div> --}}
        </div>
    </form>
        </div>
    </div>
    @include('gabarits.footer')
</body>
</html>
