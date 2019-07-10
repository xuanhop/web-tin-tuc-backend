<tr>
    <td>{{$category->id}}</td>
    <td>
        {{$category->name}}
    </td>
    <td></td>
    <td></td>
    <td>{{$category->description}}</td>
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
@if($category->child)
    @php
        $child++;
    @endphp
    @foreach($category->child as $item)
        @include('loop-category', ['category' => $item , 'child' => $child])
    @endforeach
@endif
