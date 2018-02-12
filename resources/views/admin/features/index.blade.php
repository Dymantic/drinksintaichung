@extends('admin.base')

@section('content')
<features-index :feature-list='{{ json_encode($features) }}'></features-index>
@endsection