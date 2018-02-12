@extends('admin.base')

@section('content')
    <div class="flex justify-between items-center mt-4 mb-8">
            <h1 class="text-4xl text-grey-darkest normal">Establishments</h1>
            <div class="flex justify-end items-center">
                <a href="/admin/establishments/search"
                   class="px-2 py-1 text-sm border-2 border-red text-red uppercase no-underline"
                >Add New</a>
            </div>
        </div>
    <div class="max-w-xl mx-auto">
        @foreach($establishments as $establishment)
            <div class="bg-grey-lighter my-3 p-4">
                <a href="/admin/establishments/{{ $establishment['id'] }}" class="no-underline">
                    <p class="mb-2 text-lg font-bold text-red-dark">{{ $establishment['name'] }}</p>
                </a>
                <p class="text-grey-darker">{{ $establishment['description'] }}</p>
                <div class="flex mt-3">
                    @foreach($establishment['features'] as $feature)
                        <div class="mx-3">{!! $feature['icon'] !!}</div>
                    @endforeach
                </div>
            </div>

        @endforeach
    </div>
@endsection