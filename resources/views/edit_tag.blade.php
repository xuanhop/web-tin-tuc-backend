@extends('layouts.master')

@section('title', 'Tag manager')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-box">
                    <h4 class="page-title">{{__('Edit Tag')}}</h4>
                </div>
            </div>
            <div class="col-md-4">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tag name:</label>
                        <input type="text" class="form-control" value="{{$tag->tag_name}}" name="tag_name">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection