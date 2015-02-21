@extends('templates.default')

@section ('title')
<title>Specialist | CarRepair</title>
@stop

@section ('description')
<meta name='description' content="CarRepair is a place, where drivers can find auto mechanics, electricans and specialist. Find top specialist for brakes, tires, engine, car paint, customizing and more at the best price.">
@stop

@section('content')
<p>   
    <span>Sort  workmans by:</span>
    <a href="#" class="float-right"> Name </a>
    <a href="#" class="float-right"> Email </a>
    <a href="#" class="float-right"> Profession </a>
    <a href="#" class="float-right"> Payment </a>

</p>
<section id="workmanlist">
    <ul class=" list">
        @foreach ($users as $user)
        <a href="/{{{$resource}}}/{{{$user->UserName}}}" >
            <ul class="list">
                <div class="general-info">
                    <li>
                        <img src="{{{$user->user->Picture}}}">
                    </li>      
                    <li>   
                        <ul class="list">
                            <li><strong>User:</strong><span>{{{$user->UserName}}}</span></li>
                            <li><strong>First name:</strong><span>{{{$user->user->FirstName}}}</span></li>
                            <li><strong>Family name:</strong><span>{{{$user->user->FamilyName}}}</span></li>            
                        </ul>
                    </li>  

                    <li>
                        <ul class="list">
                            <li><strong>Email:</strong><span>{{{$user->user->Email}}}</span></li>
                            <li><strong>Age:</strong><span>{{{$user->user->Age}}}</span></li>    
                            <li><strong>Sex:</strong><span>{{{$user->user->Sex}}}</span></li>        
                        </ul>
                    </li>
                </div>
                <div class="cars">
                    <li >  
                        <ul class="list">
                            <li><strong>Profession:</strong><span>{{{$user->Profession}}}</span></li>
                            <li><strong>Payment:</strong><span>{{{$user->Payment}}}</span></li>
                        </ul>
                    </li>
                    <li >
                        <ul class="list">
                            <li><strong>Votes</strong></li>                        
                            <li>
                                @if(isset($votes[$user->UserName]))                            
                                <p><strong>{{{$votes[$user->UserName]}}}</strong><span> from 5 </span></p>
                                @for($i = 1;$i < $votes[$user->UserName]; $i++)
                                <span class="glyphicon glyphicon-star"></span>
                                @endfor
                                @for($l = $i;$l <= 5; $l++)
                                <span class="glyphicon glyphicon-star-empty"></span>
                                @endfor    

                                @else
                                <p>{{{'No votes until now'}}}</p>
                                @for($l = 1;$l <= 5; $l++)
                                <span class="glyphicon glyphicon-star-empty"></span>
                                @endfor  
                                @endif
                            </li>        
                        </ul>
                    </li>
                </div>
            </ul>
        </a>
        @endforeach
    </ul>
</section>
@stop