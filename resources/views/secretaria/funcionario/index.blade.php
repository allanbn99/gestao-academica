{{-- dd($funcionarios) --}}
@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item" title="Página inicial"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item">Secretaria</li>
    <li class="breadcrumb-item active" aria-current="page" title="Página de funcionários">Funcionário</li>
@endsection

@section('content')
<div class="container-fluid">

    <div class="sky-box">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Lista de Funcionários</h1>
                <a href="{{route('funcionario.create')}}" class="btn btn-success">Cadastrar Funcionário</a>
            </div>

            <div class="mt-2 card">
                <div class="card-body">
                    <form method="GET" action="{{route('funcionario.index') }}">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="search_curso">Pesquisar por nome ou função</label>
                                <input type="text" name="funcionario" value="{{ request('funcionario') }}" class="form-control" title="Barra de pesquisa, pesquise por nome ou função do funcionário." id="search_input" placeholder="Gabriel, Lucas ou TI, Secretário e etc...">
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
                        <th scope="col" width="1">Perfil</th>
                        <th scope="col" width="1">Ações</th>
                    </tr>
                </thead>
                <tbody id="result_table">
                    @forelse ($funcionarios as $funcionario)

                        <tr>
                            <th scope="row">{{ $funcionario->id }}</th>
                            <td>{{ $funcionario->nome }}</td>
                            <td>{{ $funcionario->perfil }}</td>

                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a  href="{{ route('funcionario.show', $funcionario->id) }}" class="btn btn-primary">Visualizar</a>
                                    <a href="{{ route('funcionario.edit', $funcionario->id) }}"class="btn btn-success">Editar</a>

                                    <button type="button" class="btn btn-danger deleteModalTarget" data-id="{{ $funcionario->id }}" data-toggle="modal" data-target="#deleteModal">Excluir</button>

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

    <div class="d-flex justify-content-center align-items-center mt-2">
        {{ $funcionarios->render() }}
    </div>

</div>

@include('components.modals.delete')

@endsection


