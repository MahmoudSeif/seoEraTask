@extends('layouts.app')
@section('products-active', 'active')

@section('page-title')Products @endsection
@section('page-header')
    <h1>Dashboard<small>Create Product</small>
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
                    <h3 class="box-title">New Product</h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <a href="{{route('products')}}" class="btn btn-block btn-primary">Back</a>
                        </div>
                    </div>
                </div>
                <form role="form" action="{{route('store-product')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label>Language</label>
                            <select class="form-control" style="width: 100%;" name="language">
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
                            <input type="text" class="form-control" placeholder="Product Name" name="name" value="{{old('name')}}" required>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Product Description</label>
                            <textarea class="form-control" placeholder="Description" name="description" required>{{old('description')}}</textarea>
                            @if ($errors->has('description_en'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Product Price</label>
                            <input type="text" class="form-control" placeholder="Product Price" name="price" value="{{old('price')}}" required>
                            @if ($errors->has('price'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Upload Image</label>
                            <input type="file" name="img" required>
                            <p class="help-block">It is a required input</p>
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
