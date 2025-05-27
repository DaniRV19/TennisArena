@extends('layouts.app')

@section('content')
    @include('components.header2') 

    <div id="app" class="p-6">
        <profile-component></profile-component>
    </div>
@endsection

@vite('resources/js/app.js')

