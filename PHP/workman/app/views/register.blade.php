@extends('templates.default')

@section ('title')
<title>Register | CarRepair</title>
@stop

@section ('description')
<meta name='description' content="CarRepair is a place, where drivers can find auto mechanics, electricans and specialist. Join the community and find the best offers.">
@stop

@section('content')
<section id="register">
    <ul>
        <li><a href="/user/create">Register new user</a></li>
        <li><a href="/workman/create">Register new workman</a></li>
        <li><a href="/user/{id}/upgrade">Update to workman</a></li>
    </ul>
</section>
@stop