@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <h1 class="agenda-escolar">Configuraciones de la Institucion</h1>
            </div>
            <hr>
            <div class="row">

                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-primary"><i class="fas fa-university"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text"><b>Datos de la Institucion</b></span>
                            @can('colegios.index')
                                <a href="{{ route('colegios.index') }}" class="btn btn-primary btn-sm">Configurar</a>
                            @endcan


                        </div>

                    </div>

                </div>

                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="bi bi-calendar-range"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"><b>Gestion Educativa</b></span>
                            @can('gestiones.index')
                                <a href="{{ route('gestiones.index') }}" class="btn btn-info btn-sm">Configurar</a>
                            @endcan

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
