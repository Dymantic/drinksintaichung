@extends('admin.base')

@section('content')
    <establishment-finder></establishment-finder>
@endsection

@section('bodyscripts')
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_key') }}&libraries=places&callback=initMaps"></script>
@endsection