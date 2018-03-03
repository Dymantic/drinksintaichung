@extends('base')

@section('content')
<div id="app">
    @include('partials.slide-menu')
    @include('partials.navbar')
    <router-view></router-view>
    @include('partials.base-modals')
</div>
@endsection