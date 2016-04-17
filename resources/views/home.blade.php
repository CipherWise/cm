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
                            <a href="" style="margin-left:20px;">{{$character->first_name}} {{$character->last_name}}</a> - 
                            @foreach($character->classes as $class)
                                {{$class->pivot->level}} Level {{$character->race->name}} {{$class->name}}
                                @if ($character->classes->count()>1)
                                    /
                                @endif
                            @endforeach
                            <br /><br />
                        @endforeach
                    @else
                        You currently have no characters<br />
                        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                    @endif
                   
                    <a href="/character_creation"><button type="button" class="btn btn-primary-margin-top:30px"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Create Character</button></a>
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
                    @if (Auth::user()->campaigns->count())
                        @foreach(Auth::user()->campaigns as $campaign)
                            <a href="./campaign/{{$campaign->id}}" style="margin-left:20px;">{{$campaign->name}}</a>
                            <br /><br />
                        @endforeach
                    @else
                        You currently have no campaigns<br />
                        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                    @endif
                    
                    
                    <a href="/player_hud">Campaigns go here</a><br />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
