@extends('layouts.master')

@section('title', 'Create new Category')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="page-title-box">
                    <h4 class="page-title">{{__('Edit category')}}</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="category_name">Category name:</label>
                        <input type="text" class="form-control" name="category_name" value="{{$category->name}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description: </label>
                        <input type="text" class="form-control" name="description" value="{{$category->description}}">
                    </div>
                    <div class="form-group">
                        <label for="status">Status: </label>
                        <select name="status" class="form-control">
                            @if($category->status == 1)
                                <option value="1" selected>Active</option>
                                <option value="-1">Inactive</option>
                            @else
                                <option value="1">Active</option>
                                <option value="-1" selected>Inactive</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group" id="parent_category">
                        <label for="parent">Parent category:</label>
                        <select name="parent_category" id="" class="form-control">
                            @if($category->parent_id == 0)
                                <option value="0" selected>None parent</option>
                                @foreach($categories as $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            @else
                                <option value="0">None Parent</option>
                                @foreach($categories as $value)
                                    <option value="{{$value->id}}"
                                            @if($value->id === $category->parent_id) selected @endif>{{$value->name}}</option>
                                @endforeach
                            @endif
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

@push('scripts')
    <script>
        function disableParentSelection() {
            document.getElementById('parent_category').setAttribute('style', 'display: none');
        }

        function enableParentSelection() {
            document.getElementById('parent_category').setAttribute('style', 'display: block');
        }
    </script>
@endpush