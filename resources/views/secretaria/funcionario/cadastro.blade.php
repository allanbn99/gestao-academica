@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Secretaria</li>
                <li class="breadcrumb-item">Funcionario</li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('curso.index') }}">Cadastrar</a></li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Dados Pessoais</h1>
                </div>

                <form class="mt-2" action="{{route('funcionario.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group row col-12">

                            {{-- //nome --}}
                            <div class="col-9">
                                <label class="col-form-label"  >Nome</label>
                                    <input type="text" name="nome" value="{{ old('nome') }}"
                                    class="col-12 form-control @error('nome') is-invalid @enderror" id="nome"
                                    placeholder="nome">

                                     @error('nome')
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                            </div>

                                {{-- //matricula --}}
                        <div class="col-3">
                                <label class="col-form-label"  class="">Matricula</label>
                                <input type="text" name="matricula" value="{{ old('matricula') }}"
                                class="col-12  form-control @error('matricula') is-invalid @enderror" id="inputSemestres"
                                placeholder="Matricula">

                                    @error('matricula')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                         </div>

                        {{-- //cpf --}}
                        <div class="col-3">
                            <label class="col-form-label"  >CPF</label>
                                <input max="11" type="text" name="cpf" value="{{ old('cpf') }}"
                                class="col-12  form-control @error('cpf') is-invalid @enderror" id="cpf"
                                placeholder="CPF">

                                 @error('cpf')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                        </div>

                        {{-- //rg --}}
                        <div class="col-3">
                            <label class="col-form-label"  >RG</label>
                                <input type="text" name="rg" value="{{ old('cpf') }}"
                                class="col-12  form-control @error('cpf') is-invalid @enderror" id="rg"
                                placeholder="RG">

                                 @error('rg')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                        </div>

                        {{-- //nome_pai --}}
                        <div class="col-6">
                        <label class="col-form-label"  >Nome do Pai</label>
                                <input type="text" name="nome_pai" value="{{ old('nome_pai') }}"
                                class="col-12  form-control @error('nome_pai') is-invalid @enderror" id="nome_pai"
                                placeholder="Nome do Pai">

                                 @error('nome_pai')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                        </div>

                        {{-- //nome_mae--}}
                        <div class="col-6">
                            <label class="col-form-label"  >Nome da Mãe</label>
                                <input type="text" name="nome_mae" value="{{ old('nome_mae') }}"
                                class="col-12  form-control @error('nome_mae') is-invalid @enderror" id="nome_mae"
                                placeholder="Nome da Mãe">

                                 @error('nome_mae')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                        </div>

                        {{-- //telefone --}}
                        <div class="col-3">
                            <label class="col-form-label"  class="">Telefone</label>
                                    <input type="text" name="telefone" value="{{ old('telefone') }}"
                                    class="col-12 form-control @error('telefone') is-invalid @enderror" id="telefone"
                                    placeholder="Telefone">

                                    @error('telefone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>

                                {{-- //nacionalidade --}}
                        <div class="col-3">
                            <label class="col-form-label"  >Nacionalidade</label>
                                <input type="text" name="nacionalidade" value="{{ old('nacionalidade') }}"
                                class="col-12 form-control @error('nacionalidade') is-invalid @enderror" id="nacionalidade"
                                placeholder="Nacionalidade">

                                 @error('nacionalidade')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                        </div>
                        {{-- //naturalidade --}}
                        <div class="col-6">
                                <label class="col-form-label"  >Naturalidade</label>
                                <input type="text" name="naturalidade" value="{{ old('naturalidade') }}"
                                class="col-12 form-control @error('naturalidade') is-invalid @enderror" id="naturalidade"
                                placeholder="Naturalidade">

                                 @error('naturalidade')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                        </div>

                    {{-- //titulo_eleito --}}
                        <div class="col-6">
                            <label class="col-form-label"  >Titulo de eleitor</label>
                                <input type="text" name="titulo_eleitor" value="{{ old('titulo_eleitor') }}"
                                class="col-12 form-control @error('titulo_eleitor') is-invalid @enderror" id="titulo_eleitor"
                                placeholder="Titulo de Eleitor">

                                 @error('titulo_eleito')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                        </div>

                        {{-- //reservista --}}
                        <div class="col-6">
                            <label class="col-form-label"  >Reservista</label>
                                <input type="text" name="reservista" value="{{ old('reservista') }}"
                                class="col-12 form-control @error('reservista') is-invalid @enderror" id="reservista"
                                placeholder="Reservista">

                                 @error('reservista')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                        </div>

                        {{-- //carteira_trabalho--}}
                        <div class="col-6">
                            <label class="col-form-label"  >Carteira de Trabalho</label>
                                <input type="text" name="carteira_trabalho" value="{{ old('carteira_trabalho') }}"
                                class="col-12 form-control @error('carteira_trabalho') is-invalid @enderror" id="carteira_trabalho"
                                placeholder="Carteira">

                                 @error('carteira_trabalho')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                        </div>

                        {{-- //tipo_perfil_id--}}

                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <h1>Endereço</h1>
                        </div>

                        <div class="col-12 row">

                        {{-- //Rua --}}
                        <div class="col-6">
                            <label class="col-form-label"  >Rua</label>
                            <input type="text" name="rua" value="{{ old('rua') }}"
                                class="col-12  form-control @error('rua') is-invalid @enderror" id="inputSemestres"
                                placeholder="Rua">

                            @error('rua')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- //Número --}}
                        <div class="col-3">
                            <label class="col-form-label"  >Número</label>
                            <input type="text" name="numero" value="{{ old('numero') }}"
                                class="col-12  form-control @error('numero') is-invalid @enderror" id="inputSemestres"
                                placeholder="Número">

                            @error('numero')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        {{-- //Bairro --}}
                        <div class="col-3">
                            <label class="col-form-label"  >Bairro</label>
                            <input type="text" name="bairro" value="{{ old('bairro') }}"
                                class="col-12  form-control @error('bairro') is-invalid @enderror" id="bairro"
                                placeholder="Bairro">

                            @error('bairro')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- //Complemento --}}
                        <div class="col-6">
                            <label class="col-form-label"  >Complemento</label>
                            <input type="text" name="complemento" value="{{ old('complemento') }}"
                                class="col-12  form-control @error('semestres') is-invalid @enderror" id="inputSemestres"
                                placeholder="Complemento">

                            @error('complemento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                            {{-- //Cidade --}}
                        <div class="col-3">
                            <label class="col-form-label"  >Cidade</label>
                            <input type="text" name="cidade" value="{{ old('cidade') }}"
                                class="col-12 form-control @error('cidade') is-invalid @enderror" id="inputSemestres"
                                placeholder="Cidade">

                            @error('cidade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        {{-- //Estado --}}
                        <div class="col-3">
                            <label class="col-form-label"  >Estado</label>
                            <input type="text" name="estado" value="{{ old('estado') }}"
                                class="col-12 form-control @error('estado') is-invalid @enderror" id="inputSemestres"
                                placeholder="Estado">

                            @error('estado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        {{-- //Pais --}}
                        <div class="col-6">
                            <label class="col-form-label"  >Pais</label>
                            <input type="text" name="pais" value="{{ old('pais') }}"
                                class="col-12  form-control @error('pais') is-invalid @enderror" id="inputSemestres"
                                placeholder="Pais">

                            @error('pais')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- //CEP --}}
                        <div class="col-6">
                            <label class="col-form-label"  >CEP</label>
                            <input type="text" name="cep" value="{{ old('cep') }}"
                                class="col-12  form-control @error('cep') is-invalid @enderror" id="inputSemestres"
                                placeholder="CEP">

                            @error('cep')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <h1 class="m-1">Tipo de Perfil</h1>
                        </div>
                        <div class="col-12 row">
                            <div class="col-4">
                                    <label class="col-form-label"  >Vinculo Empregaticio</label>
                                    <select name="cargo_id" id="cargo" class="form-control col-12">
                                        @foreach ($cargos as $cargo)
                                        <option value="{{$cargo->id}}">{{$cargo->nome_cargo}}</option>
                                        @endforeach
                                    </select>

                                @error('funcao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           </div>


                    {{-- //email --}}
                    <div class="col-8">
                        <label class="col-form-label"  >Email</label>
                            <input type="text" name="email" value="{{ old('email') }}"
                                class="col-12  form-control @error('email') is-invalid @enderror" id="inputSemestres"
                                placeholder="E-mail">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                     </div>
                            <div class="col-5">
                                    <label class="col-form-label"  >Tipo Permissão</label>
                                    <select name="permissao" id="permissao" class="form-control  col-12">
                                        {{--  <option value="Cuiabá">Cuiabá</option>  --}}

                                        @foreach ($roles as $role)
                                        <option value="{{$role->name}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="col-5">
                                <label class="col-form-label"  >Perfil</label>
                                    <select name="tipo_perfil_id" id="tipo_perfil_id" class="selectOtion form-control col-12">
                                        @foreach ($tipo_perfils as $tipo_perfil)
                                           <option value="{{$tipo_perfil->id}}">{{$tipo_perfil->nome_perfil}}</option>
                                        @endforeach
                                    </select>

                                    @error('tipo_perfil_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                            </div>

                            <div class="col-2">
                                <label   class="col-12">Ativo</label>
                                <label  class="switch ">
                                    <input type="checkbox" name="is_activated"  id="togBtn">
                                    <div class="slider round"></div>
                                </label>
                            </div>
                        </div>

                    </div>
                    <div class="mt-4 d-flex justify-content-end">
                        <button type="submit" class="btn btn-success mr-1">Cadastrar</button>
                        <a href="{{ route('funcionario.create') }}" class="btn btn-primary">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
