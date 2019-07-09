@extends('layouts.master')
@if(!isset($post))
    @section('title', 'Add new')
@else
    @section('title', 'Edit')
@endif

@section('content')
    @if(isset($post))
        <div class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">

                        <h4 class="page-title">Edit</h4>

                        <div class="clearfix">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title: </label>
                            <input class="form-control" type="text" name="title" value="{{$post->title}}">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status">
                                @if($post->status == 1)
                                    <option value="1">Active</option>
                                    <option value="-1">Inactive</option>
                                @else
                                    <option value="-1">Inactive</option>
                                    <option value="1">Active</option>
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="category_name">Category: </label>
                            <select class="form-control" name="category">
                                @foreach($categories as $category)
                                    <option @if($category->id == $post->category_id) selected
                                            @endif class="form-control"
                                            value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="content">Content:</label>
                            @foreach($post->meta as $attribute)
                                <textarea class="form-control" name="content_text">{{$attribute->data}}</textarea>

                            @endforeach
                            @if($post->meta->isEmpty())
                                <textarea class="form-control" name="content_text"></textarea>
                            @endif
                        </div>
                        {{--                        <div class="form-group">--}}
                        {{--                            <label for="Tag">Tags name: </label>--}}
                        {{--                            <div class="form-check">--}}

                        {{--                                @foreach($tags as $tag)--}}
                        {{--                                    <div class="">--}}
                        {{--                                        <div class="col-sm-4">--}}

                        {{--                                            <input type="checkbox" value="{{$tag->id}}"--}}
                        {{--                                                   name="tag[]">{{$tag->tag_name}}--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                @endforeach--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <div class="form-group">
                            <label for="main_image">Main Image: </label>
                            <div class="form-group">
                                <img src="{{url('uploads/'.$post->main_image)}}" style="border: 1px solid #ddd; border-radius: 4px;
                                    padding: 5px;
                                    width: 150px;" alt="main_image">
                            </div>
                            <input type="file" class="form-group" name="main_image">
                        </div>
                        <div class="form-group m-t-3 ">
                            <input type="submit" class="btn btn-primary" name="submit" value="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @else
        <!--Form create-->
        <div class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Create new</h4>
                        <div class="clearfix">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title: <span style="color: red;">(*)</span></label>
                            <input class="form-control" type="text" name="title" value="{{old('title')}}">
                            @error('title')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status">
                                <option value="1">Active</option>
                                <option value="-1">Inactive</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="category_name">Category: </label>
                            <select class="form-control" name="category">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" name="content_text">{{old('')}}</textarea>
                        </div>
                        {{--                        <div class="form-group">--}}
                        {{--                            <label for="Tag">Tags:</label>--}}
                        {{--                            <div class="form-group">--}}
                        {{--                                @foreach($tags as $tag)--}}
                        {{--                                    <div class="">--}}
                        {{--                                        <div class="col-sm-4">--}}
                        {{--                                            <input type="checkbox" value="{{$tag->id}}" name="tag[]">{{$tag->tag_name}}--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                @endforeach--}}
                        {{--                                {{$tags->links('layouts.display')}}--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <div class="form-group">
                            <label for="main_image">Main Image:<span style="color: red;">(*)</span> </label>
                            <input type="file" class="form-group" name="main_image">
                            @error('main_image')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group m-t-3 ">
                            <input type="submit" class="btn btn-primary" name="submit">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    @endif

@endsection
