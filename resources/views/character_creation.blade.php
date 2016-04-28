
@extends ('layouts.app')


@section ('javascripts')
<script src="js/characterCreation.js"></script>
@endsection

@section ('content')


<div class="container arizonia"><div class="row"><div class="col-lg-6 col-md-offset-3"><h1> Create New Character</h1></font-face></div></div></div><br />
<br />


<!--The Deets (Pen and Paper style)-->

<div class="container-fluid center-block">
<form class="form-inline">
  <div class="form-group">
    <label for="first_name">First Name:</label>
    <input type="text" class="form-control" id="first_name" placeholder="Trogar">
  </div>
  <div class="form-group">
    <label for="middle_name">Middle Name:</label>
    <input type="text" class="form-control" id="middle_name" placeholder="The">
  </div>
  <div class="form-group">
    <label for="last_name">Last Name:</label>
    <input type="text" class="form-control" id="last_name" placeholder="Barabarian">
  </div><br />
</form>
</div>
<div class="spacer10"></div>

<!--Choose Class (Start of accordion)-->

<div class="container-fluid" style="padding:10px">
<div class="row col-lg-6">

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Choose Class:
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
    Class Type:<br />
    <div class="btn-group" data-toggle="buttons">

<?php 
    $Types = App\Models\CharacterClass::types();
    foreach ($Types as $type) {?>
    <label class="btn btn-default classtype" onClick="chooseType('{{$type->type}}')">                 
    <input class="btn btn-default" type="radio" name="classType" id="{{$type->type}}" data-toggle="button" aria-pressed="false" autocomplete="off" value="{{$type->type}}">{{$type->type}}</label>  
          <?php } ?>
   </div>
     
        
    <br />
    <br />
        
   
<!--Core Classes-->

    <div id="coreClasses" style="display: none">
        <h4>Core Classes:</h4><br />
    <div class="btn-group" data-toggle="buttons">       
<?php
    $Classes = App\Models\CharacterClass::where("type","=","core")->get();
            
    foreach($Classes as $class){
        ?>
          
    <label class="btn btn-default charclass" onClick="chooseClass('{{$class->description}}')" data-container="body" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="{{$class->role}}">                  
    <input class="btn btn-default" type="radio" name="characterClass" id="{{$class->name}}" data-toggle="button" aria-pressed="false" autocomplete="off" value="{{$class->name}}">{{$class->name}}</label>  
    
      
    <?php } ?>
    </div>
    </div>
    
    
<!--Base Classes-->

<div id="baseClasses" style="display: none">
    <h4>Base Classes:</h4><br />
    <div class="btn-group" data-toggle="buttons">       
<?php
    $Classes = App\Models\CharacterClass::where("type","=","base")->get();
            
    foreach($Classes as $class){
        ?>
          
    <label class="btn btn-default charclass" onClick="chooseClass('{{$class->description}}')" data-container="body" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="{{$class->role}}">                  
    <input class="btn btn-default" type="radio" name="characterClass" id="{{$class->name}}" data-toggle="button" aria-pressed="false" autocomplete="off" value="{{$class->name}}">{{$class->name}}</label>  
    
      
    <?php } ?>
    </div>
</div>
    
    
<!--Alternate Classes-->

<div id="alternateClasses" style="display: none">
    <h4>Alternate Classes:</h4><br />
    <div class="btn-group" data-toggle="buttons">       
<?php
    $Classes = App\Models\CharacterClass::where("type","=","alternate")->get();
            
    foreach($Classes as $class){
        ?>
          
    <label class="btn btn-default charclass" onClick="chooseClass('{{$class->description}}')" data-container="body" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="{{$class->role}}">                  
    <input class="btn btn-default" type="radio" name="characterClass" id="{{$class->name}}" data-toggle="button" aria-pressed="false" autocomplete="off" value="{{$class->name}}">{{$class->name}}</label>  
    
      
    <?php } ?>
    </div>
    </div>
    
    
<!--Hybrid Classes-->

<div id="hybridClasses" style="display: none">
    <h4>Hybrid Classes:</h4><br />
    <div class="btn-group" data-toggle="buttons">       
<?php
    $Classes = App\Models\CharacterClass::where("type","=","hybrid")->get();
            
    foreach($Classes as $class){
        ?>
          
    <label class="btn btn-default charclass" onClick="chooseClass('{{$class->description}}')" data-container="body" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="{{$class->role}}">                  
    <input class="btn btn-default" type="radio" name="characterClass" id="{{$class->name}}" data-toggle="button" aria-pressed="false" autocomplete="off" value="{{$class->name}}">{{$class->name}}</label>  
    
      
    <?php } ?>
    </div>
</div>
    
    
<!--Prestige Classes-->

    <div id="prestigeClasses" style="display: none">
        <h4>Prestige Classes:</h4><br />
    <div class="btn-group" data-toggle="buttons">       
