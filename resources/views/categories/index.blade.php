@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-end mb-4">
        <a href="{{ url('adminDashboard') }}" class="btn btn-warning me-2">Dashboard</a>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Add</a>
    </div>

    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-error" role="alert">
        {{ session('error') }}
    </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Parent Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $key => $value)
            <tr>
                <td>{{ $value->name }}</td>
                <td>{{ ($value->parent) ? $value->parent->name : '' }}</td>
                <td>
                    <a class="mr-3 btn btn-info btn-sm" href="{{ route('categories.edit', $value) }}">Edit</a>
                    <form method="POST" action="{{ route('categories.destroy', $value) }}" class="d-inline-block" onsubmit="return confirm('Are you sure?')">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="form-group">
                            <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>
@endsection