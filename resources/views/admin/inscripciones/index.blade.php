@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <h1 class="agenda-escolar">Formulario de Inscripcion</h1>
            </div>
            <hr>
            <div class="row">

                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-primary"><i class="fas fa-file-signature"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text"><b>Inscripciones</b></span>
                            @can('usuarios.create')
                                <a href="{{ route('usuarios.create', ['tipo' => 'Est.']) }}"
                                    class="btn btn-primary btn-sm">Nuevo Estudiante</a>
                            @endcan

                        </div>

                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection
