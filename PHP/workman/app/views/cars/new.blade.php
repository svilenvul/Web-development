<h3>Add new car</h3>
<div>
    {{{$message or '' }}}
</div>
{{Form::open(array('url'=>"/user/$id/car"))}}
<div>
    {{Form::label('picture','Picture')}}
    {{Form::file('picture')}}
    {{$errors->first('picture','<p class="error">:message</p>')}}
</div>
<div>
    {{Form::label('model','Model:')}}
    {{Form::text('model')}}
    {{$errors->first('model')}}
</div>
<div>
    {{Form::label('year','Year:')}}
    {{Form::text('year')}}
    {{$errors->first('year')}}
</div>
<div>
    {{Form::label('trademark','Trademark')}}
    {{Form::text('trademark')}}
    {{$errors->first('trademark')}}
</div>
<div>
    {{Form::label('enginesize','Engine Size')}}
    {{Form::text('enginesize')}}
    {{$errors->first('enginesize')}}
</div>
<div>
    {{Form::submit('Add car')}}
</div>
{{Form::close()}}