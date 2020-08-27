@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Список уведомлений</h1>
        </div>
        <div class="section-body">
            <notifications-list :user-id="{{ $userId }}" />
        </div>
    </section>
@endsection
