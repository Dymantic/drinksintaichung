@extends('admin.base')

@section('content')
    <section class="flex justify-center mt-6">
        <form action="/admin/login" method="POST" class="max-w-sm w-4/5 bg-white">
            <p class="text-center text-lg font-bold uppercase my-4 text-grey">Login</p>
            {!! csrf_field() !!}
            <div class="my-3 bg-white h-12 w-full flex items-center px-3">
                <label class="text-green mx-4">
                    @include('svgicons.user', ['classes' => 'h-4'])
                </label>
                <input type="text" name="email" placeholder="Your email address" class="w-full h-8 inline-block border-b border-green">
            </div>
            <div class="my-3 bg-white h-12 w-full flex items-center px-3">
                <label class="text-green mx-4">
                    @include('svgicons.key', ['classes' => 'h-4'])
                </label>
                <input type="password" name="password" placeholder="Your password" class="w-full h-8 inline-block border-b border-green">
            </div>
            <div class="my-3 bg-white h-12 w-full flex items-center px-3">
                <button type="submit" class="w-full text-white bg-green uppercase h-8">Login</button>
            </div>
        </form>
    </section>
@endsection