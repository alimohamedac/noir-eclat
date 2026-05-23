@extends('layouts.app')

@section('title', 'NOIR ÉCLAT')
@section('description', 'Luxury fashion and modern collections')

@section('content')
    <x-navbar />
    <x-hero />

    <x-collection-section>
        @foreach ($products as $product)
            <x-product-card :product="$product" />
        @endforeach
    </x-collection-section>

    <x-footer />

    <div id="root" hidden></div>
@endsection

