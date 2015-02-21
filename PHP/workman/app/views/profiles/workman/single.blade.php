@extends ('templates.default')

@section ('title')
<title>Profile | CarRepair</title>
@stop

@section ('description')
<meta name='description' content="CarRepair is a place, where drivers can find auto mechanics, electricans and specialist. See specialist details - votes, prices, previous work and contact your lifesaver.">
@stop

@section('profile')
    @include('profiles.info')
    @include('profiles.skills')
@stop

@section('cars')
    @include('votes.info')
@stop
@if(Auth::isOwner($user->UserName))
    @section('comments')
        @include('comments.list')
    @stop    

    @section('latestComment')
        @include('comments.latest')

    @stop
@endif