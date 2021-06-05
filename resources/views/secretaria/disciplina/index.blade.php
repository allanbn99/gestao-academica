@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item">Secretaria</li>
                <li class="breadcrumb-item active" aria-current="page">Disciplina</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Lista de Disciplinas</h1>
                    <a href="{{ route('disciplina.create') }}" class="btn btn-success">Cadastrar nova Disciplina</a>
                </div>

                <div class="mt-2 card">
                    <div class="card-body">
                        <form method="GET" action="{{ route('disciplina.index') }}">
                            <div class="form-row">
                                <div class="form-group col-md-9">
                                    <label for="search_disciplina">Nome da disciplina</label>
                                    <input type="text" name="disciplina" value="{{ request('disciplina') }}" class="form-control"
                                        id="search_disciplina" placeholder="Pesquisar...">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="search_semestres">Carga horaria</label>
                                    <input type="text" name="semestres" value="{{ request('carga_horaria') }}"
                                        class="form-control" id="search_semestres" placeholder="Pesquisar...">
                                </div>
                                <div class="col-md-1 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary mb-3">Pesquisar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <table class="mt-3 table table-bordered table-hover table-responsive-md">
                    <thead>
                        <tr>
                            <th scope="col" width="1">#</th>
                            <th scope="col">Nome da Disciplina</th>
                            <th scope="col" width="2">Carga Horária</th>
                            <th scope="col" width="1">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($disciplinas as $disciplina)
                            <tr>
                                <th scope="row">{{ $disciplina->id }}</th>
                                <td>{{ $disciplina->nome_disciplina }}</td>
                                <td>{{ $disciplina->carga_horaria }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('disciplina.show', $disciplina->id) }}"
                                            class="btn btn-primary">Visualizar</a>
                                        <a href="{{ route('disciplina.edit', $disciplina->id) }}"
                                            class="btn btn-success">Editar</a>
                                            <button type="button" class="btn btn-danger mr-1 deleteModalTarget" data-id="{{ $disciplina->id }}" data-toggle="modal" data-target="#deleteModal">Excluir</button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Nenhum registro encontrado</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="d-flex justify-content-end">
                    {{ $disciplinas->links() }}
                </div>

                <div class="mt-4 d-flex justify-content-end">
                    <a href="{{ route('home') }}" class="btn btn-primary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
@include('components.modals.delete', ['route' => route('disciplina.destroy', $disciplina->id)])

@endsection
