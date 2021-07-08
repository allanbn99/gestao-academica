@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item">Secretaria</li>
    <li class="breadcrumb-item"><a href="{{ route('aluno.index') }}">Aluno</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="sky-box">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Cadastrar Aluno</h1>
                </div>
                <form id="regForm" class="mt-2" action="{{ route('aluno.store') }}" method="POST">
                    @csrf
                    <div class="tab">
                        <div class="d-flex justify-content-between align-items-center mb-5">
                            <h4>Dados Pessoais</h4>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
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

                            <div class="form-group col-md-4">
                                <label for="inputCpf">CPF</label>
                                <input type="text" name="cpf" value="{{ old('cpf') }}" class="col-12  form-control @error('cpf') is-invalid @enderror" id="cpf" placeholder="CPF" onkeyup="mascara('###.###.###-##',this,event,false)">

                                @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputRg">RG</label>
                                <input type="text" name="rg" value="{{ old('rg') }}"
                                    class="col-12  form-control @error('cpf') is-invalid @enderror" id="rg" placeholder="RG">
                                @error('rg')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
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

                            <div class="form-group col-md-6">
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

                            <div class="form-group col-md-6">
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

                            <div class="form-group col-md-4">
                                <label for="inputCurso">Curso</label>
                                <select name="nome_curso" id="nome_curso" class="form-control">
                                    @foreach ($cursos as $aluno_Cursos)
                                        <option value="{{ $aluno_Cursos->id }}">{{ $aluno_Cursos->nome_curso }}</option>
                                    @endforeach
                                </select>
                                @error('Curso')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputTelefone">Telefone</label>
                                <input type="text" name="telefone" value="{{ old('telefone') }}"
                                    class="col-12 form-control @error('telefone') is-invalid @enderror" id="telefone"
                                    placeholder="Telefone" onkeyup="mascara('(##)# ####-####',this,event,false)">
                                @error('telefone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputNacionalidade">Nacionalidade</label>
                                <input type="text" name="nacionalidade" value="{{ old('nacionalidade') }}" class="col-12 form-control @error('nacionalidade') is-invalid @enderror" id="nacionalidade" placeholder="Nacionalidade">
                                @error('nacionalidade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputNaturalidade">Naturalidade</label>
                                <input type="text" name="naturalidade" value="{{ old('naturalidade') }}" class="col-12 form-control @error('naturalidade') is-invalid @enderror" id="naturalidade" placeholder="Naturalidade">
                                @error('naturalidade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputTituloEleitor">Titulo de Eleitor</label>
                                <input type="text" name="titulo_eleitor" value="{{ old('titulo_eleitor') }}" class="col-12 form-control @error('titulo_eleitor') is-invalid @enderror" id="titulo_eleitor" placeholder="Titulo de Eleitor">
                                @error('titulo_eleitor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputReservista">Reservista</label>
                                <input type="text" name="reservista" value="{{ old('reservista') }}" class="col-12 form-control @error('reservista') is-invalid @enderror" id="reservista" placeholder="Reservista">
                                @error('reservista')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="tab">
                        <div class="d-flex justify-content-between align-items-center mb-5">
                            <h4>Acesso</h4>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="inputEmail">Email</label>
                                <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="E-mail">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-5">
                                <label for="inputEmail">Senha</label>
                                <input type="password" name="senha" value="{{ old('senha') }}" class="form-control @error('senha') is-invalid @enderror" id="inputSemestres" placeholder="Senha">
                                @error('Senha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="col-2">
                                <center>
                                    <label class="col-12">Ativo</label>
                                    <label class="switch ">
                                        <input type="checkbox" name="is_activated" id="togBtn">
                                        <div class="slider round"></div>
                                    </label>
                                </center>
                            </div>
                        </div>
                        
                    </div>

                    <div style="overflow:auto;">
                        <div style="float:right;">
                            <button type="button" class="btn btn-secondary" id="prevBtn" onclick="nextPrev(-1)">Voltar</button>
                            <button type="button" class="btn btn-success" id="nextBtn" onclick="nextPrev(1)">Próximo</button>
                        </div>
                    </div>
                    <!-- Circles which indicates the steps of the form: -->
                    <div style="text-align:center;margin-top:40px;">
                        <span class="step"></span>
                        <span class="step"></span>
                    </div>

                    {{--<div class="mt-4 d-flex justify-content-end">
                        <button type="submit" class="btn btn-success mr-1">Cadastrar</button>
                        <a href="{{ route('aluno.index') }}" class="btn btn-primary">Voltar</a>
                    </div>--}}
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        function ResetCampos(){for(var o=document.getElementsByTagName("input"),e=0;e<o.length;e++)"text"==o[e].type&&(o[e].style.backgroundColor="",o[e].style.borderColor="")}function coresMask(o){var e=o.value,r=e.length,t=o.maxLength;0==r?(o.style.borderColor="",o.style.backgroundColor=""):r<t?(o.style.borderColor=corIncompleta,o.style.backgroundColor=corIncompleta):(o.style.borderColor=corCompleta,o.style.backgroundColor=corCompleta)}function mascara(o,e,r,t){var l=e.selectionStart,a=e.value;a=a.replace(/\D/g,"");var s=a.length,c=o.length;window.event?id=r.keyCode:r.which&&(id=r.which),cursorfixo=!1,l<s&&(cursorfixo=!0);var n=!1;if((16==id||19==id||id>=33&&id<=40)&&(n=!0),ii=0,mm=0,!n){if(8!=id)for(e.value="",j=0,i=0;i<c&&("#"==o.substr(i,1)?(e.value+=a.substr(j,1),j++):"#"!=o.substr(i,1)&&(e.value+=o.substr(i,1)),8==id||cursorfixo||l++,j!=s+1);i++);t&&coresMask(e)}cursorfixo&&!n&&l--,e.setSelectionRange(l,l)}var corCompleta="#99ff8f",corIncompleta="#eff70b";

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
                document.getElementById("nextBtn").innerHTML = "Cadastrar Aluno";
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