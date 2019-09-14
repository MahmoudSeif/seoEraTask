@extends('layouts.app')
@section('admin-active', 'active')

@section('page-title')Users @endsection
@section('page-header')
    <h1>Dashboard<small>Users</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
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
                    <h3 class="box-title">Users</h3>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>
                                    <form method="POST" action="{{route('active-deactive-user',$user->id)}}">
                                        @csrf
                                        <input type="hidden" name="_method" value="PUT">
                                        <button type="submit" class="btn btn-primary btn-lg" onclick="return confirm('Are you sure you want to change user status?')">@if($user->isActive == 1) Deactive @else Active @endif</button>
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
