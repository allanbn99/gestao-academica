@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item">Secretaria</li>
    <li class="breadcrumb-item"><a href="{{ route('curso.index') }}">Curso</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="sky-box">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h1>{{ $curso->nome_curso }} - Editar Curso</h1>
            </div>

            <form class="mt-2" action="{{ route('curso.update', $curso->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputNomeCurso">Nome do Curso</label>
                        <input type="text" name="nome_curso" value="{{ $curso->nome_curso }}" class="form-control @error('nome_curso') is-invalid @enderror" id="inputNomeCurso" placeholder="Nome do Curso">

                        @error('nome_curso')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputSemestres">Semestres</label>
                        <input type="number" name="semestres" value="{{ $curso->semestres }}" class="form-control @error('semestres') is-invalid @enderror" id="inputSemestres" placeholder="Semestres">

                        @error('semestres')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mt-4 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success mr-1">Salvar</button>
                    <a href="{{ route('curso.index') }}" class="btn btn-primary">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
