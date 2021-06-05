@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Secretaria</li>
                <li class="breadcrumb-item">Funcionario</li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('curso.index') }}">Editar</a></li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Dados Pessoais</h1>
                </div>
{{-- $funcionario->id  --}}
                <form class="mt-2"  action="{{route('funcionario.update',$funcionario_pessoa[0]->id)}}"  method="POST">
                    @csrf

                    @method('PUT');

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="col-12 row ">
                                {{-- //nome --}}
 {{-- $funcionario->nome --}}

                                <input type="text" name="nome" value="{{$funcionario_pessoa[0]->nome}}"
                                    class="col-4 mg form-control @error('nome') is-invalid @enderror" id="inputSemestres"
                                    placeholder="Nome">

                                    {{-- @error('nome')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}

                                {{-- //matricula --}}
                                <input type="text" name="matricula" value="{{$funcionario->matricula}}"
                                class="col-3 mg form-control @error('matricula') is-invalid @enderror" id="inputSemestres"
                                placeholder="Matricula">

                                    {{-- @error('matricula')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}

                                {{-- //cpf --}}
                                <input      type="text" name="cpf" value="{{$funcionario_pessoa[0]->cpf}}"
                                class="col-4 mg form-control @error('cpf') is-invalid @enderror" id="cpf"
                                placeholder="CPF">

                                 {{-- @error('cpf')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror --}}

                                {{-- //rg --}}
                                <input      type="text" name="rg" value="{{$funcionario_pessoa[0]->rg}}"
                                class="col-4 mg form-control @error('cpf') is-invalid @enderror" id="rg"
                                placeholder="RG">

                                 {{-- @error('rg')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror --}}

                               {{-- //nome_pai --}}
                                <input      type="text" name="nome_pai" value="{{$funcionario_pessoa[0]->nome_pai}}"
                                class="col-3 mg form-control @error('nome_pai') is-invalid @enderror" id="nome_pai"
                                placeholder="Nome do Pai">

                                 {{-- @error('nome_pai')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror --}}

                                {{-- //nome_mae --}}
                                <input      type="text" name="nome_mae" value="{{$funcionario_pessoa[0]->nome_mae}}"
                                class="col-4 mg form-control @error('nome_mae') is-invalid @enderror" id="nome_mae"
                                placeholder="Nome da Mãe">

                                 {{-- @error('nome_mae')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror --}}

                                  {{-- //telefone --}}
                                <input      type="text" name="telefone" value="{{$funcionario_pessoa[0]->telefone}}"
                                class="col-4 mg form-control @error('telefone') is-invalid @enderror" id="telefone"
                                placeholder="Telefone">

                                 {{-- @error('telefone')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror --}}

                                {{-- //nacionalidade --}}
                                <input      type="text" name="nacionalidade" value="{{$funcionario_pessoa[0]->nacionalidade}}"
                                class="col-3 mg form-control @error('nacionalidade') is-invalid @enderror" id="nacionalidade"
                                placeholder="Nacionalidade">

                                 {{-- @error('nacionalidade')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror --}}

                                 {{-- //naturalidade --}}
                                <input type="text" name="naturalidade" value="{{$funcionario_pessoa[0]->naturalidade}}"
                                class="col-4 mg form-control @error('naturalidade') is-invalid @enderror" id="naturalidade"
                                placeholder="Naturalidade">

                                 {{-- @error('naturalidade')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror --}}

                                  {{-- //titulo_eleito --}}
                                <input      type="text" name="titulo_eleitor" value="{{$funcionario_pessoa[0]->titulo_eleitor}}"
                                class="col-4 mg form-control @error('titulo_eleitor') is-invalid @enderror" id="titulo_eleitor"
                                placeholder="Titulo de Eleitor">

                                 {{-- @error('titulo_eleito')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror --}}

                                {{-- //reservista --}}
                                <input type="text" name="reservista" value="{{$funcionario_pessoa[0]->reservista}}"
                                class="col-3 mg form-control @error('reservista') is-invalid @enderror" id="reservista"
                                placeholder="Reservista">

                                 {{-- @error('reservista')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror --}}

                                {{-- //carteira_trabalho--}}
                                <input      type="text" name="carteira_trabalho" value="{{$funcionario_pessoa[0]->carteira_trabalho}}"
                                class="col-4 mg form-control @error('carteira_trabalho') is-invalid @enderror" id="carteira_trabalho"
                                placeholder="Carteira">

                                 {{-- @error('carteira_trabalho')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror --}}

                                {{-- //tipo_perfil_id--}}
                               {{-- <select name="tipo_perfil_id" id="tipo_perfil_id" class="mg selectOtion form-control col-6">
                                    @foreach ($tipo_perfils as $tipo_perfil)
                                       <option value="{{$tipo_perfil->id}}">{{$tipo_perfil->nome_perfil}}</option>
                                    @endforeach
                                </select> --}}

                                {{-- @error('tipo_perfil_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror --}}

                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <h1>Endereço</h1>
                        </div>

                        <div class="col-12 row">
                            {{-- //Rua --}}
                            <input      type="text" name="rua" value="{{$funcionario_enderecos[0]->rua}}"
                                class="col-4 mg form-control @error('rua') is-invalid @enderror" id="inputSemestres"
                                placeholder="Rua">

                            {{-- @error('rua')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}

                            {{-- //Número --}}
                            <input      type="text" name="numero" value="{{$funcionario_enderecos[0]->numero}}"
                                class="col-3 mg form-control @error('numero') is-invalid @enderror" id="inputSemestres"
                                placeholder="Número">

                            {{-- @error('numero')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}

                            {{-- //Bairro --}}
                            <input      type="text" name="bairro" value="{{$funcionario_enderecos[0]->bairro}}"
                                class="col-4 mg form-control @error('bairro') is-invalid @enderror" id="inputSemestres"
                                placeholder="Bairro">

                            {{-- @error('bairro')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}

                            {{-- //Complemento --}}
                            <input      type="text" name="complemento" value="{{$funcionario_enderecos[0]->complemento}}"
                                class="col-4 mg form-control @error('semestres') is-invalid @enderror" id="inputSemestres"
                                placeholder="Complemento">

                            {{-- @error('complemento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}

                            {{-- //Cidade --}}
                            <input      type="text" name="cidade" value="{{$funcionario_enderecos[0]->cidade}}"
                                class="col-3 mg form-control @error('cidade') is-invalid @enderror" id="inputSemestres"
                                placeholder="Cidade">

                            {{-- @error('cidade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}

                            {{-- //Estado --}}
                            <input      type="text" name="estado" value="{{$funcionario_enderecos[0]->estado}}"
                                class="col-4 mg form-control @error('estado') is-invalid @enderror" id="inputSemestres"
                                placeholder="Estado">

                            {{-- @error('estado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}

                            {{-- //Pais --}}
                            <input      type="text" name="pais" value="{{$funcionario_enderecos[0]->pais}}"
                                class="col-6 mg form-control @error('pais') is-invalid @enderror" id="inputSemestres"
                                placeholder="Pais">

                            {{-- @error('pais')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}

                            {{-- //CEP --}}
                            <input      type="text" name="cep" value="{{$funcionario_enderecos[0]->cep}}"
                                class="col-5 mg form-control @error('cep') is-invalid @enderror" id="inputSemestres"
                                placeholder="CEP">

                            {{-- @error('cep')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}

                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <h1>Cargo</h1>
                        </div>
                        <div class="col-12 row">
                            <input      type="text" name="email" value="{{$funcionario_usuarios->email}}"
                            class="col-3 mg form-control @error('email') is-invalid @enderror" id="inputSemestres"
                            placeholder="E-mail">
                                {{--  <select name="cargo_id" id="cargo" class="form-control col-6 mg">
                                    @foreach ($cargos as $cargo)
                                    <option value="{{$cargo->id}}">{{$cargo->nome_cargo}}</option>
                                    @endforeach
                                </select>  --}}

                            {{-- @error('funcao')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}

                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            {{--  <h1>Usuário</h1>  --}}
                        </div>
                        <div class="col-12 row">
                            {{-- //Usuario --}}
                            {{--  <input      type="text" name="usuario" value="{{ old('usuario') }}"
                                class="col-4 mg form-control @error('usuario') is-invalid @enderror" id="inputSemestres"
                                placeholder="Usuário">

                            @error('usuario')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror  --}}

                            {{-- //email --}}
                            <input      type="text" name="email" value="{{$funcionario_usuarios->email}}"
                                class="col-3 mg form-control @error('email') is-invalid @enderror" id="inputSemestres"
                                placeholder="E-mail">

                            {{-- @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}

                            {{-- //senha --}}
                            {{--  <input      type="password" name="senha" value="{{ old('senha') }}"
                                class="col-4 mg form-control @error('senha') is-invalid @enderror" id="inputSemestres"
                                placeholder="Senha">

                            @error('areaAtuacao')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror  --}}

                            {{--  <select name="permissao" id="permissao" class="form-control mg col-6">
                                {{--  <option value="Cuiabá">Cuiabá</option>

                                @foreach ($roles as $role)
                                <option value="{{$role->name}}">{{$role->name}}</option>
                                @endforeach
                            </select>  --}}
                        </div>
                    </div>
                    <div class="mt-4 d-flex justify-content-end">
                        <button type="submit" class="btn btn-success mr-1">Salvar</button>
                        <a href="{{ route('funcionario.index') }}" class="btn btn-primary">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
