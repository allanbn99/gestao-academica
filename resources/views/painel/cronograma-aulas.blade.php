<!-- Extende o template com os componentes necessários -->
@extends('painel.componentes.panel')

<!-- Seção para titulo do site -->
@section('title', '- Home')

<!-- Seção de conteúdos -->
@section('content-panel')
    <div class="input-group mb-3">
        <select class="custom-select" id="validationCustom04" required>
            <option selected disabled value="">Selecione a turma</option>
            <option>ADS 2019 - Noturno</option>
            <option>ADS 2020 - Vespertino</option>
        </select>
        <div class="input-group-append">
            <button class="btn btn-primary">Buscar</button>
        </div>
    </div>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Data</th>
                <th>Disciplina</th>
                <th>Sala</th>
                <th>Bloco</th>
                <th>Facilitador</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>25/05/2020</td>
                <td>Testes</td>
                <td>Sala 15</td>
                <td>Bloco A</td>
                <td>Luís Felipe</td>
            </tr>
            <tr>
                <td>25/05/2020</td>
                <td>Testes</td>
                <td>Sala 15</td>
                <td>Bloco A</td>
                <td>Luís Felipe</td>
            </tr>
            <tr>
                <td>25/05/2020</td>
                <td>Testes</td>
                <td>Sala 15</td>
                <td>Bloco A</td>
                <td>Luís Felipe</td>
            </tr>
        </tbody>
    </table>
@endsection

<!-- Seção para scripts -->
@push('scripts')
    
@endpush