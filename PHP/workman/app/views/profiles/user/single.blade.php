@extends ('templates.default')
@section ('title')
<title>Profile | CarRepair</title>
@stop

@section ('description')
<meta name='description' content="CarRepair is a place, where drivers can find auto mechanics, electricans and specialist. Check out user details.">
@stop

@section('profile')
    @include('profiles.info')
@stop

@section('cars')
    @include('cars.list')
@stop
@if(Auth::isOwner($user->UserName))
    @section('comments')
        @include('comments.list')
    @stop    

    @section('latestComment')
        @include('comments.latest')    
    @stop
@endif

