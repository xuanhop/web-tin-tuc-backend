@extends('layouts.master')

@section('title', 'Tag manage')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="page-title-box">
                    <h4 class="page-title">{{__('Tags creation')}}</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="tag_name">Tag Name</label>
                        <input type="text" class="form-control" placeholder="name" name="tag_name">
                        @error('tag_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection