@extends('app')

@section('content')

<div class="container w-10 border p-4">
    <div class="row mx-auto">
        <form  method="POST" action="{{route('todos')}}">
            @csrf

            <div class="mb-3 col">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>  <!-- Muestra el error por defecto entre los que trae laravel-->
            @enderror

            @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif
                <h6> Ingrese los datos para crear un nuevo pais</h6>
                <label for="title" class="form-label">Nombre del país</label>
                <input type="text" class="form-control mb-2" name="title" id="exampleFormControlInput1">

                <label for="poblacion" class="form-label">Poblacion</label>
                <input type="number" class="form-control mb-2" name="poblacion">

                <label for="capital" class="form-label">Capital</label>
                <input type="text" class="form-control mb-2" name="capital">

                <label for="idioma" class="form-label">Idioma</label>
                <input type="text" class="form-control mb-2" name="idioma">


                <input type="submit" value="Crear pais" class="btn btn-info my-2" />
            </div>
        </form>
    </div>
    <div >
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nombre del PAIS</th>
                <th scope="col">Poblacion</th>
                <th scope="col">Capital</th>
                <th scope="col">Idioma</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($todos as $todo)

                <td>{{ $todo->title }}</td>
                <td>{{ $todo->poblacion }}</td>
                <td>{{ $todo->capital}}</td>
                <td>{{ $todo->idioma}}</td>
            </tbody>
            @endforeach
    </div>
    <div id="coviddatos">

    </div>

</div>
@endsection
