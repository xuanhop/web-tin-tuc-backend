<tr>
    <td>{{$category->id}}</td>
    <td>
        @if($child == 0)
            <i class="glyphicon glyphicon-level-up"></i>
        @endif
        @for($i = 0; $i< $child; $i++)
                &nbsp;&nbsp; <i class="glyphicon glyphicon-triangle-right"></i>
        @endfor
        {{$category->name}}
    </td>
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
