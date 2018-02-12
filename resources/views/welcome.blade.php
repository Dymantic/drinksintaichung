<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="csrf-token"
          content="{{ csrf_token() }}">
    <link rel="stylesheet"
          href="{{ mix('css/app.css') }}">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,700"
          rel="stylesheet">
</head>
<body class="font-sans bg-grey-lighter">
<div id="app">
    <div class="h-screen w-full bg-red z-50 slide-menu-tray fixed"
         :class="{'open': menuOpen}">
        <span @click="menuOpen = false"
              class="h-16 bg-white flex justify-end items-center text-3xl font-bold pr-4">&times</span>
        <ul class="list-reset">
            <li class="flex justify-center items-center border-b-2 border-w w-full h-12"><router-link class="no-underline text-lg text-white uppercase" to="/">Home</router-link></li>
            <li class="flex justify-center items-center border-b-2 border-w w-full h-12"><router-link class="no-underline text-lg text-white uppercase" to="/about">About Drinks in Taichung</router-link></li>
            <li class="flex justify-center items-center border-b-2 border-w w-full h-12"><router-link class="no-underline text-lg text-white uppercase" to="/map">Find a drink...</router-link></li>
            <li class="bg-red-light flex justify-center items-center border-b-2 border-w w-full h-12"><router-link class="no-underline text-lg text-white" to="/filters">Preferences</router-link></li>
            <li class="bg-red-light flex justify-center items-center border-b-2 border-w w-full h-12"><router-link class="no-underline text-lg text-white" to="/map">Location</router-link></li>
            <li class="bg-red-light flex justify-center items-center border-b-2 border-w w-full h-12"><router-link class="no-underline text-lg text-white" to="/list">Browse all</router-link></li>
            <li class="flex justify-center items-center border-b-2 border-w w-full h-12"><router-link class="no-underline text-lg text-white uppercase" to="/request-establishment">Add your Establishment</router-link></li>
            <li class="flex justify-center items-center border-b-2 border-w w-full h-12"><a class="no-underline text-lg text-white uppercase" href="#">Contact the Creators</a></li>
            <li class="flex justify-center items-center border-b-2 border-w w-full h-12"><a class="no-underline text-lg text-white uppercase" href="#">I want this for my city</a></li>
            <li class="flex justify-center items-center border-b-2 border-w w-full h-12"><a class="no-underline text-lg text-white uppercase" href="#">I want this in Chinese</a></li>
        </ul>
    </div>
    <div class="flex justify-between items-center border-b-4 h-16">
        <span @click="menuOpen = true">
            @include('svg.menu')
        </span>
        <div class="flex justify-end items-center">
            <router-link to="/list"
                         class="m-2 text-red-dark"
                    {{--v-if="!is_home"--}}
            >
                @include('svg.browse')
            </router-link>
            <router-link to="/map"
                         class="m-2 text-red-dark"
            >
                @include('svg.map_marker')
            </router-link>
            <router-link to="/filters"
                         class="m-2 text-red-dark"
                    {{--v-if="!is_home"--}}
            >
                @include('svg.filter')
            </router-link>
        </div>

        {{--<div @click="menuOpen = true"--}}
             {{--class="m-2">--}}
            {{--@include('svg.menu')--}}
        {{--</div>--}}
    </div>
    <router-view></router-view>
</div>
<script src="{{ mix('js/app.js') }}"></script>
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_key') }}&callback=initMap"></script>
</body>
</html>
