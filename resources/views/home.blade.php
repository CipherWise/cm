@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">My Characters</div>

                <div class="panel-body">
                    @foreach(Auth::user()->characters as $character)
                    <a href="" style="margin-left:20px;">{{$character->first_name}} {{$character->last_name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">My Campaigns</div>

                <div class="panel-body">
                    Campaigns go here
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
