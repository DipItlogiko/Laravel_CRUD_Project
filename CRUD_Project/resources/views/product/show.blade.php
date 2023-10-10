@extends('layout.master')

@section('title')
    show
@endsection


@section('container')
    

    <img src="/Products/{{ $product->image }}" alt="" class="rounded mx-auto d-block">

   <div class="text-center mt-5 text-muted">
    <p>Product Name:{{ $product->name }}</p>
    <p>Product Description:{{ $product->description }}</p>
   </div>


@endsection