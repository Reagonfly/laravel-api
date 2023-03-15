@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header"><strong>{{ __('User Dashboard Is Where You Padawan Are') }}</strong></div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <strong class="text-primary">{{ __('Wellcome Back Say I To You') }}</strong>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection