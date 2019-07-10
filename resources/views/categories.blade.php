@extends('layouts.master')

@section('title', 'Categories management')
@push('css')
    <style>
        td.actions {
            text-align: center;
        }
    </style>
@endpush
@section('content')
    <div class="content">
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

                        <tr class="table sticky-table-header">
                            <td>Id</td>
                            <td colspan="">Name</td>
                            <td>Description</td>
                            <td>Created at</td>
                            <td>Updated at</td>
                            <td>Creator/Editor</td>
                            <td class="actions">Action</td>
                        </tr>
                        @foreach($categories as $category)
                            @include('loop-category', ['category' => $category , 'child' => 0])
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection