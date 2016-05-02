@extends('layouts.app')


@section('content')
<div id="cs-container">
	
    <div id="inner_container">
    <table width="90%" border="0" cellspacing="0" cellpadding="0" id="arrangement">
        <tr>
            <td colspan="3">
                <img name="crusade_master_logo" id="logo" alt="CRUSADE MASTER" src="{{asset('/images/crusade_master_logo.png')}}" />
                <input name="id" type="hidden" required="true" value="{{$character->id}}" readonly="readonly" />
                <input name="player_id" type="hidden" value="{{$character->player->id}}" readonly="readonly" /><br />
                <span id="title">Character Record Sheet</span>
            </td>
            <td colspan="3" style="text-align:left;">
                <div class="info_field_div">
                    <input name="nick_name" type="text" value="{{$character->first_name.' '.$character->middle_name.' '.$character->last_name.' ('.$character->nick_name.')'}}" class="info_field_line" style="width: 380px;" />
                    <label class="info_field_label" for="nick_name">Character Name</label>
                </div>
                <div class="info_field_div"> 
                    <input name="player" type="text" value="{{$character->player->first_name.' '.$character->player->last_name}}" class="info_field_line" style="width:275px;" />
                    <label class="info_field_label" for="player" onclick="toggleInfoView('player_info');">Player Name <i class="glyphicon glyphicon-info-sign"></i></label>
                </div><br />
                <div class="info_field_div">
                    <input name="alignment" type="text" value="{{$character->alignment}}" class="info_field_line" style="width: 70px;text-align:center;"/> 
                    <label class="info_field_label" for="alignment">Align</label>
                </div>
                <div class="info_field_div">   
                    <input name="race" type="text" value="{{$character->race->name}}" class="info_field_line" style="text-align:left;width:215px;" />
                    <label class="info_field_label" for="race" onclick="toggleInfoView('race_info');">Race <i class="glyphicon glyphicon-info-sign"></i></label>
                </div>
                
                @foreach($character->classes as $class)
                    <div class="info_field_div">   
                        <input name="class_{{$class->id}}" type="text" value="{{$class->name}}" class="info_field_line" style="text-align: left;width:216px;" />
                        <label class="info_field_label" for="class" onclick="toggleInfoView('class_info');">Class <i class="glyphicon glyphicon-info-sign"></i></label>
                    </div>
                    <div class="info_field_div">
                        <input name="level_{{$class->id}}" type="text" value="{{ordinal_suffix($class->pivot->level)}} Level" class="info_field_line" style="width: 140px;text-align:center;"/> 
                        <label class="info_field_label" for="level">Level</label>
                    </div>
                    <div class="info_field_div">
                        <input name="xp_{{$class->id}}" type="text" value="{{$class->pivot->xp}}" class="info_field_line" style="width: 130px;text-align:center;"/> 
                        <label class="info_field_label" for="experience_points">XP</label>
                    </div>
                @endforeach
                
                <br />
                <div class="info_field_div">
                    <input name="age" type="text" value="{{$character->age}}" class="info_field_line" style="width: 80px;text-align:center;"/> 
                    <label class="info_field_label" for="age">Age</label>
                </div>
                <div class="info_field_div">
                    <input name="eye_color" type="text" value="{{$character->eye_color}}" class="info_field_line" style="width: 140px;text-align:center;"/> 
                    <label class="info_field_label" for="eye_color">Eyes</label>
                </div>
                <div class="info_field_div">
                    <input name="hair_color" type="text" value="{{$character->hair_color}}" class="info_field_line" style="width: 140px;text-align:center;"/> 
                    <label class="info_field_label" for="hair_color">Hair</label>
                </div>
                <div class="info_field_div">
                    <input name="height" type="text" value="{{stripslashes($character->height)}}" class="info_field_line" style="width: 120px;text-align:center;"/> 
                    <label class="info_field_label" for="height">Height</label>
                </div>
                <div class="info_field_div">
                    <input name="weight" type="text" value="{{$character->weight}}" class="info_field_line" style="width: 75px;text-align:center;"/> 
                    <label class="info_field_label" for="weight">Weight</label>
                </div>
                <div class="info_field_div">
                    <input name="size" type="text" value="{{$character->size}}" class="info_field_line" style="width: 72px;text-align:center;"/> 
                    <label class="info_field_label" for="size">Size</label>
                </div><br />
                <div class="info_field_div">
                    <input name="diety" type="text" value="{{$character->diety}}" class="info_field_line" style="width: 233px;"/> 
                    <label class="info_field_label" for="diety">Diety</label>
                </div>
                <div class="info_field_div">
                    <input name="homeland" type="text" value="{{$character->homeland}}" class="info_field_line" style="width: 280px;"/> 
                    <label class="info_field_label" for="homeland">Homeland</label>
                </div>
                
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding:15px;">
                <table>
                    <tbody>
                        <tr>
                            <td>&nbsp;</td>
                            <td><span class="stat_field_mlabel">score</span></td>
                            <td><span class="stat_field_mlabel">modifier</span></td>
                        </tr>
                    
                        <tr><td valign="middle"><label class="stat_field_label" for="strength">Strength</label></td>
                        <td><input name="strength" type="text" value="{{$character->strength}}" class="stat_field_lg" /></td>
                        <td><input name="strength_modifier" type="text" data-value="{{$abilities->modifier($character->strength)->mod}}" value="{{mod_prefix($abilities->modifier($character->strength)->mod)}}" class="stat_field_lg" /></td></tr>
                        
                        <tr><td valign="middle"><label class="stat_field_label" for="dexterity">Dexterity</label></td>
                        <td><input name="dexterity" type="text" value="{{$character->dexterity}}" class="stat_field_lg" /></td>
                        <td><input name="dexterity_modifier" type="text" data-value="{{$abilities->modifier($character->dexterity)->mod}}" value="{{mod_prefix($abilities->modifier($character->dexterity)->mod)}}" class="stat_field_lg" /></td></tr>
                        
                        <tr><td valign="middle"><label class="stat_field_label" for="constitution">Constitution</label></td>
                        <td><input name="constitution" type="text" value="{{$character->constitution}}" class="stat_field_lg" /></td>
                        <td><input name="constitution_modifier" type="text" data-value="{{$abilities->modifier($character->constitution)->mod}}" value="{{mod_prefix($abilities->modifier($character->constitution)->mod)}}" class="stat_field_lg" /></td></tr>
                        
                        <tr><td valign="middle"><label class="stat_field_label" for="intelligence">Intelligence</label></td>
                        <td><input name="intelligence" type="text" value="{{$character->intelligence}}" class="stat_field_lg" /></td>
                        <td><input name="intelligence_modifier" type="text" data-value="{{$abilities->modifier($character->intelligence)->mod}}" value="{{mod_prefix($abilities->modifier($character->intelligence)->mod)}}" class="stat_field_lg" /></td></tr>
                        
                        <tr><td valign="middle"><label class="stat_field_label" for="wisdom">Wisdom</label></td>
                        <td><input name="wisdom" type="text" value="{{$character->wisdom}}" class="stat_field_lg" /></td>
                        <td><input name="wisdom_modifier" type="text" data-value="{{$abilities->modifier($character->wisdom)->mod}}" value="{{mod_prefix($abilities->modifier($character->wisdom)->mod)}}" class="stat_field_lg" /></td></tr>
                        
                        <tr><td valign="middle"><label class="stat_field_label" for="charisma">Charisma</label></td>
                        <td><input name="charisma" type="text" value="{{$character->charisma}}" class="stat_field_lg" /></td>
                        <td><input name="charisma_modifier" type="text" data-value="{{$abilities->modifier($character->charisma)->mod}}" value="{{mod_prefix($abilities->modifier($character->charisma)->mod)}}" class="stat_field_lg" /></td></tr>
                    </tbody>
                </table>
            </td>
            <td colspan="2">
                <div class="info_field_div"><label for="hit_points">Hit Points</label>
                <input name="hit_points" type="text" value="{{$character->hit_points}}" class="info_field_line" /></div>
            </td>
            <td>&nbsp;</td>
            <td rowspan="2">
            
                <table>
                    <tbody>
                        <tr>
                            <td>Skill</td>
                            <td><span class="stat_field_mlabel">Score</span></td>
                            <td><span class="stat_field_mlabel">Ranks</span></td>
                            <td><span class="stat_field_mlabel">Ability mod</span></td>
                            <td><span class="stat_field_mlabel">Other mod</span></td>
                        </tr>
                    	@foreach($character->skills as $skill)
                        <tr>
                            <td>{{($skill->class_skill?'*':'')}}{{$skill->name}}{{($skill->specialty==null?'':'('.$skill->specialty->name.')')}}</td>
                            <td><input name="skill_score_{{$skill->id}}" id="skill_score_{{$skill->id}}" value="{{$skill->score}}" class="info_field_line" size="8" /></td>
                            <td><input name="skill_ranks_{{$skill->id}}" id="skill_ranks_{{$skill->id}}" value="{{$skill->ranks}}" class="info_field_line" size="8" /></td>
                            <td><input name="skill_abilitymod_{{$skill->id}}" id="skill_abilitymod_{{$skill->id}}" value="{{$skill->ability_modifier}}" class="info_field_line" size="8" /></td>
                            <td><input name="skill_othermods_{{$skill->id}}" id="skill_othermods_{{$skill->id}}" value="{{$skill->mods}}" class="info_field_line" size="8" /></td>
                        </tr>
                        
                        @endforeach
                	</tbody>
                </table>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <strong>*Denotes Class Skills</strong>
            </td>
        </tr>
        
        <tr>
            <td colspan="2">
                <table cellpadding="0" cellspacing="0">
                    <tbody>
                    
                        <tr><td><label class="stat_field_label" for="base_save_fortitude">Fortitude</label></td>
                        <td><input name="base_save_fortitude" type="text" value="{{$character->base_save_fortitude}}" class="stat_field_lg" /></td></tr>
                        
                        <tr><td><label class="stat_field_label" for="base_save_reflex">Reflex</label></td>
                        <td><input name="base_save_reflex" type="text" value="{{$character->base_save_reflex}}" class="stat_field_lg" /></td></tr>
                        
                        <tr><td><label class="stat_field_label" for="base_save_will">Will</label></td>
                        <td><input name="base_save_will" type="text" value="{{$character->base_save_will}}" class="stat_field_lg" /></td></tr></td>
                    </tbody>
                 </table>
             </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        </tbody>
    </table>
    <table cellpadding="0" cellspacing="0">
        <tbody>
        
            <tr><td><div class="info_field_div"><label for="walk">Walk</label>
            <input name="walk" type="text" value="{{$character->walk}}" class="info_field_line" /></div></td></tr>
            
            <tr><td><div class="info_field_div"><label for="run_multiplier">Run Multiplier</label>
            <input name="run_multiplier" type="text" value="{{$character->run_multiplier}}" class="info_field_line" /></div></td></tr>
            
            <tr><td><div class="info_field_div"><label for="fly">Fly</label>
            <input name="fly" type="text" value="{{$character->fly}}" class="info_field_line" /></div></td></tr>
            
            <tr><td><div class="info_field_div"><label for="swim">Swim</label>
            <input name="swim" type="text" value="{{$character->swim}}" class="info_field_line" /></div></td></tr>
            
            <tr><td><div class="info_field_div"><label for="climb">Climb</label>
            <input name="climb" type="text" value="{{$character->climb}}" class="info_field_line" /></div></td></tr>
            
            <tr><td><div class="info_field_div"><label for="languages">Languages</label></td>
            <td><textarea name="languages">{{$character->languages}}</textarea></div></td></tr>
        <!-- UNFINISHED GOES HERE -->
        </table>
    </form>
</div>
@endsection