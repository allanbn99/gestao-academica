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
                    <h1 class="  left1">Dados Pessoais</h1>
                </div>
                {{-- $funcionario->id  --}}
                <form class="mt-2"  method="POST" action="{{route('funcionario.update',$funcionario_pessoa[0]->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group row col-12">

                            {{-- //nome --}}
                            <div class="col-9">
                                <label class="col-form-label"  >Nome</label>

                                <input disabled type="text" name="nome" value="{{$funcionario_pessoa[0]->nome}}"
                                    class="col-12  form-control @error('nome') is-invalid @enderror" id="nome"
                                    placeholder="Nome">

                                  @error('nome')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            {{-- //matricula --}}
                          <div class="col-3">
                            <label class="col-form-label"   >Matrícula</label>
                                <input disabled type="text" name="matricula" value="{{$funcionario->matricula}}"
                                class="col-12 form-control @error('matricula') is-invalid @enderror" id="matricula"
                                placeholder="Matricula">

                                    @error('matricula')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            {{-- //cpf --}}
                             <div class="col-3">
                                    <label class="col-form-label"   >CPF</label>
                                    <input disabled      type="text" name="cpf" value="{{$funcionario_pessoa[0]->cpf}}"
                                    class="col-12    form-control @error('cpf') is-invalid @enderror" id="cpf"
                                    placeholder="CPF">

                                     @error('cpf')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                              </div>

                              {{-- //rg --}}
                              <div class="col-3">
                                <label class="col-form-label"   >RG</label>
                                    <input disabled      type="text" name="rg" value="{{$funcionario_pessoa[0]->rg}}"
                                    class="col-12    form-control @error('cpf') is-invalid @enderror" id="rg"
                                    placeholder="RG">

                                     @error('rg')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                              </div>

                             {{--  //nome_pai  --}}
                               <div class="col-6">
                                    <label class="col-form-label"   >Nome do Pai</label>
                                    <input disabled      type="text" name="nome_pai" value="{{$funcionario_pessoa[0]->nome_pai}}"
                                    class="col-12    form-control @error('nome_pai') is-invalid @enderror" id="nome_pai"
                                    placeholder="Nome do Pai">

                                    @error('nome_pai')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                               </div>

                                {{-- //nome_mae --}}
                                <div class="col-6">
                                    <label class="col-form-label"   >Nome da Mãe</label>
                                    <input disabled type="text" name="nome_mae" value="{{$funcionario_pessoa[0]->nome_mae}}"
                                    class="col-12    form-control @error('nome_mae') is-invalid @enderror" id="nome_mae"
                                    placeholder="Nome da Mãe">

                                     @error('nome_mae')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- //telefone --}}
                                <div class="col-3">
                                    <label class="col-form-label"   >Telefone</label>
                                    <input disabled      type="text" name="telefone" value="{{$funcionario_pessoa[0]->telefone}}"
                                    class="col-12    form-control @error('telefone') is-invalid @enderror" id="telefone"
                                    placeholder="Telefone">

                                 @error('telefone')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                                </div>

                                {{-- //nacionalidade --}}
                                <div class="col-3">
                                    <label class="col-form-label"   >Nacionalidade</label>
                                    <input disabled      type="text" name="nacionalidade" value="{{$funcionario_pessoa[0]->nacionalidade}}"
                                    class="col-12    form-control @error('nacionalidade') is-invalid @enderror" id="nacionalidade"
                                    placeholder="Nacionalidade">

                                 @error('nacionalidade')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                                </div>

                                 {{-- //naturalidade --}}
                                 <div class="col-6">
                                    <label class="col-form-label"   >Naturalidade</label>
                                    <input disabled type="text" name="naturalidade" value="{{$funcionario_pessoa[0]->naturalidade}}"
                                    class="col-12    form-control @error('naturalidade') is-invalid @enderror" id="naturalidade"
                                    placeholder="Naturalidade">

                                 @error('naturalidade')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                                 </div>

                                {{-- //titulo_eleito --}}
                                <div class="col-6">
                                    <label class="col-form-label"   >Titulo de Eleitor</label>
                                    <input disabled      type="text" name="titulo_eleitor" value="{{$funcionario_pessoa[0]->titulo_eleitor}}"
                                    class="col-12    form-control @error('titulo_eleitor') is-invalid @enderror" id="titulo_eleitor"
                                    placeholder="Titulo de Eleitor">

                                 @error('titulo_eleito')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                                </div>

                                {{-- //reservista --}}
                                <div class="col-6">
                                    <label class="col-form-label"   >Reservista</label>
                                    <input disabled type="text" name="reservista" value="{{$funcionario_pessoa[0]->reservista}}"
                                    class="col-12    form-control @error('reservista') is-invalid @enderror" id="reservista"
                                    placeholder="Reservista">

                                  @error('reservista')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                                </div>

                                {{-- //carteira_trabalho--}}
                                <div class="col-6">
                                    <label class="col-form-label"   >Carteira de Trabalho</label>
                                    <input disabled      type="text" name="carteira_trabalho" value="{{$funcionario_pessoa[0]->carteira_trabalho}}"
                                    class="col-12    form-control @error('carteira_trabalho') is-invalid @enderror" id="carteira_trabalho"
                                    placeholder="Carteira">

                                  @error('carteira_trabalho')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                                </div>
                                {{-- //tipo_perfil_id--}}
                               {{-- <select name="tipo_perfil_id" id="tipo_perfil_id" class="   selectOtion form-control col-6">
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

                        <div class="d-flex justify-content-between align-items-center">
                            <h1 class="  left2">Endereço</h1>
                        </div>

                        <div class="form-group row col-12">
                            {{-- //Rua --}}
                            <div class="col-6">
                                    <label class="col-form-label"   >Rua</label>

                                    <input disabled      type="text" name="rua" value="{{$funcionario_enderecos[0]->rua}}"
                                        class="col-12    form-control @error('rua') is-invalid @enderror" id="inputSemestres"
                                        placeholder="Rua">

                                @error('rua')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- //Número --}}
                        <div class="col-3">
                            <label class="col-form-label"   >Número</label>
                                <input disabled      type="text" name="numero" value="{{$funcionario_enderecos[0]->numero}}"
                                    class="col-12    form-control @error('numero') is-invalid @enderror" id="inputSemestres"
                                    placeholder="Número">

                             @error('numero')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                            {{-- //Bairro --}}
                            <div class="col-3">
                                <label class="col-form-label"   >Bairro</label>
                            <input disabled      type="text" name="bairro" value="{{$funcionario_enderecos[0]->bairro}}"
                                class="col-12    form-control @error('bairro') is-invalid @enderror" id="inputSemestres"
                                placeholder="Bairro">

                            @error('bairro')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            {{-- //Complemento --}}
                            <div class="col-6">
                                <label class="col-form-label"   >Complemento</label>
                            <input disabled      type="text" name="complemento" value="{{$funcionario_enderecos[0]->complemento}}"
                                class="col-12    form-control @error('semestres') is-invalid @enderror" id="inputSemestres"
                                placeholder="Complemento">

                             @error('complemento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            {{-- //Cidade --}}
                            <div class="col-3">
                                <label class="col-form-label"   >Cidade</label>
                            <input disabled      type="text" name="cidade" value="{{$funcionario_enderecos[0]->cidade}}"
                                class="col-12    form-control @error('cidade') is-invalid @enderror" id="inputSemestres"
                                placeholder="Cidade">

                             @error('cidade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            {{-- //Estado --}}
                            <div class="col-3">
                                <label class="col-form-label"   >Estado</label>
                            <input disabled      type="text" name="estado" value="{{$funcionario_enderecos[0]->estado}}"
                                class="col-12    form-control @error('estado') is-invalid @enderror" id="inputSemestres"
                                placeholder="Estado">

                            @error('estado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="col-6">
                                <label class="col-form-label"   >Pais</label>
                            {{-- //Pais --}}
                            <input disabled      type="text" name="pais" value="{{$funcionario_enderecos[0]->pais}}"
                                class="col-12    form-control @error('pais') is-invalid @enderror" id="inputSemestres"
                                placeholder="Pais">

                             @error('pais')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            {{-- //CEP --}}
                            <div class="col-6">
                                <label class="col-form-label"   >CEP</label>
                            <input disabled      type="text" name="cep" value="{{$funcionario_enderecos[0]->cep}}"
                                class="col-12    form-control @error('cep') is-invalid @enderror" id="inputSemestres"
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
                                   <select disabled name="cargo_id" id="cargo" class="form-control col-12">
                                        @foreach ($funcionario_Cargos as $cargo)
                                            @if ($funcionario->cargo_id ==  $cargo->id)
                                                <option selected value="{{$cargo->id}}">{{$cargo->nome_cargo}}</option>
                                            @else
                                            <option value="{{$cargo->id}}">{{$cargo->nome_cargo}}</option>
                                            @endif
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
                                <input disabled      type="text" name="email" value="{{$funcionario_usuarios->email}}"
                                class="col-12    form-control @error('email') is-invalid @enderror" id="inputSemestres"
                                placeholder="CEP">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                     </div>
                            <div class="col-5">
                                    <label class="col-form-label"  >Tipo Permissão</label>
                                    <select disabled name="permissao" id="permissao" class="form-control  col-12">
                                        {{--  <option value="Cuiabá">Cuiabá</option>  --}}

                                      @foreach ($funcionario_roles as $role)
                                        <option value="{{$role->name}}">{{$role->name}}</option>
                                        @endforeach
                                      </select>
                            </div>

                            <div class="col-5">
                                <label class="col-form-label"  >Perfil</label>
                                     <select disabled name="tipo_perfil_id" id="tipo_perfil_id" class="selectOtion form-control col-12">
                                        @foreach ($funcionario_tipo_perfis as $tipo_perfil)
                                        @if ($funcionario_pessoa[0]->tipo_perfil_id ==  $tipo_perfil->id)
                                           <option selected value="{{$tipo_perfil->id}}">{{$tipo_perfil->nome_perfil}}</option>

                                           @else

                                        @endif
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

                                @if ($funcionario_usuarios->is_activated == 1 )
                                    <label  class="switch ">
                                            <input disabled type="checkbox" checked name="is_activated"  id="togBtn">
                                            <div class="slider round"></div>
                                    </label>

                                    @else
                                    <label   class="switch ">
                                        <input disabled type="checkbox"  name="is_activated"  id="togBtn">
                                        <div class="slider round"></div>
                                    </label>
                                @endif

                            </div>
                        </div>

                    </div>
                    <div class="mt-4 d-flex justify-content-end    row">
                        <a href="{{ route('funcionario.index') }}" class="btn btn-primary">Voltar</a>
                </form>
            </div>
        </div>
    </div>
@endsection
