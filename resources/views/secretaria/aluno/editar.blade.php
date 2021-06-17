@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item">Secretaria</li>
    <li class="breadcrumb-item"><a href="{{ route('aluno.index') }}">Aluno</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="sky-box">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>{{ $aluno_pessoa->nome }} - Editar Aluno</h1>
                </div>
                <form class="mt-2" action="{{ route('aluno.update', $aluno_pessoa->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputNomeAluno">Nome do Aluno</label>
                            <input type="text" name="nome" value="{{ $aluno_pessoa->nome }}"
                                class="form-control @error('nome') is-invalid @enderror" id="nome" placeholder="Nome">
                            @error('nome')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputMatricula">Matricula</label>
                            <input type="text" name="matricula" value="{{ $aluno->matricula }}"
                                class="form-control @error('matricula') is-invalid @enderror" id="matricula"
                                placeholder="Matricula">

                            @error('matricula')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputCurso">Curso</label>
                            <select name="Curso" id="curso_id" class="form-control">
                                @foreach ($cursos as $curso)
                                    @if ($curso->id == $aluno_Cursos->id)
                                        <option selected value="{{ $curso->id }}">{{ $curso->nome_curso }}</option>
                                    @else
                                        <option value="{{ $curso->id }}">{{ $curso->nome_curso }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="inputCpf">CPF</label>
                            <input type="text" name="cpf" value="{{ $aluno_pessoa->cpf }}"
                                class="form-control @error('cpf') is-invalid @enderror" id="cpf" placeholder="CPF">
                            @error('cpf')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputRg">RG</label>
                            <input type="text" name="rg" value="{{ $aluno_pessoa->rg }}"
                                class="form-control @error('cpf') is-invalid @enderror" id="rg" placeholder="RG">
                            @error('rg')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputNomePai">Nome do Pai</label>
                            <input type="text" name="nome_pai" value="{{ $aluno_pessoa->nome_pai }}"
                                class="form-control @error('nome_pai') is-invalid @enderror" id="nome_pai"
                                placeholder="Nome do Pai">
                            @error('nome_pai')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputNomeMae">Nome do Mãe</label>
                            <input type="text" name="nome_mae" value="{{ $aluno_pessoa->nome_mae }}"
                                class="form-control @error('nome_mae') is-invalid @enderror" id="nome_mae"
                                placeholder="Nome da Mãe">
                            @error('nome_mae')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputTelefone">Telefone</label>
                            <input type="text" name="telefone" value="{{ $aluno_pessoa->telefone }}"
                                class="form-control @error('telefone') is-invalid @enderror" id="telefone"
                                placeholder="Telefone">
                            @error('telefone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputNacionalidade">Nacionalidade</label>
                            <input type="text" name="nacionalidade" value="{{ $aluno_pessoa->nacionalidade }}"
                                class="form-control @error('nacionalidade') is-invalid @enderror" id="nacionalidade"
                                placeholder="Nacionalidade">
                            @error('nacionalidade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputNaturalidade">Naturalidade</label>
                            <input type="text" name="naturalidade" value="{{ $aluno_pessoa->naturalidade }}"
                                class="form-control @error('naturalidade') is-invalid @enderror" id="naturalidade"
                                placeholder="Naturalidade">
                            @error('naturalidade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputTituloEleitor">Titulo de Eleitor</label>
                            <input type="text" name="titulo_eleitor" value="{{ $aluno_pessoa->titulo_eleitor }}"
                                class="form-control @error('titulo_eleitor') is-invalid @enderror" id="titulo_eleitor"
                                placeholder="Titulo de Eleitor">
                            @error('titulo_eleito')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputReservista">Reservista</label>
                            <input type="text" name="reservista" value="{{ $aluno_pessoa->reservista }}"
                                class="form-control @error('reservista') is-invalid @enderror" id="reservista"
                                placeholder="Reservista">
                            @error('reservista')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputCarteira_Trabalho">Carteira de Trabalho</label>
                            <input type="text" name="carteira_trabalho" value="{{ $aluno_pessoa->carteira_trabalho }}"
                                class="form-control @error('carteira_trabalho') is-invalid @enderror" id="carteira_trabalho"
                                placeholder="Carteira">
                            @error('carteira_trabalho')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                        

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputVinculoEmpregaticio">Perfil</label>
                            <select name="tipo_perfil_id" id="tipo_perfil_id" class="selectOtion form-control">
                                @foreach ($perfis as $tipo_perfil)
                                    @if ($tipo_perfil->id == $aluno_pessoa->tipo_perfil_id)
                                        <option selected value="{{ $tipo_perfil->id }}">
                                            {{ $tipo_perfil->nome_perfil }}
                                        </option>
                                    @else
                                        <option value="{{ $tipo_perfil->id }}">{{ $tipo_perfil->nome_perfil }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            @error('tipo_perfil_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputVinculoEmpregaticio">Vinculo Empregaticio</label>
                            <input disabled type="text" name="vinculo"
                                class="col-12 form-control @error('vinculo_empregaticio') is-invalid @enderror"
                                id="vinculo_empregraticio" placeholder="Não Possui">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="inputPerfil">Permissão</label>
                            <select name="permissao" id="permissao" class="form-control">
                                @foreach ($roles as $role)
                                    @if ($role->name == $aluno_roles->name)
                                        <option selected value="{{ $role->id }}">{{ $role->name }}</option>
                                    @else
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endif
                                    
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputEmail">Email</label>
                            <input type="text" name="email" value="{{ $aluno_usuarios->email }}"
                                class="form-control @error('email') is-invalid @enderror" id="inputSemestres"
                                placeholder="E-mail">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-2">
                            <label class="col-12">Resetar Senha</label>
                            @if ($aluno_usuarios->password == 1)
                                <label class="switch ">
                                    <input type="checkbox" checked name="password" id="togBtn">
                                    <div class="slider round"></div>
                                </label>
                            @else
                                <label class="switch ">
                                    <input type="checkbox" name="password" id="togBtn">
                                    <div class="slider round"></div>
                                </label>
                            @endif
                        </div>
                        <div class="col-2">
                            <label class="col-12">Ativo</label>
                            @if ($aluno_usuarios->is_activated == 1)
                                <label class="switch ">
                                    <input type="checkbox" checked name="is_activated" id="togBtn">
                                    <div class="slider round"></div>
                                </label>
                            @else
                                <label class="switch ">
                                    <input type="checkbox" name="is_activated" id="togBtn">
                                    <div class="slider round"></div>
                                </label>
                            @endif
                        </div>
                    </div>


                    <div class="mt-4 d-flex justify-content-end">
                        <button type="submit" class="btn btn-success mr-1">Salvar</button>
                        <a href="{{ route('aluno.index') }}" class="btn btn-primary">Voltar</a>
                </form>
            </div>
        </div>
    </div>
    </div>

@endsection
