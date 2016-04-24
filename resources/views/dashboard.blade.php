@extends('layouts.app')


@section('javascripts')
<script src="js/test.js" type="text/javascript"></script>
<script type="text/javascript">
    function testFunction(){
        console.log('this is also a test!');
    }
    testFunction();
</script>
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">My Characters</div>

                <div class="panel-body">
                   
                    @if (Auth::user()->characters->count())
                        @foreach(Auth::user()->characters as $character)
                        <a href="character-sheet/{{$character->id}}" style="margin-left:20px;">{{$character->first_name}} {{$character->last_name}}</a> - 
                            @foreach($character->classes as $class)
                                {{$class->pivot->level}} Level {{$character->race->name}} {{$class->name}}
                                @if ($character->classes->count()>1)
                                    /
                                @endif
                            @endforeach
                             - Weapons: 
                            @foreach($character->weapons as $weapon)
                                {{$weapon->name}}
                                @if ($character->weapons->count()>1)
                                    /
                                @endif
                            @endforeach
                            <?php $skill = App\Models\Skill::find(14); ?>
                            {{proper($skill->specialties->first()->name)}}
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
