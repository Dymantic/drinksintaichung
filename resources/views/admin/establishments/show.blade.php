@extends('admin.base')

@section('content')
    <establishment-page :establishment-attributes='{{ json_encode($establishment) }}'
                        :features='{{ json_encode($features) }}'
                        csrf-token="{{ csrf_token() }}"></establishment-page>
@endsection