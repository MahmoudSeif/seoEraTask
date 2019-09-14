@extends('layouts.app')
@section('languages-active', 'active')

@section('page-title')Languages @endsection
@section('page-header')
    <h1>Dashboard<small>Languages</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Languages</li>
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
                    <h3 class="box-title">Languages</h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <a href="{{route('add-language')}}" class="btn btn-block btn-primary">Add New Language</a>
                        </div>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Title</th>
                            <th>Slogan</th>
                            <th>Image</th>
                        </tr>
                        @foreach($languages as $language)
                            <tr>
                                <td>{{$language->id}}</td>
                                <td>{{$language->title}}</td>
                                <td>{{$language->slogan}}</td>
                                <td><img src="{{$language->image_path}}"></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
