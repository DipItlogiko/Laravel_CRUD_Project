@extends('layout.master')

@section('title')
    Create-Product
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

                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                 @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" cols="20" rows="5" class="form-control">{{ old('description') }}</textarea>
                        <span class="text-danger">
                            @error('description')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control" value="{{ old('image') }}">
                        <span class="text-danger">
                            @error('image')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <button type="submit" class="btn btn-success">Submit</button>
</form>

        </div>
        </div>
     </div>
@endsection