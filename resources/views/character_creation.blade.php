@extends ('layouts.app')


@section ('content')


<!--Choose Class-->
                    
    
    
    <?php $classes = App\Models\CharacterClass::all();
                        foreach($classes as $class){?>
                        
                         <input class="btn btn-default" type="button" value="{{$class->name}}">
                        
                             <?php } ?>
                    




                   
                         
@endsection

