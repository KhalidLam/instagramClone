@extends('layouts.app')

@section('content')
<div class="container">

    <form action="/p/" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-8 offset-2">

                @csrf
                <div class="row">
                    <h1>Add New Post</h1>
                </div>

                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label">Post Caption</label>
    
                    <input  id="caption" 
                            type="caption" 
                            class="form-control @error('caption') is-invalid @enderror" 
                            name="caption" 
                            value="{{ old('caption') }}" 
                            placeholder="Write a caption..." autocomplete="caption">

                    @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

        
                <div class="row">
        
                    <label for="image" class="col-md-4 col-form-label">Post Image</label> 
                
                    <input type="file" class="form-control-file @error('caption') is-invalid @enderror" name="image" id="image" >  
            
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                   
                </div>
                

                <div class="row pt-4">
                    <button class="btn btn-primary">Add New Post</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
