@extends('layouts.master')

@section('title', 'Posts Management')
@section('content')
    <!-- Start right Content here -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="page-title-box">
                    <h4 class="page-title">{{__('Post Management')}}</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="">
                <div>
                    <a class="btn btn-success" href="{{asset('/create')}}"><i class="glyphicon glyphicon-plus"></i> </a>
                </div>
                <div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Title</th>
                            <th scope="col">Status</th>
                            <th scope="col">Main Image</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Updated at</th>
                            <th scope="col">Category name</th>
                            <th scope="col">Content</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <th scope="row">{{$post->id}}</th>
                                <td>{{$post->title}}</td>
                                @if($post->status > 0)
                                    <td>{{__('Active')}}</td>
                                @else
                                    <td>{{__('Inactive')}}</td>
                                @endif
                                <td>{{$post->main_image}}</td>
                                <td>{{$post->created_at}}</td>
                                <td>{{$post->updated_at}}</td>
                                <td>{{$post->category->name}}</td>
                                @foreach($post->meta as $content)
                                    <td>{{$content->data}}</td>
                                @endforeach

                                <td>
                                    <a href="{{asset("posts/delete/$post->id")}}" class="btn btn-danger">Disable</a>
                                    <a href="{{asset("posts/edit/$post->id")}}" class="btn btn-primary">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- container -->
@endsection

