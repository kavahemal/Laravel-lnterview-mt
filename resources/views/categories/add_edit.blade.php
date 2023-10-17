@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-end mb-4">
        <a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>
    </div>

    <div class="card">
        <b class="card-header">@if(isset($edit)) Edit @else Add @endif Category</b>

        <form method="post" action="{{ url('categories', isset($edit) ? $edit->id : '') }}" class="m-form" enctype="multipart/form-data">
            @csrf
            @if(isset($edit)) @method('put') @endif

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label for="parent_id">Parent Category</label>
                        <select name="parent_id" id="parent_id" class="form-control">
                            <option value="0">Select</option>
                            @foreach($all_categories as $key => $value)
                            <option value="{{ $value->id }}" {{ old('parent_id', isset($edit) ? $edit->parent_id : '') == $value->id ? "selected" : "" }}>{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', isset($edit) ? $edit->name : '') }}">
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-end">
                    <button type="submit" class="btn btn-success">@isset($edit) Update @else Submit @endisset</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection