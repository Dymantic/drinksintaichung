@extends('admin.base')

@section('content')
    <div class="flex justify-between items-center mt-4 mb-12">
        <h1 class="text-4xl font-sans text-grey-darkest normal">{{ $suggestion['name'] }}</h1>
        <div class="flex justify-end items-center">
            <delete-modal delete-url="/admin/suggested-establishments/{{ $suggestion['id'] }}"
                          resource-name="{{ $suggestion['name'] }}"
                          csrf-token="{{ csrf_token() }}"
                          :redirects="true"
            ></delete-modal>
        </div>
    </div>
    <div class="my-8 bg-grey-lighter p-4">
        <p><strong>Suggested by: </strong>{{ $suggestion['email'] }}</p>
    </div>
    <div class="my-8 bg-grey-lighter p-4">
        <p class="my-2"><strong>Name: </strong>{{ $suggestion['name'] }}</p>
        <p class="my-2"><strong>Address: </strong>{{ $suggestion['address'] }}</p>
        <p class="my-2"><strong>Opening Hours: </strong>{{ $suggestion['opening_hours'] }}</p>
        <p class="my-2"><strong>Happy Hour: </strong>{{ $suggestion['happy_hour'] }}</p>
        <p class="my-2"><strong>Description: </strong>{{ $suggestion['description'] }}</p>
    </div>
    <div class="my-8 bg-grey-lighter p-4">
        <p class="text-lg mb-8 font-bold">Alleged features</p>
        <div class="flex">
            @foreach($suggestion['features'] as $feature)
            <div class="flex flex-col justify-center items-center mx-4">
                {!! $feature['icon'] !!}
                <p>{{ $feature['label'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
@endsection