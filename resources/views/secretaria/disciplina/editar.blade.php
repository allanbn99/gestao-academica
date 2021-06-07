@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item">Secretaria</li>
    <li class="breadcrumb-item"><a href="{{ route('disciplina.index') }}">Disciplina</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="sky-box">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h1>{{ $disciplina->nome_disciplina }} - Editar Disciplina</h1>
            </div>

            <form class="mt-2" action="{{ route('disciplina.update', $disciplina->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputNomeDisciplina">Nome da Disciplina</label>
                        <input type="text" name="nome_disciplina" value="{{ $disciplina->nome_disciplina }}" class="form-control @error('nome_disciplina') is-invalid @enderror" id="inputNomedisciplina" placeholder="Nome da Disciplina">

                        @error('nome_disciplina')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputCarga_horaria">Carga Horária</label>
                        <input type="number" name="carga_horaria" value="{{ $disciplina->carga_horaria }}" class="form-control @error('carga_horaria') is-invalid @enderror" id="inputCarga_horaria" placeholder="Carga_horaria">

                        @error('carga_horaria')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mt-4 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success mr-1">Salvar</button>
                    <a href="{{ route('disciplina.index') }}" class="btn btn-primary">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
