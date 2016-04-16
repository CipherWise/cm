@extends('layouts.app')

@section('content')

<div class="container-fluid">
<div class="row">


<!--Picture of Character-->
 <div class="col-md-3 col-md-offset-1">
 <div class="panel panel-default">
       <div class="panel-heading">
    <h3 class="panel-title">Your Character</h3>
  </div>
  <div class="panel-body">
     
    <img src="images/image001.png" style="max-height: 300px" class="img-responsive center-block img-circle" alt="Responsive image">
     
  </div>
</div>
 </div>

<!--Name, Race, Diety, Age-->
 <div class="col-md-3">
 <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Character Deets</h3>
  </div>
  <div class="panel-body">
    Name, Race, Age Diety, ETC
  </div>
</div>
 </div>

<!--Classes and XP-->
 <div class="col-md-3">
 <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Classes and XP</h3>
  </div>
  <div class="panel-body">
    Character's Class(es) and XP (Plus track)
  </div>
</div>
 </div>

<!--End row-->
</div>
<div class="row"
<!--Ability Scores and Modifiers-->
 <div class="col-md-3 col-md-offset-1">
 <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Ability Scores</h3>
  </div>
  <div class="panel-body">
    With Modifiers
  </div>
</div>
 </div>

<!--Abilities (Class, Racial, Spell-Like, ETC)-->
 <div class="col-md-3">
 <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Abilities</h3>
  </div>
  <div class="panel-body">
   Class, Racial, Spell-Like, ETC
  </div>
</div>
 </div>

<!--Feats-->
 <div class="col-md-3">
 <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Feats</h3>
  </div>
  <div class="panel-body">
    Hey, man...you have Feats!
  </div>
</div>
 </div>

<!--End Row-->
</div>
<Div class="row">

<!--Skills-->
 <div class="col-md-3 col-md-offset-1">
 <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Skills</h3>
  </div>
  <div class="panel-body">
    Skills with Modifiers and junk
  </div>
</div>
 </div>

<!--Weapons-->
 <div class="col-md-3">
 <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Weapons</h3>
  </div>
  <div class="panel-body">
    Equipped and Stats and stuff
  </div>
</div>
 </div>

<!--Spells Prepared-->
 <div class="col-md-3">
 <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Spells Prepaired</h3>
  </div>
  <div class="panel-body">
    They're truly outrageous
  </div>
</div>
 </div>

<!--End Row-->
</div>
<div class="row">

<!--Equipment-->
 <div class="col-md-3 col-md-offset-1">
 <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Equipment</h3>
  </div>
  <div class="panel-body">
    What you got, fool?
  </div>
</div>
 </div>

<!--Animal Companions, Mounts, Familiars-->
 <div class="col-md-3">
 <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Animals</h3>
  </div>
  <div class="panel-body">
    Companions, Mounts, Familiars
  </div>
</div>
 </div>


<!--Actions-->
 <div class="col-md-3">
 <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Action</h3>
  </div>
  <div class="panel-body">
    What can you do? Punk...
  </div>
</div>
 </div>

<!--End Row-->
</div>

<div class="row">
  <div class="col-md-9 col-md-offset-1">
  <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Feed</h3>
  </div>
  <div class="panel-body">
    News Feed goes here
  </div>
  </div>  
  </div>
        
<!--End of Row-->    
</div>
    
    
    
<!--End of Container-->
</div>



@endsection
