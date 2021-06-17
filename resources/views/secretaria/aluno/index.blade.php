@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item">Secretaria</li>
                <li class="breadcrumb-item active" aria-current="page">Aluno</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Lista de Alunos</h1>
                    <a href="{{ route('aluno.create') }}" class="btn btn-success">Cadastrar Alunos</a>
                </div>

                <div class="mt-2 card">
                    <div class="card-body">
                        <form method="GET" action="{{ route('aluno.index') }}">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="search_curso">Nome do Aluno</label>
                                    <input type="text" name="aluno" value="{{ request('aluno') }}" class="form-control"
                                        id="search_nome" placeholder="Pesquisar...">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="search_semestres">Matricula</label>
                                    <input type="text" name="matricula" value="{{ request('matricula') }}"
                                        class="form-control" id="search_matricula" placeholder="Pesquisar...">
                                </div>
                                <div class="col-md-2 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary mb-3">Pesquisar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <table class="mt-3 table table-bordered table-hover table-responsive-md">
                    <thead>
                        <tr>
                            <th scope="col" width="">#</th>
                            <th scope="col" width="">Nome</th>
                            <th scope="col" width="">Matricula</th>
                            <th scope="col" width="">Curso</th>
                            <th scope="col" width="">Email</th>
                            <th scope="col" width="">Ativo</th>
                            <th scope="col" width="">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($alunos as $aluno)
                                                
                            <tr>
                                <th scope="row">{{ $aluno->id }}</th>
                                <td>{{ $aluno->nome }}</td>
                                <td>{{ $aluno->matricula }}</td>
                                <td>{{ $aluno->nome_curso }}</td>
                                <td>{{ $aluno->email }}</td>
                                <td>{{ $aluno->is_activated }}</td>
                                <td>

                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('aluno.show', $aluno->id) }}"class="btn btn-primary">Visualizar</a>
                                        <a href="{{ route('aluno.edit', $aluno->id) }}"class="btn btn-success">Editar</a>
                                        <button type="button" class="btn btn-danger deleteModalTarget"data-id="{{ $aluno->id }}" data-toggle="modal"
                                            data-target="#deleteModal">Excluir</button>
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

                <div class="mt-4 d-flex justify-content-end">
                    <a href="{{ route('home') }}" class="btn btn-primary">Voltar</a>
                </div>
            </div>
        </div>
    </div>

    @include('components.modals.delete', ['route' => route('aluno.destroy', 'delete-modal')])

    @error('error')
        <div class="toast bg-danger position-absolute" style="top:15px;right:15px;" role="alert" aria-live="assertive"
            aria-atomic="true" data-delay="3000">
            <div class="toast-body text-white">
                <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ $message }}
            </div>
        </div>
    @enderror

    @if (session('success'))
        <div class="toast bg-success position-absolute" style="top:15px;right:15px;" role="alert" aria-live="assertive"
            aria-atomic="true" data-delay="3000">
            <div class="toast-body text-white">
                <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('success') }}
            </div>
        </div>
    @endif

@endsection
