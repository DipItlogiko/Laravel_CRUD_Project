@extends('layout.master')



@section('title')

CRUD-Application
    
@endsection


<!--Flash Message------------->

@if($message = Session::get('success')) <!-------akhane jodi session theke success key pai kono tahole oi success key ar jei value ta thakbe oi value ta amader $message variable ar moddhe chole ashbe------>
       <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
       </div>
@endif


@section('container')

   <div class="text-right mt-2">
    <a href="{{ route('products.create') }}" class="btn btn-info">New Product</a>
   </div>

  <h1>Products</h1>


  <div class="mt-4">
    
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">IDno.</th>
          <th scope="col">Name</th>
          <th scope="col">Description</th>
          <th scope="col">Image</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($products as $product)

            <tr>
                <th scope="row">{{ $product->id }}</th>

                <td> <a href="/products/{{ $product->id }}/show" class="text-dark">  {{ $product->name }} </a></td>
                
                <td>{{ $product->description }}</td>
                
                <td>
                  <img  src="Products/{{ $product->image }}"  class="rounded-circle" width="40" height="40" /> <!--akhane Products/ ta hocche amader akta directory jei directory ta amara public directory ar moddhe create korechi amader products ar picture gulo rakhar------->
                </td>
                
                <td>        
                  <a href="products/{{ $product->id }}/edit" class="btn btn-warning">Edit</a><!--akhane jokhon kew amader application ar edit button a click korbe tokhon oi record ar id ta amra aikhane akta url create kore pass korediyechi products/{{-- $product->id --}}/edit jei row ar ba record ar edit button a click kora hobe oi record ar id ta amader ai url ar maddhome pass hoye jabe route ar moddehe check routes/web.php ------->
                  
                  <a href="products/{{ $product->id }}/delete" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a><!--akhane jokhon kew amader application ar Delete button a click korbe tokhon oi record ar id ta amra aikhane akta url create kore pass korediyechi products/{{-- $product->id --}}/delete jei row ar ba record ar Delete button a click kora hobe oi record ar id ta amader ai url ar maddhome pass hoye jabe route ar moddehe check routes/web.php ------->
                </td>
            </tr>

        @endforeach
         
      </tbody>
    </table>

  </div>
    
@endsection