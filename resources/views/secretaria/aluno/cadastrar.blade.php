@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item">Secretaria</li>
                <li class="breadcrumb-item"><a href="{{ route('aluno.index') }}">Aluno</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
            </ol>
        </nav>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Cadastrar Aluno</h1>
                </div>
                <form class="mt-2" action="{{ route('aluno.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputNomeCurso">Nome do Aluno</label>
                            <input type="text" name="nome" value="{{ old('nome') }}"
                                class="col-12 form-control @error('nome') is-invalid @enderror" id="nome"
                                placeholder="nome">
                            @error('nome')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputNomeCurso">Matricula</label>
                            <input type="text" name="matricula" value="{{ old('matricula') }}"
                                class="col-12  form-control @error('matricula') is-invalid @enderror" id="inputSemestres"
                                placeholder="Matricula">
                            @error('matricula')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputCurso">Curso</label>
                            <select name="nome_curso" id="nome_curso" class="form-control">
                                @foreach ($cursos as $aluno_Cursos)
                                    <option value="{{ $aluno_Cursos->id }}">{{ $aluno_Cursos->nome_curso }}</option>
                                @endforeach
                            </select>
                            {{-- <input type="text" name="curso" value="{{ old('nome_curso') }}"
                                class="col-12  form-control @error('curso') is-invalid @enderror" id="inputCurso"
                                placeholder="Curso"> --}}
                            @error('Curso')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputCpf">CPF</label>
                            <input max="11" type="text" name="cpf" value="{{ old('cpf') }}"
                                class="col-12  form-control @error('cpf') is-invalid @enderror" id="cpf" placeholder="CPF">

                            @error('cpf')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputRg">RG</label>
                            <input type="text" name="rg" value="{{ old('rg') }}"
                                class="col-12  form-control @error('cpf') is-invalid @enderror" id="rg" placeholder="RG">
                            @error('rg')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputNomePai">Nome do Pai</label>
                            <input type="text" name="nome_pai" value="{{ old('nome_pai') }}"
                                class="col-12  form-control @error('nome_pai') is-invalid @enderror" id="nome_pai"
                                placeholder="Nome do Pai">
                            @error('nome_pai')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputNomeMae">Nome do Mãe</label>
                            <input type="text" name="nome_mae" value="{{ old('nome_mae') }}"
                                class="col-12  form-control @error('nome_mae') is-invalid @enderror" id="nome_mae"
                                placeholder="Nome da Mãe">
                            @error('nome_mae')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputTelefone">Telefone</label>
                            <input type="text" name="telefone" value="{{ old('telefone') }}"
                                class="col-12 form-control @error('telefone') is-invalid @enderror" id="telefone"
                                placeholder="Telefone">
                            @error('telefone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputNacionalidade">Nacionalidade</label>
                            <input type="text" name="nacionalidade" value="{{ old('nacionalidade') }}"
                                class="col-12 form-control @error('nacionalidade') is-invalid @enderror" id="nacionalidade"
                                placeholder="Nacionalidade">
                            @error('nacionalidade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputNaturalidade">Naturalidade</label>
                            <input type="text" name="naturalidade" value="{{ old('naturalidade') }}"
                                class="col-12 form-control @error('naturalidade') is-invalid @enderror" id="naturalidade"
                                placeholder="Naturalidade">
                            @error('naturalidade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputTituloEleitor">Titulo de Eleitor</label>
                            <input type="text" name="titulo_eleitor" value="{{ old('titulo_eleitor') }}"
                                class="col-12 form-control @error('titulo_eleitor') is-invalid @enderror"
                                id="titulo_eleitor" placeholder="Titulo de Eleitor">
                            @error('titulo_eleito')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputReservista">Reservista</label>
                            <input type="text" name="reservista" value="{{ old('reservista') }}"
                                class="col-12 form-control @error('reservista') is-invalid @enderror" id="reservista"
                                placeholder="Reservista">
                            @error('reservista')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputCarteira_Trabalho">Carteira de Trabalho</label>
                            <input type="text" name="carteira_trabalho" value="{{ old('carteira_trabalho') }}"
                                class="col-12 form-control @error('carteira_trabalho') is-invalid @enderror"
                                id="carteira_trabalho" placeholder="Carteira">
                            @error('carteira_trabalho')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputTipoPerfil">Perfil</label>
                            <select name="tipo_perfil_id" id="tipo_perfil_id" class="selectOtion form-control col-12">
                                @foreach ($tipo_perfils as $tipo_perfil)
                                    <option value="{{ $tipo_perfil->id }}">{{ $tipo_perfil->nome_perfil }}</option>
                                @endforeach
                            </select>
                            @error('tipo_perfil_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label disabled for="inputVinculoEmpregaticio">Vinculo Empregaticio</label>
                            <input type="text" name="vinculo"
                                class="col-12 form-control @error('vinculo_empregaticio') is-invalid @enderror"
                                id="vinculo_empregraticio" placeholder="Não Possui">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputPerfil">Permissão</label>
                            <select name="permissao" id="permissao" class="form-control">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('perfil')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputEmail">Email</label>
                            <input type="text" name="email" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror" id="inputSemestres"
                                placeholder="E-mail">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEmail">Senha</label>
                            <input type="password" name="senha" value="{{ old('senha') }}"
                                class="form-control @error('senha') is-invalid @enderror" id="inputSemestres"
                                placeholder="Senha">

                            @error('Senha')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-2">
                        <label class="col-12">Ativo</label>
                        <label class="switch ">
                            <input type="checkbox" name="is_activated" id="togBtn">
                            <div class="slider round"></div>
                        </label>
                    </div>

                    <div class="mt-4 d-flex justify-content-end">
                        <button type="submit" class="btn btn-success mr-1">Cadastrar</button>
                        <a href="{{ route('aluno.index') }}" class="btn btn-primary">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
