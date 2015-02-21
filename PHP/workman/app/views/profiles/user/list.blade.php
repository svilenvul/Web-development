@extends('templates.default')

@section ('title')
<title>Search | CarRepair</title>
@stop

@section ('description')
<meta name='description' content="CarRepair is a place, where drivers can find auto mechanics, electricans and specialist. Find users, see their problems and make an offer.">
@stop

@section('content')
<p>   
    <span>Sort  users by:</span>
    <a href="#" class="float-right"> Name </a>
    <a href="#" class="float-right"> Email </a>
</p>
<section id='userlist'>
    <ul class=" list">
        @foreach ($users as $user)
        <a href="/{{{$resource}}}/{{{$user->UserName}}}" >
            <ul class="list">
                <div class="general-info">
                    <li>
                        <img src="{{{$user->Picture}}}">
                    </li>      
                    <li>   
                        <ul class="list">
                            <li><strong>User:</strong><span>{{{$user->UserName}}}</span></li>
                            <li><strong>First name:</strong><span>{{{$user->FirstName}}}</span></li>
                            <li><strong>Family name:</strong><span>{{{$user->FamilyName}}}</span></li>            
                        </ul>
                    </li>  

                    <li>
                        <ul class="list">
                            <li><strong>Email:</strong><span>{{{$user->Email}}}</span></li>
                            <li><strong>Age:</strong><span>{{{$user->Age}}}</span></li>    
                            <li><strong>Sex:</strong><span>{{{$user->Sex}}}</span></li>        
                        </ul>
                    </li>
                </div>
                <div class="cars">

                    @if(isset($allcars[$user->UserName]))
                    @foreach($allcars[$user->UserName] as $car)
                    <li>
                        <div class="car">
                            <div class="img-panel">
                                <img src="{{{$car->Image}}}" alt="...">
                            </div>
                            <ul class="info-panel list">
                                <li>
                                    <strong>Model:</strong>
                                    <span>{{{$car->Model}}} {{{$car->Year}}}</span>
                                </li>
                                
                                <li>
                                    <strong>Trademark:</strong>
                                    <span>{{{$car->Trademark}}}</span>
                                </li>
                                <li>
                                    <strong>EngineSize:</strong>
                                    <span>{{{$car->EngineSize}}}</span>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endforeach
                    @endif

                </div>
            </ul>
        </a>
        @endforeach
    </ul>
</section>
@stop