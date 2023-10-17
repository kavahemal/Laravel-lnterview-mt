@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Welcome {{ Auth::user()->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    Admin Dashboard

                    <hr>
                    <div>
                        <div class="float-start d-inline-block">
                            <h3>Categories</h3>
                        </div>
                        <div class="float-end d-inline-block">
                            <a href="{{ url('categories') }}" class="btn btn-success">Categories</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    @if(count($categories))
                    <div class="border py-2 mt-3">
                        <ul class="mb-0">
                            @foreach($categories as $category)
                            <li>
                                <b>{{ $category->name }}</b>
                                @if(count($category->allChildren))
                                @include('_category', ['categories' => $category->allChildren])
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <hr>
                    <h4>Users</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th class="text-center">Dashboard</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="text-center"><a href="{{ url('userDashboard', $user->id) }}" class="btn btn-info btn-sm" target="_blank">Dashboard</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection