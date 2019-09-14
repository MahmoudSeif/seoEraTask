@extends('layouts.app')
@section('products-active', 'active')

@section('page-title')Products @endsection
@section('page-header')
    <h1>Dashboard<small>Products</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Products</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Products</h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <a href="{{route('add-product')}}" class="btn btn-block btn-primary">Add New Product</a>
                        </div>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td><a href="{{route('view-product',$product->id)}}">{{$product->name}}</a></td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->price}}</td>
                                <td><img src="{{$product->image_path}}"></td>
                                <td>
                                    <form method="POST" action="{{route('delete-product',$product->id)}}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-primary btn-lg" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
