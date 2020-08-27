@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Подписки') }}</div>
                <div class="card-body">
                    <subscriptions
                        :user="{{ auth()->user() }}"
                    ></subscriptions>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
