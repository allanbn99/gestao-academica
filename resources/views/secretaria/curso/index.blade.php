@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item" title="Página inicial"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item">Secretaria</li>
    <li class="breadcrumb-item active" aria-current="page" title="Página de cursos">Curso</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="sky-box">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Lista de Cursos</h1>
                <a href="{{ route('curso.create') }}" class="btn btn-success">Cadastrar Curso</a>
            </div>

            <div class="mt-2 card">
                <div class="card-body">
                    <form method="GET" action="{{ route('curso.index') }}">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="search_curso">Pesquisar por nome ou semestre</label>
                                <input type="text" name="curso" value="{{ request('curso') }}" class="form-control" id="search_input" placeholder="Curso tal ou 6, 8 e etc..." title="Barra de pesquisa, pesquise pelo nome do curso ou pela quantidade de semestres.">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <table class="mt-3 table table-bordered table-hover table-responsive-md">
                <thead>
                    <tr>
                        <th scope="col" width="1">#</th>
                        <th scope="col">Nome do Curso</th>
                        <th scope="col" width="1">Semestres</th>
                        <th scope="col" width="1">Ações</th>
                    </tr>
                </thead>
                <tbody id="result_table">
                    @forelse ($cursos as $curso)
                        <tr>
                            <th scope="row">{{ $curso->id }}</th>
                            <td>{{ $curso->nome_curso }}</td>
                            <td>{{ $curso->semestres }}</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('curso.show', $curso->id) }}" class="btn btn-primary">Visualizar</a>
                                    <a href="{{ route('curso.edit', $curso->id) }}" class="btn btn-success">Editar</a>
                                    <button type="button" class="btn btn-danger deleteModalTarget" data-id="{{ $curso->id }}" data-toggle="modal" data-target="#deleteModal">Excluir</button>
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
                {{ $cursos->links() }}
            </div>

            <div class="mt-4 d-flex justify-content-end">
                <a href="{{ route('home') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
</div>

@include('components.modals.delete')

@endsection
