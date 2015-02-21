@extends('templates.default')

@section ('title')
<title>Register | CarRepair</title>
@stop

@section ('description')
<meta name='description' content="CarRepair is a place, where drivers can find auto mechanics, electricans and specialist. Join the community and find the best offers.">
@stop

@section('content')
<section id="register">
    {{Form::open(array('url'=>'/user','class'=>'form-horizontal','method'=>'POST'))}}
    @include('profiles.fields')
   
    <div>
        {{Form::submit('Register')}}
    </div>
    {{Form::close()}}
</section>
@stop