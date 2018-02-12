@extends('admin.base')

@section('content')
    <div class="flex justify-between items-center mt-4 mb-12">
        <h1 class="text-4xl font-sans text-grey-darkest normal">Community Requests</h1>
        <div class="flex justify-end items-center">

        </div>
    </div>
    <div>
        @foreach($suggestions as $suggestion)
        <div class="my-8 p-4 bg-grey-lighter">
            <p class="text-sm text-grey-dark mb-3">{{ $suggestion['requested_on'] }}</p>
            <a class="no-underline" href="/admin/suggested-establishments/{{ $suggestion['id'] }}">
                <p class="text-xl text-red font-bold mb-4">{{ $suggestion['name'] }}</p>
            </a>
            <p class="my-3">{{ $suggestion['address'] }}</p>
            <p class="my-3">Submitted by: {{ $suggestion['email'] }}</p>
        </div>
        @endforeach
    </div>
@endsection