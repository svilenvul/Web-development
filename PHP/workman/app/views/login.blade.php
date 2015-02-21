@extends ('templates.default')

@section ('title')

<title>Login | CarRepair</title>
@stop

@section ('description')
<meta name='description' content="CarRepair is a place, where drivers can find auto mechanics, electricans and specialist. Login to see all users.">
@stop

@section('content')
<section id="login">
    {{Form::open(array("url"=>"/login"))}}
    <div>
        <p class="error">{{{$message}}}</p>
    </div>
    <div>    
        {{Form::label('username','User Name')}}
        {{Form::text('username',null,array('autofocus '=>true))}}
    </div>
    <div>    
        {{Form::label('password','Password')}}
        {{Form::password('password')}}
    </div>
    <div>    

        {{Form::submit('Log In')}}

    </div>
    {{Form::close()}}
</section>
@stop


