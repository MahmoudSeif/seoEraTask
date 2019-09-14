@extends('layouts.app')
@section('languages-active', 'active')

@section('page-title')Languages @endsection
@section('page-header')
    <h1>Dashboard<small>Create Language</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Languages</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">New Language</h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <a href="{{route('languages')}}" class="btn btn-block btn-primary">Back</a>
                        </div>
                    </div>
                </div>
                <form role="form" action="{{route('store-language')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label>Language Title</label>
                            <input type="text" class="form-control" placeholder="Language title" name="title" value="{{old('title')}}" required>
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Language Slogan</label>
                            <input type="text" class="form-control" placeholder="Language slogan" name="slogan" value="{{old('slogan')}}" required>
                            @if ($errors->has('slogan'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('slogan') }}</strong>
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
