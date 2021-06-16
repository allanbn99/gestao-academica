@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item">Secretaria</li>
            <li class="breadcrumb-item active" aria-current="page">Funcionário</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Lista de Funcionarios</h1>
                <a href="{{route('funcionario.create')}}" class="btn btn-success">Cadastrar Funcionario</a>
            </div>

            <div class="mt-2 card">
                <div class="card-body">
                    <form method="GET" action="{{route('funcionario.index') }}">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="search_curso">Nome do Funcionario</label>
                                <input type="text" name="funcionario" value="{{ request('funcionario') }}" class="form-control" id="search_funcionario" placeholder="Pesquisar...">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="search_semestres">Função</label>
                                <input type="text" name="funcao" value="{{ request('funcao') }}" class="form-control" id="search_funcao" placeholder="Pesquisar...">
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
                        <th scope="col" width="1">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col" width="1">Função</th>
                        <th scope="col" width="1">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($funcionarios as $funcionario)




                        <tr>
                             <th scope="row">{{ $funcionario->funcionarioId }}</th>
                            <td>{{ $funcionario->pessoa_nome }}</td>
                            <td>{{ $funcionario->cargo_nome }}</td>

                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a  href="{{route('funcionario.show', $funcionario->funcionarioId)}}" class="btn btn-primary">Visualizar</a>
                                    <a href="{{route('funcionario.edit', $funcionario->funcionarioId)}}"class="btn btn-success">Editar</a>

                                    <button type="button" class="btn btn-danger deleteModalTarget" data-id="{{ $funcionario->funcionarioId }}" data-toggle="modal" data-target="#deleteModal">Excluir</button>

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

@include('components.modals.delete', ['route' => route('funcionario.destroy', 'delete-modal')])

@error('error')
    <div class="toast bg-danger position-absolute" style="top:15px;right:15px;" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
        <div class="toast-body text-white">
            <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ $message }}
        </div>
    </div>
@enderror

@if (session('success'))
    <div class="toast bg-success position-absolute" style="top:15px;right:15px;" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
        <div class="toast-body text-white">
            <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session('success') }}
        </div>
    </div>
@endif

@endsection


