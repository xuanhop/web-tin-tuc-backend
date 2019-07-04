{{--{{($disableCategories)}}--}}
@extends('layouts.master')

@section('title', 'Categories Management')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="page-title-box">
                    <h4 class="page-title">{{__('Categories Management')}}</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="">
                <div style="margin-bottom: 10px">
                    <a class="btn btn-success" href="{{asset('/categories/create')}}"><i
                                class="glyphicon glyphicon-plus"></i> </a>
                    <a class="btn btn-orange" href="{{asset('categories/disable-item')}}">
                        List of disable categories
                    </a>
                </div>
                <div>
                    <table class="table-bordered table">
                        <thead class="table sticky-table-header">
                        <tr>
                            <td>Id</td>
                            <td>Name</td>
                            <td>Description</td>
                            <td>Parent category</td>
                            <td>Created at</td>
                            <td>Updated at</td>
                            <td>Creator/Editor</td>
                            <td class="actions">Action</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($disableCategories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->description}}</td>
                                @if($category->parent_id == 0)
                                    <td>{{__('No parent')}}</td>
                                @else
                                    @php
                                        $var = \App\Category::select('name')->where('id', '=', $category->parent_id)->first();
                                    @endphp
                                    <td>{{$var->name}}</td>
                                @endif
                                <td>{{$category->created_at}}</td>
                                <td>{{$category->updated_at}}</td>
                                <td>
                                    {{$category->user->name}}
                                </td>
                                <td class="actions">
                                    <a href="{{asset('categories/edit/'.$category->id)}}" class="btn btn-primary"><i
                                                class="glyphicon glyphicon-pencil"></i></a>
                                    <a href="{{asset('categories/delete/'.$category->id)}}" class="btn btn-danger"><i
                                                class="glyphicon glyphicon-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