<?php
    $Classes = App\Models\CharacterClass::where("type","=","prestige")->get();
            
    foreach($Classes as $class){
        ?>
          
    <label class="btn btn-default charclass" onClick="chooseClass('{{$class->description}}')" data-container="body" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="{{$class->role}}">                  
    <input class="btn btn-default" type="radio" name="characterClass" id="{{$class->name}}" data-toggle="button" aria-pressed="false" autocomplete="off" value="{{$class->name}}">{{$class->name}}</label>  
    
      
    <?php } ?>
    </div>
    </div>
    
    
<!--NPC Classes-->
   
    <div id="npcClasses" style="display: none">
        <h4>Non Player-Character Classes:</h4><br />
    <div class="btn-group" data-toggle="buttons">       
<?php
    $Classes = App\Models\CharacterClass::where("type","=","npc")->get();
            
    foreach($Classes as $class){
        ?>
          
    <label class="btn btn-default charclass" onClick="chooseClass('{{$class->description}}')" data-container="body" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="{{$class->role}}">                  
    <input class="btn btn-default" type="radio" name="characterClass" id="{{$class->name}}" data-toggle="button" aria-pressed="false" autocomplete="off" value="{{$class->name}}">{{$class->name}}</label>  
    
      
    <?php } ?>
    </div>
    </div>
    
    
    <h5>Class: Description:</h5><br />
    <div id="classDescription"></div>
    
    
    
                            
      </div>
  </div>
  </div>
<!--Choose Race-->
                    
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Choose Race:
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
<div class="panel-body">
<div class="btn-group" data-toggle="buttons"> 
<?php $Races = App\Models\Race::all();
    foreach($Races as $Race){?>
    <label class="btn btn-default">                  
    <input class="btn btn-default" type="radio" name="characterRace" id="{{$Race->name}}" data-toggle="button" aria-pressed="false" autocomplete="off" value="{{$Race->name}}">{{$Race->name}}</label>  
    <?php } ?>
      </div>
    </div>
  </div>
</div>

<!--Determine Ability Scores-->
                    
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Determine Ability Scores:
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-8">
          
          <table class="table table-striped table-condensed table-bordered">
              <tr>
              <td>Ability:</td>
              <td>Score:</td>
              <td>Modifier:</td>
              
              </tr>
              <tr>
              <td>Strength:</td>
              <td><div id="strength"></div></td>
              <td>Placeholder:</td>
              </tr>
              <tr>
              <td>Dexterity:</td>
              <td><div id="dexterity"></div></td>
              <td>Placeholder:</td>
              </tr>
              <tr>
              <td>Constitution:</td>
              <td><div id="constitution"></div></td>
              <td>Placeholder:</td>
              </tr>
              <tr>
              <td>Intelligence:</td>
              <td><div id = "intelligence"></div></td>
              <td>Placeholder:</td>
              </tr>
              <tr>
              <td>Wisdom:</td>
              <td><div id="wisdom"></div></td>
              <td>Placeholder:</td>
              </tr>
              <tr>
              <td>Charisma:</td>
              <td><div id="charisma"></div></td>
              <td>Placeholder:</td>
              </tr>
              
          </table>
              </div>
              
              
                   <div class="col-md-4">
                       Choose Method to Determine Ability Scores:<br/>
                       <button type="button" class="btn btn-primary" onClick = "classicDice()">Roll!</button>
                   
                  
                  
                       Choose Method to Determine Ability Scores:<br/>
                       <button type="button" class="btn btn-primary" onClick = "removeLowest()">Roll!</button>
                   </div>
                  
      </div>
      </div>
    </div>
  </div>
</div>






<!--Determine Skill Ranks-->
                    
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingFour">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          Determine Skill Ranks:
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>

<!--Choose Feats-->
                    
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingFive">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
          Choose Feats:
        </a>
      </h4>
    </div>
    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>

<!--Choose Spells-->
                    
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingSix">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
          Choose Spells:
        </a>
      </h4>
    </div>
    <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>
</div>
</div>  
<html>       
    <div class="hidden">  
    <div id="chooseType">
    <div class="btn-group" data-toggle="buttons">       
<?php use App\Models\CharacterClass;
    $Classes = App\Models\CharacterClass::all();
    foreach($Classes as $class){?>
          
    <label class="btn btn-default charclass" onClick="chooseClass('{{$class->description}}')" data-container="body" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="{{$class->role}}">                  
    <input class="btn btn-default" type="radio" name="characterClass" id="{{$class->name}}" data-toggle="button" aria-pressed="false" autocomplete="off" value="{{$class->name}}">{{$class->name}}</label>  
      
        <?php } ?>
        
    </div>
    </div>
    </div>
</html>


               


                        @endsection
          