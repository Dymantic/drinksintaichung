@extends('admin.base')

@section('content')
<feature-page :feature-attributes='{{ json_encode($feature) }}'></feature-page>
@endsection