@extends('layouts.app')
@section('admin-active', 'active')

@section('page-title')Admins @endsection
@section('page-header')
    <h1>Dashboard<small>Admins</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Admins</li>
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
                    <h3 class="box-title">Admins</h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <a href="{{route('add-admin')}}" class="btn btn-block btn-primary">Add New Admin</a>
                        </div>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Language</th>
                            <th>Action</th>
                        </tr>
                        @foreach($admins as $admin)
                            <tr>
                                <td>{{$admin->id}}</td>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->email}}</td>
                                <td>{{$admin->phone}}</td>
                                <td>{{$admin->language->title}}</td>
                                <td>
                                    <form method="POST" action="{{route('delete-admin',$admin->id)}}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-primary btn-lg" onclick="return confirm('Are you sure you want to delete this Admin?')">Delete</button>
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
