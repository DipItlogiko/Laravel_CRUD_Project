@extends('layout.master')

@section('title')
edit    
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
     <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card mt-3 p-3 ">
               
                <h3 class="text-muted">Product Edit#{{ $product->name }}</h3>

                <form action="/products/{{ $product->id }}/update" method="POST" enctype="multipart/form-data"> <!--Amader ai Form ar action ta products/{{-- $product->id --}}/update ai route aaa jabe ai url ta amra create korechi akhane amader product ar id ta pass korchi url ar sathe amader route aaa------>
                    @csrf                  
                    
                    @method('PUT') <!--ai put method ta dewar karon jokhon amra kono record ke update kori ba edit kori tokhon amader ai method ta likhte hoy tahole laravel bujtepare ai record ta update hobe------------>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name',$product->name)  }}">
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>


                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea  name="description"  cols="20" rows="5" class="form-control">{{ old('description', $product->description) }}</textarea>
                        <span class="text-danger">
                            @error('description')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>


                    <div class="form-group">
                        <label for="image">image</label>
                        <input type="file" name="image" class="form-control" value="{{ old('image') }}">
                        <span class="text-danger">
                            @error('image')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>


                    <button type="submit" class="btn btn-success">Update</button>
                </form>
        </div>
        </div>
     </div>
@endsection