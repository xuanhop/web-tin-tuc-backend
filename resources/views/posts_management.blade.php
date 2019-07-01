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
                                <th scope="row" id="post_id">{{$post->id}}</th>
                                <td>{{$post->title}}</td>
                                <td>
                                    <select id="dropdown" class="change_status" data="{{$post->id}}">
                                        @if($post->status > 0)
                                            <option value="1" selected>Active</option>
                                            <option value="-1">Inactive</option>
                                        @else
                                            <option value="-1" selected>Inactive</option>
                                            <option value="1">Active</option>
                                        @endif
                                    </select>
                                </td>

                                <td>{{$post->main_image}}</td>
                                <td>{{$post->created_at}}</td>
                                <td>{{$post->updated_at}}</td>
                                <td>{{$post->category->name}}</td>
                                @foreach($post->meta as $content)
                                    <td>{{$content->data}}</td>
                                @endforeach

                                <td>
                                    <a href="{{asset("posts/edit/$post->id")}}" class="btn btn-primary">Edit</a>
                                </td>
                            </tr>

                        @endforeach
                        {{$posts}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- container -->
@endsection
@push('scripts')
    <script>

        $(".change_status").change(function () {
            let status = $(this).children("option:selected").val();
            let id = $(this).attr("data");
            $.ajax({
                type: "POST",
                url: '/posts/delete',
                data: {id: id, status: status, "_token": "{{ csrf_token() }}"},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (result) {

                }
            })
        });
    </script>
@endpush
