@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item">Secretaria</li>
    <li class="breadcrumb-item"><a href="{{ route('disciplina.index') }}">Disciplina</a></li>
    <li class="breadcrumb-item active" aria-current="page">Visualizar</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="sky-box">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h1>{{ $disciplina->nome_disciplina }} - Visualizar Disciplina</h1>
            </div>

            <fieldset class="mt-2" disabled>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputNomeDisciplina">Nome da Disciplina</label>
                        <input value="{{ $disciplina->nome_disciplina }}" class="form-control" id="inputNomeDisciplina">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputSemestres">Carga Horária</label>
                        <input value="{{ $disciplina->carga_horaria }} horas" class="form-control" id="inputSemestres">
                    </div>
                </div>
            </fieldset>

            <div class="mt-4 d-flex justify-content-end">
                <a href="{{ route('disciplina.edit', $disciplina->id) }}" class="btn btn-success mr-1">Editar</a>
                <button type="button" class="btn btn-danger mr-1 deleteModalTarget" data-id="{{ $disciplina->id }}" data-toggle="modal" data-target="#deleteModal">Excluir</button>
                <a href="{{ route('disciplina.index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
</div>

@include('components.modals.delete', ['route' => route('disciplina.destroy', $disciplina->id)])

@endsection
