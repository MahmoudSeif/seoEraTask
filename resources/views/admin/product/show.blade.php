@extends('layouts.app')
@section('products-active', 'active')

@section('page-title')Products @endsection
@section('page-header')
    <h1>Dashboard<small>View {{$product->name}} Product</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Products</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">View {{$product->name}} Product</h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <a href="{{route('products')}}" class="btn btn-block btn-primary">Back</a>
                        </div>
                    </div>
                </div>
                <form role="form" action="{{route('update-product',$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Language</label>
                            <select class=-"form-control" style="width: 100%;" name="language">
                                <option value="{{$product->language_id}}">{{$product->language->title}}</option>
                                @foreach($languages as $language)
                                    <option value="{{$language->id}}">{{$language->title}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('language'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('language') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" class="form-control" placeholder="Product Name" name="name" value="{{$product->name}}" required>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Product Description</label>
                            <textarea class="form-control" placeholder="Description" name="description" required>{{$product->description}}</textarea>
                            @if ($errors->has('description_en'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Product Price</label>
                            <input type="text" class="form-control" placeholder="Product Price" name="price" value="{{$product->price}}" required>
                            @if ($errors->has('price'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <img src="{{$product->image_path}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Upload Image</label>
                            <input type="file" name="img">
                            <p class="help-block">It is an optional input</p>
                            @if ($errors->has('img'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('img') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
