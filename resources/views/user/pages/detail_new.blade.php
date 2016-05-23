@extends('user.master')
@section('description',"Day la trang home")
    @section('content')
        <div class="span9">
            <div id="maincontainer">
                <div class="row">
                        <h1>{!!$new_detail->name!!}</h1>
                        <li>{!!$new_detail->description!!}</li>
                        <li>{!!$new_detail->content!!}</li>

                </div>
        </div>
        <div class="span9">
            <div id="maincontainer">
                <div class="row">
                    <h2>Tin Tức Liên Quan</h2>
                    <ul>
                        @foreach($new_same as $item)
                            <a href="{!!url('chi-tiet-tin-tuc',[$item->id,$item->alias])!!}"><li>{!!$item->name!!}</li></a>
                        @endforeach
                    </ul>
                </div>
        </div>


    @endsection
