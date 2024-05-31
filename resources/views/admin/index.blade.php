@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Principal</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-3 col-4">

            <div class="small-box bg-warning">
                <div class="inner">
                    @php $contador_de_usuarios=0; @endphp
                    @foreach ($usuarios as $usuario)
                        @php $contador_de_usuarios++; @endphp
                    @endforeach
                    <h3>{{ $contador_de_usuarios }}</h3>
                    <p>Usuarios registrados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="{{ url('/admin/usuarios') }}" class="small-box-footer">
                    Más información <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>



            <div class="small-box bg-warning">
                <div class="inner">
                    @php $contador_de_roles=0; @endphp
                    @foreach ($roles as $rol)
                        @php $contador_de_roles++; @endphp
                    @endforeach
                    <h3>{{ $contador_de_roles }}</h3>
                    <p>Roles registrados </p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas"><i class="bi bi-bookmarks"></i></i>
                </div>
                <a href="{{ url('/admin/roles') }}" class="small-box-footer">
                    Más información <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>

            
    </div>
    </div>
@endsection
