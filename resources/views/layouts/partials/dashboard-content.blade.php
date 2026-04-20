@extends('layouts.dashboard')

@section('dashboard_content')


<div class="row g-4 align-items-stretch mt-1">
    <div class="col-lg-6">
        <div class="card card-outline card-primary h-100">
            <div class="card-header">
                <h3 class="card-title">Accesos rápidos</h3>
            </div>

            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <a href="{{route('users.register')}}" class="btn btn-primary w-100 py-2">
                            <i class="bi bi-person-plus-fill me-2"></i>
                            Registrar usuario
                        </a>
                    </div>



                    <div class="col-md-6">
                        <a href="" class="btn btn-info w-100 text-white py-2">
                            <i class="bi bi-list-ul me-2"></i>
                            Ver listados
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>


@endsection