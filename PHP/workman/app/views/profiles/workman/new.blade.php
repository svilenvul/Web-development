@extends('templates.default')

@section ('title')
<title>Register | CarRepair</title>
@stop

@section ('description')
<meta name='description' content="CarRepair is a place, where drivers can find auto mechanics, electricans and specialist. Join the community and find the best offers.">
@stop

@section('content')
<section id="register">
    {{Form::open(array('url'=>'/workman','class'=>'form-horizontal','method'=>'POST'))}}
    @include('profiles.fields')
    <div>
        {{Form::label('Payment','Payment')}}
        {{Form::text('Payment')}}
        {{$errors->first('Payment','<p class="error">:message</p>')}}
    </div>
    <div>
        {{Form::label('Profession','Profession')}}
        {{Form::text('Profession',null)}}
        {{$errors->first('Profession','<p class="error">:message</p>')}}
    </div>
    <div>
        {{Form::submit('Register')}}
    </div>
    {{Form::close()}}
</section>
@stop