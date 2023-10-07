@extends('layout.master')



@section('title')

CRUD-Application
    
@endsection


@section('container')

   <div class="text-right mt-2">
    <a href="{{ route('products.create') }}" class="btn btn-info">New Product</a>
   </div>

  <h1>Products</h1>
    
@endsection