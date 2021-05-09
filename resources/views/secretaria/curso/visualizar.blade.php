@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item">Secretaria</li>
            <li class="breadcrumb-item"><a href="{{ route('curso.index') }}">Curso</a></li>
            <li class="breadcrumb-item active" aria-current="page">Visualizar</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h1>{{ $curso->nome_curso }} - Visualizar Curso</h1>
            </div>

            <fieldset class="mt-2" disabled>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputNomeCurso">Nome do Curso</label>
                        <input value="{{ $curso->nome_curso }}" class="form-control" id="inputNomeCurso">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputSemestres">Semestres</label>
                        <input value="{{ $curso->semestres }}" class="form-control" id="inputSemestres">
                    </div>
                </div>
            </fieldset>

            <div class="mt-4 d-flex justify-content-end">
                <a href="{{ route('curso.edit', $curso->id) }}" class="btn btn-success mr-1">Editar</a>
                <button type="button" class="btn btn-danger mr-1 deleteModalTarget" data-id="{{ $curso->id }}" data-toggle="modal" data-target="#deleteModal">Excluir</button>
                <a href="{{ route('curso.index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
</div>

@include('components.modals.delete', ['route' => route('curso.destroy', $curso->id)])

@endsection
