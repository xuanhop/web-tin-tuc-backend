@extends('layouts.master')

@section('title', 'Create new Category')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="page-title-box">
                    <h4 class="page-title">{{__('Create new category')}}</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="category_name">Category name:</label>
                        <input type="text" class="form-control" name="category_name" value="{{old('category_name')}}">
                        @error('category_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description: </label>
                        <input type="text" class="form-control" name="description" value="{{old('description')}}">
                    </div>
                    <div class="form-group">
                        <label for="status">Status: </label>
                        <select name="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="-1">Inactive</option>
                        </select>
                    </div>
                    <div class="form-group" id="parent_category">
                        <label for="parent">Parent category:</label>
                        <select name="parent_category" id="" class="form-control">
                            <option value="0" selected>No parent</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
