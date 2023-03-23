@extends('layouts.layout')
@for($i = 0; $i < count($attributes); $i++)
    <h1>{{$attributes[$i]->attribute_label}}</h1>
@endfor

