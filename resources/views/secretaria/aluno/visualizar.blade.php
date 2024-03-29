@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">Secretaria</li>
    <li class="breadcrumb-item">Aluno</li>
    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('aluno.index') }}">Editar</a></li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="sky-box">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>{{ $aluno_pessoa->nome }} - Visualizar Aluno</h1>
                </div>

                {{-- $aluno->id --}}
                <form class="mt-2" {{ route('aluno.update', $aluno_pessoa->id) }}>

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="inputNomeAluno">Nome do Aluno</label>
                            <input disabled type="text" name="nome" value="{{ $aluno_pessoa->nome }}"
                                class="form-control @error('nome') is-invalid @enderror" id="nome" placeholder="Nome">
                            @error('nome')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-md-4">
                            <label for="inputMatricula">Matricula</label>
                            <input disabled type="text" name="matricula" value="{{ $aluno->matricula }}"
                                class="form-control @error('matricula') is-invalid @enderror" id="matricula"
                                placeholder="Matricula">

                            @error('matricula')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-md-4">
                            <label for="inputCpf">CPF</label>
                            <input disabled type="text" name="cpf" value="{{ $aluno_pessoa->cpf }}"
                                class="form-control @error('cpf') is-invalid @enderror" id="cpf" placeholder="CPF">
                            @error('cpf')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-md-4">
                            <label for="inputRg">RG</label>
                            <input disabled type="text" name="rg" value="{{ $aluno_pessoa->rg }}"
                                class="form-control @error('cpf') is-invalid @enderror" id="rg" placeholder="RG">
                            @error('rg')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-md-6">
                            <label for="inputNomePai">Nome do Pai</label>
                            <input disabled type="text" name="nome_pai" value="{{ $aluno_pessoa->nome_pai }}"
                                class="form-control @error('nome_pai') is-invalid @enderror" id="nome_pai"
                                placeholder="Nome do Pai">
                            @error('nome_pai')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-md-6">
                            <label for="inputNomeMae">Nome do Mãe</label>
                            <input disabled type="text" name="nome_mae" value="{{ $aluno_pessoa->nome_mae }}"
                                class="form-control @error('nome_mae') is-invalid @enderror" id="nome_mae"
                                placeholder="Nome da Mãe">
                            @error('nome_mae')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-md-6">
                            <label for="inputCurso">Curso</label>
                            <select disabled name="Curso" id="curso_id" class="form-control">
                                <option value="{{ $aluno_Cursos->id }}">{{ $aluno_Cursos->nome_curso }}</option>
                            </select>
                        </div>

                        <div class="form-group col-sm-12 col-md-3">
                            <label for="inputTelefone">Telefone</label>
                            <input disabled type="text" name="telefone" value="{{ $aluno_pessoa->telefone }}"
                                class="form-control @error('telefone') is-invalid @enderror" id="telefone"
                                placeholder="Telefone">
                            @error('telefone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-md-3">
                            <label for="inputNacionalidade">Nacionalidade</label>
                            <input disabled type="text" name="nacionalidade"
                                value="{{ $aluno_pessoa->nacionalidade }}"
                                class="form-control @error('nacionalidade') is-invalid @enderror" id="nacionalidade"
                                placeholder="Nacionalidade">
                            @error('nacionalidade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-md-4">
                            <label for="inputNaturalidade">Naturalidade</label>
                            <input disabled type="text" name="naturalidade" value="{{ $aluno_pessoa->naturalidade }}"
                                class="form-control @error('naturalidade') is-invalid @enderror" id="naturalidade"
                                placeholder="Naturalidade">
                            @error('naturalidade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-md-4">
                            <label for="inputTituloEleitor">Titulo de Eleitor</label>
                            <input disabled type="text" name="titulo_eleitor"
                                value="{{ $aluno_pessoa->titulo_eleitor }}"
                                class="form-control @error('titulo_eleitor') is-invalid @enderror" id="titulo_eleitor"
                                placeholder="Titulo de Eleitor">
                            @error('titulo_eleito')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-md-4">
                            <label for="inputReservista">Reservista</label>
                            <input disabled type="text" name="reservista" value="{{ $aluno_pessoa->reservista }}"
                                class="form-control @error('reservista') is-invalid @enderror" id="reservista"
                                placeholder="Reservista">
                            @error('reservista')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-10">
                            <label for="inputEmail">Email</label>
                            <input disabled type="text" name="email" value="{{ $aluno_usuarios->email }}"
                                class="form-control @error('email') is-invalid @enderror" id="inputSemestres"
                                placeholder="E-mail">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="col-sm-12 col-md-2">
                            <label class="col-12">Ativo</label>
                            @if ($aluno_usuarios->is_activated == 1)
                                <label class="switch ">
                                    <input disabled type="checkbox" checked name="is_activated" id="togBtn">
                                    <div class="slider round"></div>
                                </label>
                            @else
                                <label class="switch ">
                                    <input disabled type="checkbox" name="is_activated" id="togBtn">
                                    <div class="slider round"></div>
                                </label>
                            @endif
                        </div>
                    </div>

                    <div class="mt-4 d-flex justify-content-end">
                        <a href="{{ route('aluno.edit', $aluno->id) }}" class="btn btn-success mr-1">Editar</a>
                        <button type="button" class="btn btn-danger mr-1 deleteModalTarget" data-id="{{ $aluno->id }}"
                            data-toggle="modal" data-target="#deleteModal">Excluir</button>
                        <a href="{{ route('aluno.index') }}" class="btn btn-primary">Voltar</a>
                </form>
            </div>
        </div>
    </div>
    </div>
    @include('components.modals.delete', ['route' => route('aluno.destroy', $aluno->id)])
@endsection
