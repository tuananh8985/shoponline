@extends('user.master')
@section('description',"Day la trang home")
    @section('content')
        <div>
            <ul>
                <h1>{!!$cate->name!!}</h1>
                @foreach($new_cate as $item_new)
                <li>
                    <a class="prdocutname" href="{!!url('chi-tiet-tin-tuc',[$item_new->id,$item_new->alias])!!}">{!!$item_new->name!!}</a>
                </li>
                @endforeach
            </ul>
        </div>
    @endsection
