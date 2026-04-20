@extends('layouts.dashboard')

@section('dashboard_content')


<div class="row g-4 align-items-stretch mt-1">
    <div class="col-lg-3">
        <div class="card card-outline card-primary h-100">
            <div class="card-header">
                <h3 class="card-title">Accesos rápidos</h3>
            </div>

            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-12">
                        <a href="{{route('users.register')}}" class="btn btn-primary w-100 py-2">
                            <i class="bi bi-person-plus-fill me-2"></i>
                            Registrar usuario
                        </a>
                    </div>





                </div>
            </div>
        </div>
    </div>


</div>
<div class="row g-4 mt-1">
    <div class="col-lg-12">
        <div class="card card-outline card-success h-100">
            <div class="card-header">
                <h3 class="card-title">Estudiantes recientes</h3>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Numero de telefono</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $user)

                        <tr>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ $user['telephone'] }}</td>
                            @if ($user['role_id'] == 1)
                            <td>Administrador</td>
                            @elseif ($user['role_id'] == 2)
                            <td>Profesor</td>
                            @elseif ($user['role_id'] == 3)
                            <td>Estudiante</td>
                            @endif
                            <td>
                                <a href="{{ route('users.update', $user['id']) }}" class="btn btn-primary">Editar</a>
                                @if( !$user['deleted_at'] )
                                <form action="{{ route('users.destroy', $user['id']) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">
                                        Eliminar
                                    </button>
                                </form>
                                @else
                                <form action="{{ route('users.restore', $user['id']) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success">
                                        Reactivar
                                    </button>
                                </form>
                                @endif

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>


            <div class=" card-footer d-flex justify-content-end">
                <a href="" class="btn btn-sm btn-success">
                    Mostrar activos
                </a>
            </div>
        </div>
    </div>


</div>


@endsection