@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">Secretaria</li>
    <li class="breadcrumb-item">Funcionario</li>
    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('curso.index') }}">Cadastrar</a></li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="sky-box mb-2">
        <div class="card-body">
            <form id="regForm" action="{{ route('funcionario.store') }}" method="POST">
                    @method('POST')
                    @csrf
                    <!-- One "tab" for each step in the form: -->
                    <div class="tab">
                        <div class="d-flex justify-content-between align-items-center mb-5">
                            <h1>Dados Pessoais</h1>
                        </div>

                        <div class="row mb-2">
                            <div class="col-sm-12 col-md-6">
                                <label for="nome" class="mb-0">Nome completo</label>
                                <input type="text" name="nome" value="{{ old('nome') }}" class="form-control @error('nome') is-invalid @enderror" id="nome" placeholder="nome">

                                @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-sm-12 col-md-3">
                                <label class="mb-0" for="matricula">Matricula</label>
                                <input type="text" name="matricula" value="{{ old('matricula') }}" class="form-control @error('matricula') is-invalid @enderror" id="matricula" placeholder="Matricula">

                                @error('matricula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-sm-12 col-md-3">
                                <label class="mb-0" for="telefone">Telefone</label>
                                <input type="text" name="telefone" value="{{ old('telefone') }}"
                                    class="form-control @error('telefone') is-invalid @enderror" id="telefone"
                                    placeholder="Telefone">
                    
                                @error('telefone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <script>
                                document.getElementById('matricula').addEventListener('click', function(){
                                    $('#telefone').mask('(99)9 9999-9999');
                                });
                            </script>
                        </div>
                        
                        <div class="row mb-2">

                            <div class="col-sm-12 col-md-6">
                                <label class="mb-0" for="nome_pai">Nome do Pai</label>
                                <input type="text" name="nome_pai" value="{{ old('nome_pai') }}"class="form-control @error('nome_pai') is-invalid @enderror" id="nome_pai" placeholder="Nome do Pai">
                        
                                @error('nome_pai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <label class="mb-0" for="nome_mae">Nome da Mãe</label>
                                <input type="text" name="nome_mae" value="{{ old('nome_mae') }}" class="form-control @error('nome_mae') is-invalid @enderror" id="nome_mae" placeholder="Nome da Mãe">
                    
                                @error('nome_mae')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        
                        <div class="row mb-2">
                            <div class="col-sm-12 col-md-4">
                                <label class="mb-0" for="cpf">CPF</label>
                                <input type="text" name="cpf" value="{{ old('cpf') }}" class="form-control @error('cpf') is-invalid @enderror" id="cpf" placeholder="CPF">

                                @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-sm-12 col-md-4">
                                <label class="mb-0" for="rg">RG</label>
                                <input type="text" name="rg" value="{{ old('cpf') }}" class="form-control @error('cpf') is-invalid @enderror" id="rg" placeholder="RG">
                    
                                @error('rg')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-sm-12 col-md-4">
                                <label class="mb-0" for="titulo_eleitor">Titulo de eleitor</label>
                                <input type="text" name="titulo_eleitor" value="{{ old('titulo_eleitor') }}" class="form-control @error('titulo_eleitor') is-invalid @enderror" id="titulo_eleitor" placeholder="Titulo de Eleitor">
                    
                                @error('titulo_eleito')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-2">
                            <div class="col-sm-12 col-md-4">
                                <label class="mb-0" for="reservista">Reservista</label>
                                <input type="text" name="reservista" value="{{ old('reservista') }}" class="col-12 form-control @error('reservista') is-invalid @enderror" id="reservista" placeholder="Reservista">
                    
                                @error('reservista')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-sm-12 col-md-4">
                                <label class="mb-0" for="carteira_trabalho">Carteira de Trabalho</label>
                                <input type="text" name="carteira_trabalho" value="{{ old('carteira_trabalho') }}"class="col-12 form-control @error('carteira_trabalho') is-invalid @enderror" id="carteira_trabalho" placeholder="Carteira">
                    
                                @error('carteira_trabalho')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-2">
                            <div class="col-sm-12 col-md-4">
                                <label class="mb-0" for="nacionalidade">Nacionalidade</label>
                                <input type="text" name="nacionalidade" value="{{ old('nacionalidade') }}" class="form-control @error('nacionalidade') is-invalid @enderror" id="nacionalidade" placeholder="Nacionalidade">
                    
                                @error('nacionalidade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-sm-12 col-md-4">
                                <label class="mb-0" for="naturalidade">Naturalidade</label>
                                <input type="text" name="naturalidade" value="{{ old('naturalidade') }}" class="form-control @error('naturalidade') is-invalid @enderror" id="naturalidade" placeholder="Naturalidade">
                
                                @error('naturalidade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="tab">
                        <div class="d-flex justify-content-between align-items-center mb-5">
                            <h1>Endereço</h1>
                        </div>

                        <div class="row mb-2">
                            <div class="col-sm-12 col-md-9">
                                <label class="mb-0" for="rua">Rua</label>
                                <input type="text" name="rua" value="{{ old('rua') }}"class="form-control @error('rua') is-invalid @enderror" id="rua" placeholder="Rua">
                    
                                @error('rua')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-sm-12 col-md-3">
                                <label class="mb-0" for="numero">Número</label>
                                <input type="text" name="numero" value="{{ old('numero') }}"
                                    class="form-control @error('numero') is-invalid @enderror" id="numero"
                                    placeholder="Número">
                    
                                @error('numero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-sm-12 col-md-6">
                                <label class="mb-0" for="bairro">Bairro</label>
                                <input type="text" name="bairro" value="{{ old('bairro') }}"
                                    class="form-control @error('bairro') is-invalid @enderror" id="bairro"
                                    placeholder="Bairro">
                    
                                @error('bairro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <label class="mb-0" for="complemento">Complemento</label>
                                <input type="text" name="complemento" value="{{ old('complemento') }}"
                                    class="form-control @error('semestres') is-invalid @enderror" id="complemento"
                                    placeholder="Complemento">
                    
                                @error('complemento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-sm-12 col-md-5">
                                <label class="mb-0" for="cidade">Cidade</label>
                                <input type="text" name="cidade" value="{{ old('cidade') }}"
                                    class="form-control @error('cidade') is-invalid @enderror" id="cidade"
                                    placeholder="Cidade">
                    
                                @error('cidade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-sm-12 col-md-4">
                                <label class="mb-0" for="estado">Estado</label>
                                <input type="text" name="estado" value="{{ old('estado') }}"
                                    class="form-control @error('estado') is-invalid @enderror" id="estado"
                                    placeholder="Estado">
                    
                                @error('estado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                            <div class="col-sm-12 col-md-3">
                                <label class="mb-0" for="cep">CEP</label>
                                <input type="text" name="cep" value="{{ old('cep') }}"
                                    class="form-control @error('cep') is-invalid @enderror" id="cep"
                                    placeholder="CEP">
                    
                                @error('cep')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--<div class="col-4">
                            <label class="mb-0" for="pais">Pais</label>
                            <input type="text" name="pais" value="{{ old('pais') }}"
                                class="form-control @error('pais') is-invalid @enderror" id="pais"
                                placeholder="Pais">
                
                            @error('pais')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>--}}

                    </div>

                    <div class="tab">
                        <div class="d-flex justify-content-between align-items-center mb-5">
                            <h1>Tipo de Perfil</h1>
                        </div>

                        <div class="row mb-2">
                            <div class="col-12 mb-2">
                                <label class="mb-0" for="email">Email</label>
                                <input type="text" name="email" value="{{ old('email') }}"
                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                    placeholder="E-mail">
                        
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-sm-12 col-md-4">
                                <label class="mb-0" for="cargo">Vinculo Empregaticio</label>
                                <select name="cargo_id" id="cargo" class="form-control">
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

                            <div class="col-sm-12 col-md-3">
                                <label class="mb-0" for="permissao">Tipo Permissão</label>
                                <select name="permissao" id="permissao" class="form-control">
                                    @foreach ($roles as $role)
                                        <option value="{{$role->name}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-12 col-md-3">
                                <label class="mb-0" for="tipo_perfil_id">Perfil</label>
                                <select name="tipo_perfil_id" id="tipo_perfil_id" class="selectOtion form-control">
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

                            <div class="col-sm-12 col-md-2">
                                <label class="mb-0 col-12">Ativo</label>
                                <label class="switch">
                                    <input type="checkbox" name="is_activated"  id="togBtn">
                                    <div class="slider round"></div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div style="overflow:auto;">
                        <div style="float:right;">
                            <button type="button" class="btn btn-secondary" id="prevBtn" onclick="nextPrev(-1)">Anterior</button>
                            <button type="button" class="btn btn-success" id="nextBtn" onclick="nextPrev(1)">Próximo a</button>
                        </div>
                    </div>
                    <!-- Circles which indicates the steps of the form: -->
                    <div style="text-align:center;margin-top:40px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Enviar";
            } else {
                document.getElementById("nextBtn").innerHTML = "Próximo";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            //if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script>
@endpush
