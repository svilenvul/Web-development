@extends('templates.default')

@section ('title')
<title>Update | CarRepair</title>
@stop

@section ('description')
<meta name='description' content="CarRepair is a place, where drivers can find auto mechanics, electricans and specialist. Join the community and find the best offers.">
@stop

@section('content')
<section id="update">    
    {{Form::model($user,array('url'=>"/user/$user->UserName",'class'=>'form-horizontal','method'=>'PUT'))}}
    @include('profiles.fields')
    <div>
        {{Form::submit('Update')}}
    </div>
    {{Form::close()}}
</section>
@stop