@extends('layouts.layout')

@if (!empty($attributes))
    {{ $attributes[0]['attribute_label'] }}
    {{ $attributes[1]['attribute_label'] }}
@endif

@section('content')

@endsection
