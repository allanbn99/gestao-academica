@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                    @foreach ($funcionarios as $u )

                    <p>{{$u->matricula}}</p>

                    @endforeach
                    <li>Lista de Funcionarios</li>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
