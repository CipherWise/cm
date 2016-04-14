@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">My Characters</div>

                <div class="panel-body">
                   
                    @if (Auth::user()->characters->count())
                    @foreach(Auth::user()->characters as $character)
                    <a href="" style="margin-left:20px;">{{$character->first_name}} {{$character->last_name}}</a>
                    @endforeach
                    
                   @else
                   You currently have no characters<br />
                   <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                   @endif
                   
                    <a href="/character_creator"><button type="button" class="btn btn-primary-margin-top:30px">Create Character</button></a>
                    
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
                    <a href="/player_hud">Campaigns go here</a><br />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
