<h1>{{ $modo }} empleado</h1>

@if(count($erros)>0)

    <div class="alert alert-danger" role="alert">

    <ul>
        @foreach($erros->all() as $error)

        <li>{{ $error }}</li>

        @endforeach
    </ul>
    </div>
    

@endif
<div class="form-control">
<label for="Nombre" class="form-label"> Nombre </label>
<input class="form-control mb-2" type="text" name="Nombre" value="{{ isset($empleado->Nombre)?$empleado->Nombre:'' }}" id="Nombre">
<!-- <br> -->

<label for="ApellidoPaterno" class="form-label"> Apellido Paterno </label>
<input class="form-control mb-2" type="text" name="ApellidoPaterno" value="{{ isset($empleado->ApellidoPaterno)?$empleado->ApellidoPaterno:'' }}" id="ApellidoPaterno">
<!-- <br> -->

<label class="form-label" for="ApellidoMaterno"> Apellido Materno </label>
<input type="text"  class="form-control mb-2" name="ApellidoMaterno"  value="{{ isset($empleado->ApellidoMaterno)?$empleado->ApellidoMaterno:'' }}" id="ApellidoMaterno">
<!-- <br> -->

<label for="Correo" class="form-label"> Correo </label>
<input class="form-control mb-2" type="text" name="Correo" value="{{ isset($empleado->Correo)?$empleado->Correo:'' }}" id="Correo">
<!-- <br> -->

<label for="Foto" class="form-label "></label>
@if(isset($empleado->Foto))
<img class="img-fluid img-thumbnail mb-2" src="{{ asset('storage').'/'.$empleado->Foto }}" width="200" alt="Foto de Perfil">
@endif
<input class="form-control mb-2" type="file" name="Foto" id="Foto">
<!-- <br> -->
</div>
<br>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos">


<a class="btn btn-dark" href="{{ url('empleado/') }}">Regresar</a>