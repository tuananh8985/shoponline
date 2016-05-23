@extends('user.master')
@section('description',"Day la trang home")
    @section('content')
        <div class="span9">
            <div id="maincontainer">
                <div class="row">
                        <h1>{!!$data->name!!}</h1>
                        <li>{!!$data->description!!}</li>
                        <li>{!!$data->content!!}</li>

                </div>
        </div>
    @endsection
