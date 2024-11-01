<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a4cdeaa4c2.js" crossorigin="anonymous"></script>
</head>

<body>
    <h1 class="text-center p-4"> Registros </h1>

    @if (session('correcto'))
        <div class="alert alert-success text-center">{{ session('correcto') }} </div>
    @endif

    @if (session('incorrecto'))
        <div class="alert alert-danger text-center">{{ session('incorrecto') }} </div>
    @endif

    <script>
        var res=function(){
            var not=confirm("¿Seguro que deseas eliminar al miembro?");
            return not;
        }

    </script>

    <!-- Modal Agregar -->
    <div class="modal fade" id="modalagregar" tabindex="-1" aria-labelledby="modalagregarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalagregarLabel">Agregar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('crude.create') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">idUsuario</label>
                            <input type="number" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="txtUsuario">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="txtNombre">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Cedula</label>
                            <input type="number" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="txtCedula">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Region</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="txtRegion">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Ciudad</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="txtCiudad">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Edad</label>
                            <input type="number" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="txtEdad">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Genero</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="txtGenero">
                        </div>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <div class=" p-5 table-responsive">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalagregar">Registrar</button>
        <hr class="mb-12">    
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th scope="col">Codigo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cedula</th>
                    <th scope="col">Region</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Genero</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos as $item)
                    <tr class="text-center">

                        <th>{{ $item->idUsuario }}</th>
                        <td>{{ $item->Nombre }}</td>
                        <td>{{ $item->Cedula }}</td>
                        <td>{{ $item->Region }}</td>
                        <td>{{ $item->Ciudad }}</td>
                        <td>{{ $item->Edad }}</td>
                        <td>{{ $item->Genero }}</td>
                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#modaleditar{{ $item->idUsuario }}"
                                class="btn btn btn-success btn-sm"><i class="fa-regular fa-pen-to-square"></i> </a>
                            <a href="{{route("crude.delete",$item->idUsuario)}}" onclick= "return res()" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> </a>
                        </td>

                        <!-- Modal edicion -->
                        <div class="modal fade" id="modaleditar{{ $item->idUsuario }}" tabindex="-1"
                            aria-labelledby="modaleditarLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modaleditarLabel">Editar datos</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('crude.update') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">idUsuario</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="txtUsuario"
                                                    value="{{ $item->idUsuario }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="txtNombre"
                                                    value="{{ $item->Nombre }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Cedula</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="txtCedula"
                                                    value="{{ $item->Cedula }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Region</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="txtRegion"
                                                    value="{{ $item->Region }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Ciudad</label>
                                                <input type="number" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="txtCiudad"
                                                    value="{{ $item->Ciudad }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Edad</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="txtEdad"
                                                    value="{{ $item->Edad }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Genero</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="txtGenero"
                                                    value="{{ $item->Genero }}">
                                            </div>
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-success">Guardar</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
    </div>
    </tr>
    @endforeach
    </tbody>
    </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>