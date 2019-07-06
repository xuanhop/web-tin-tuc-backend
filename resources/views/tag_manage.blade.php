@extends('layouts.master')

@section('title')
    Tag manage
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="page-title-box">
                    <h4 class="page-title">{{__('Tags Management')}}</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div style="margin-bottom: 10px">
                <a class="btn btn-success" href="{{asset('tag/create')}}"><i
                            class="glyphicon glyphicon-plus"></i> </a>
            </div>
            <div>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td>id</td>
                        <td>name</td>
                        <td>Total posts</td>
                        <td>Created at</td>
                        <td>Updated at</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->tag_name}}</td>
                            <td>{{$tag->count}}</td>
                            <td>{{$tag->created_at}}</td>
                            <td>{{$tag->updated_at}}</td>
                            <td>
                                <a href="tag/edit/{{$tag->id}}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                <a href="tag/delete/{{$tag->id}}" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection