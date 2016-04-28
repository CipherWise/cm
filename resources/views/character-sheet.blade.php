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
<div id="container">
	
    <div id="inner_container">
    <table width="90%" border="0" cellspacing="0" cellpadding="0" id="arrangement">
        <tr>
            <td colspan="3">
                <img name="crusade_master_logo" id="logo" alt="CRUSADE MASTER" src="./images/crusade_master_logo.png" />
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
                            <td>skill</td>
                            <td><span class="stat_field_mlabel">total</span></td>
                            <td><span class="stat_field_mlabel">ranks</span></td>
                            <td><span class="stat_field_mlabel">ability mod</span></td>
                        </tr>
                    	<?php foreach($character->skills as $skill){
                                // Calculate the skill total
                                $total = 0;
                                if((in_array($skill->id', $class_skills)||in_array($cskrow['skill_id'].'-'.$cskrow['specialty_id'], $class_skills))&&$cskrow['ranks']>0){
                                        $total += 2;
                                }
                                $total += $cskrow['ranks'];
                                $total += $mods[$row[$skills[$cskrow['skill_id']]['ability_modifier']]];

                                echo "<tr><td valign=\"middle\" align=\"right\"><label class=\"\" title=\""
                                        .($cskrow['specialty_id']!=NULL?$specialties[$cskrow['specialty_id']]['description']:$skills[$cskrow['skill_id']]['description'])
                                        ."\" for=\"".$skills[$cskrow['skill_id']]['skill']."\">"
                                        .proper($skills[$cskrow['skill_id']]['skill']).($cskrow['specialty_id']!=NULL?' ('.$specialties[$cskrow['specialty_id']]['specialty'].')':'')
                                        .(in_array($cskrow['skill_id'], $class_skills)?'*':'')."</label></td>";
                                echo "<td>".$total.($skills[$cskrow['skill_id']]['armor_check_penalty']==1?'/'.($total-$armor_check_penalty):'')."</td>";
                                echo "<td>".$cskrow['ranks']."</td>";
                                echo "<td>".proper(substr($skills[$cskrow['skill_id']]['ability_modifier'],0,3))." ".mod_prefix($mods[$row[$skills[$cskrow['skill_id']]['ability_modifier']]])."</td>";
                         } ?>
                	</tbody>
                </table>
            </td>
        </tr>
        
        <!-- UNFINISHED GOES HERE -->
        
        </tbody>
        </table>
    </form>
</div>
@endsection





@section('unfinished')

<?php /*

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
            
            <tr><td colspan="2">
                <div id="weapons_div">
                    <table width="90%">
                    <tbody>
                        <tr>
                            <td><label for="name">Weapon</label></td>
                            <td><label for="use_type">Use Type</label></td>
                            <td><label for="value">Value</label></td>
                            <td><label for="value_uom">Value Uom</label></td>
                            <td><label for="damage_small">Damage Small</label></td>
                            <td><label for="damage_medium">Damage Medium</label></td>
                            <td><label for="damage_modifier">Damage Modifier</label></td>
                            <td><label for="critical">Critical</label></td>
                            <td><label for="critical_multiplier">Critical Multiplier</label></td>
                            <td><label for="range">Range</label></td>
                            <td><label for="max_range_increments">Max Range Increments</label></td>
                            <td><label for="weight">Weight</label></td>
                            <td><label for="damage_type">Damage Type</label></td>
                            <td><label for="lethal">Lethal</label></td>
                            <td><label for="special">Special</label></td>

                        </tr>
                    
                    
                    <?php //while($wrow = mysqli_fetch_assoc($wrs)){ ?>
                        <tr>
                            <td>{{(in_array($wrow['id'], $prof_ids)?'P ':'')}}
                            <input name="id" type="hidden" required="true" value="{{ $wrow['id}}" />
                            <input name="name" type="text" value="{{$wrow['name}}" size="35"/></td>
                            <td><input name="use_type" type="text" value="{{$wrow['use_type}}" /></td>
                            <td><input name="value" type="text" value="{{$wrow['value}}" /></td>
                            <td><input name="value_uom" type="text" value="{{$wrow['value_uom}}" /></td>
                            <td><input name="damage_small" type="text" value="{{$wrow['damage_small}}" /></td>
                            <td><input name="damage_medium" type="text" value="{{$wrow['damage_medium}}" /></td>
                            <td><input name="damage_modifier" type="text" value="{{"mod_fix"}}" /></td>
                            <td><input name="critical" type="text" value="{{$wrow['critical}}" /></td>
                            <td><input name="critical_multiplier" type="text" value="{{$wrow['critical_multiplier}}" /></td>
                            <td><input name="range" type="text" value="{{$wrow['range}}" /></td>
                            <td><input name="max_range_increments" type="text" value="{{$wrow['max_range_increments}}" /></td>
                            <td><input name="weight" type="text" value="{{$wrow['weight}}" /></td>
                            <td><input name="damage_type" type="text" value="{{$wrow['damage_type}}" /></td>
                            <td><input name="lethal" type="text" value="{{$wrow['lethal}}" /></td>
                            <td><input name="special" type="text" value="{{$wrow['special}}" /></td>
                            
                        </tr>
                     <?php //} ?>
                    </tbody>
                    </table>
                </div>
            </td></tr>
            
        </tbody>
    </table>
    </div>
</div>






<div id="class_info" class="info_view" style="display:none;">
<span class="close_info" onclick="toggleInfoView('class_info');"><i class="glyphicon glyphicon-remove-circle"></i></span>
<table class="info_view_table">
    <tbody>
        
        <tr><td rowspan="10" style="width: 35%;text-align:center;">IMAGE</td>
        <td class="info_view_header">
        <input name="id" type="hidden" required="true" value="{{$class['id}}" />
        <label for="class">Class:</label>
        <span>{{$class['class}}</span></td></tr>
        
        <tr><td colspan="2">{{$class['description}}</td></tr>
        
        <tr><td colspan="2"><label for="role">Role:</label>
        {{$class['role}}</td></tr>
        
        <tr><td><label for="type">Type:</label>{{$class['type}}</td></tr>
        
        <tr><td><label for="hit_dice">Hit Dice:</label> {{$class['hit_dice}}</td></tr>
        
        <tr><td><label for="starting_wealth">Starting Wealth:</label> {{$class['starting_wealth}}</td></tr>
        
        <tr><td><label for="alignment">Alignment:</label> {{$class['alignment}}</td></tr>
        
        <tr><td><label for="skill_ranks">Skill Ranks:</label> {{$class['skill_ranks}}</td></tr>
        
        <tr><td><label for="skills">Skills:</label> {{$class['skills}}</td></tr>
        
        <tr><td><?php 
			echo output_field(false, $class_fi, 'parent_class_ids', 'label');
        	echo output_field($class, $class_fi, 'parent_class_ids')}}</td></tr>
        <tr><td><?php 
			echo output_field(false, $class_fi, 'required_base_attack', 'label');
        	echo output_field($class, $class_fi, 'required_base_attack')}}</td></tr>
        <tr><td><?php 
			echo output_field(false, $class_fi, 'required_feat_ids', 'label');
        	echo output_field($class, $class_fi, 'required_feat_ids')}}</td></tr>
        <tr><td><?php 
			echo output_field(false, $class_fi, 'required_spells', 'label');
        	echo output_field($class, $class_fi, 'required_spells')}}</td></tr>
        <tr><td><?php 
			echo output_field(false, $class_fi, 'required_skills', 'label');
        	echo output_field($class, $class_fi, 'required_skills')}}</td></tr>
        <tr><td><?php 
			echo output_field(false, $class_fi, 'required_special', 'label');
        	echo output_field($class, $class_fi, 'required_special')}}
        </td></tr>
	</tbody>
</table>
        	
            
    <table class="table_view">
        <tbody>
            <tr>
            <th><label for="level">Level</label></th>
            <th><label for="base_attack_bonus">Base Attack Bonus</label></th>
            <th><label for="fort_save">Fort Save</label></th>
            <th><label for="reflex_save">Reflex Save</label></th>
            <th><label for="will_save">Will Save</label></th>
            <th><label for="special">Special</label></th>
            <?php
                echo output_field(false, $clevel_fi, 'flurry_of_blows_attack_bonus', 'th'); 
                echo output_field(false, $clevel_fi, 'unarmed_damage', 'th'); 
                echo output_field(false, $clevel_fi, 'armor_class_bonus', 'th'); 
                echo output_field(false, $clevel_fi, 'fast_movement', 'th')}}
            
            <?php if(count($cspells)>0){ 
                    echo output_field(false, $cspells_fi, 'spells_per_day_0', 'th');
                    echo output_field(false, $cspells_fi, 'spells_per_day_1st', 'th');
                    echo output_field(false, $cspells_fi, 'spells_per_day_2nd', 'th');
                    echo output_field(false, $cspells_fi, 'spells_per_day_3rd', 'th');
                    echo output_field(false, $cspells_fi, 'spells_per_day_4th', 'th');
                    echo output_field(false, $cspells_fi, 'spells_per_day_5th', 'th');
                    echo output_field(false, $cspells_fi, 'spells_per_day_6th', 'th');
                    echo output_field(false, $cspells_fi, 'spells_per_day_7th', 'th');
                    echo output_field(false, $cspells_fi, 'spells_per_day_8th', 'th');
                    echo output_field(false, $cspells_fi, 'spells_per_day_9th', 'th');
                    echo output_field(false, $cspells_fi, 'spells_per_day', 'th');
                 } ?>
            </tr>
            
            <?php while($clevel = mysqli_fetch_assoc($clevel_rs)){ ?>
                <tr><td>{{$clevel['level}}</td>
                <td>{{mod_prefix($clevel['base_attack_bonus'])}}</td>
                <td>{{$clevel['fort_save}}</td>
                <td>{{$clevel['reflex_save}}</td>
                <td>{{$clevel['will_save}}</td>
                <td>{{$clevel['special}}</td>
                <?php
                    echo output_field($clevel, $clevel_fi, 'flurry_of_blows_attack_bonus', 'td', true); 
                    echo output_field($clevel, $clevel_fi, 'unarmed_damage', 'td'); 
                    echo output_field($clevel, $clevel_fi, 'armor_class_bonus', 'td', true); 
                    echo output_field($clevel, $clevel_fi, 'fast_movement', 'td')}}
                
                <?php if(count($cspells)){ 
                    echo output_field($cspells[$clevel['level']], $cspells_fi, 'spells_per_day_0', 'td');
                    echo output_field($cspells[$clevel['level']], $cspells_fi, 'spells_per_day_1st', 'td');
                    echo output_field($cspells[$clevel['level']], $cspells_fi, 'spells_per_day_2nd', 'td');
                    echo output_field($cspells[$clevel['level']], $cspells_fi, 'spells_per_day_3rd', 'td');
                    echo output_field($cspells[$clevel['level']], $cspells_fi, 'spells_per_day_4th', 'td');
                    echo output_field($cspells[$clevel['level']], $cspells_fi, 'spells_per_day_5th', 'td');
                    echo output_field($cspells[$clevel['level']], $cspells_fi, 'spells_per_day_6th', 'td');
                    echo output_field($cspells[$clevel['level']], $cspells_fi, 'spells_per_day_7th', 'td');
                    echo output_field($cspells[$clevel['level']], $cspells_fi, 'spells_per_day_8th', 'td');
                    echo output_field($cspells[$clevel['level']], $cspells_fi, 'spells_per_day_9th', 'td');
                    echo output_field($cspells[$clevel['level']], $cspells_fi, 'spells_per_day', 'td');
                
                 } ?>
                    
                </tr>
             <?php } ?>
             
        </tbody>
    </table>
</div>
<div id="race_info" class="info_view" style="display:none;">
<span class="close_info" onclick="toggleInfoView('race_info');"><i class="glyphicon glyphicon-remove-circle"></i></span>
    <table class="info_view_table">
        <tbody>
            
            <tr><td rowspan="10" style="width: 35%;text-align:center;">IMAGE</td>
            <td class="info_view_header">
            <input name="id" type="hidden" required="true" value="{{$race['id}}" />
            <label for="race">Race:</label>
            <span>{{$race['race}}</span></td></tr>
            
            <tr><th><label for="ability_bonus">Ability Bonus:</label></th>
            <td><input name="ability_bonus" type="text" value="{{$race['ability_bonus}}" /></td></tr>
            
            <tr><th><label for="ability_penalty">Ability Penalty:</label></th>
            <td><input name="ability_penalty" type="text" value="{{$race['ability_penalty}}" /></td></tr>
            
            <tr><th><label for="size">Size:</label></th>
            <td><input name="size" type="text" value="{{$race['size}}" /></td></tr>
            
            <tr><th><label for="type">Type:</label></th>
            <td><input name="type" type="text" value="{{$race['type}}" /></td></tr>
            
            <tr><th><label for="subtype">Subtype:</label></th>
            <td><input name="subtype" type="text" value="{{$race['subtype}}" /></td></tr>
            
            <tr><th><label for="speed">Speed:</label></th>
            <td><input name="speed" type="text" value="{{$race['speed}}" /></td></tr>
            
            <tr><th><label for="starting_languages">Starting Languages:</label></th>
            <td><input name="starting_languages" type="text" value="{{$race['starting_languages}}" /></td></tr>
            
            <tr><th><label for="senses">Senses:</label></th>
            <td><input name="senses" type="text" value="{{$race['senses}}" /></td></tr>
            
            <tr><th><label for="defensive_traits">Defensive Traits:</label></th>
            <td><input name="defensive_traits" type="text" value="{{$race['defensive_traits}}" /></td></tr>
            
            <tr><th><label for="offensive_traits">Offensive Traits:</label></th>
            <td><input name="offensive_traits" type="text" value="{{$race['offensive_traits}}" /></td></tr>
            
            <tr><th><label for="skill_bonus">Skill Bonus:</label></th>
            <td><input name="skill_bonus" type="text" value="{{$race['skill_bonus}}" /></td></tr>
            
            <tr><th><label for="bonus_feats">Bonus Feats:</label></th>
            <td><input name="bonus_feats" type="text" value="{{$race['bonus_feats}}" /></td></tr>
            
            <tr><th><label for="special_abilities">Special Abilities:</label></th>
            <td><textarea name="special_abilities">{{$race['special_abilities}}</textarea></td></tr>
            
            <tr><th><label for="race_points">Race Points:</label></th>
            <td><input name="race_points" type="text" value="{{$race['race_points}}" /></td></tr>
            
            <tr><th><label for="resistences">Resistences:</label></th>
            <td><textarea name="resistences">{{$race['resistences}}</textarea></td></tr>
            
            <tr><th><label for="weaknesses">Weaknesses:</label></th>
            <td><textarea name="weaknesses">{{$race['weaknesses}}</textarea></td></tr>
        </tbody>
    </table>
</div>


<div id="player_info" class="info_view" style="display:none;">
<span class="close_info" onclick="toggleInfoView('player_info');"><i class="glyphicon glyphicon-remove-circle"></i></span>
    <form name="players" method="post" action="">
        <table cellpadding="0" cellspacing="0">
            <tbody>
                <tr><th><label for="id">Id</label></th>
                <td><input name="id" type="text" required="true" value="{{$player['id}}" /></td></tr>
                
                <tr><th><label for="first_name">First Name</label></th>
                <td><input name="first_name" type="text" value="{{$player['first_name}}" readonly="readonly" /></td></tr>
                
                <tr><th><label for="last_name">Last Name</label></th>
                <td><input name="last_name" type="text" value="{{$player['last_name}}" readonly="readonly" /></td></tr>
                
                <tr><th><label for="email">Email</label></th>
                <td><input name="email" type="text" value="{{$player['email}}" /></td></tr>
                
                <tr><th><label for="phone">Phone</label></th>
                <td><input name="phone" type="text" value="{{$player['phone}}" /></td></tr>
                
                <tr><th><label for="manual_dice">Manual Dice</label></th>
                <td><input name="manual_dice" type="text" required="true" value="{{$player['manual_dice}}" /></td></tr>

 */ ?>
@endsection