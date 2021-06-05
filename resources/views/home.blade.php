@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item">Home</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="sky-box">
        <div class="card-body">
            {{ __('You are logged in!') }}
        </div>
    </div>
</div>

@if (session('status'))
    <div class="toast bg-success position-absolute" style="top:15px;right:15px;" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
        <div class="toast-body text-white">
            <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session('status') }}
        </div>
    </div>
@endif

@endsection
