@extends('layout.master')

@section('title')
    Create-Product
@endsection


@section('container')
     <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card mt-3 p-3 ">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data"> <!--akhane enctype="multipart/form-data" ai ta likhechi karon jokhon ami aita chara amader ai form ar data ta submit korchilam tokhon amra dekhte pai amader shudhu image ar nam ta ashche kintu ami jokhon ai enctype="multipart/form-data" ta likhe diyechi tokhon amra dekhlam amader ai form ta submit howar pore amader image fild ar image ar nam soho amra oonek kichu dekhte parchi ------>
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
                        <textarea name="description"  cols="20" rows="5" class="form-control"  value="{{ old('description') }}"></textarea>
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


                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
        </div>
        </div>
     </div>
@endsection