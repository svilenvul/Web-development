<div id ="new-comment" class="clearfix">
        <h4>Add new</h4>        
        {{Form::open(array('url'=>"/user/$user->UserName/comment"))}}
        <div>    
            {{Form::hidden("From","$user->UserName")}}
            {{$errors->first('From')}}
        </div>
        <div>
            {{Form::label('To','To')}}
            {{Form::text('To',null,array('class'=>'form-control'))}}
        </div>
        <div>
            {{Form::label("Text","Text:")}}
            {{$errors->first('Text')}}
            {{Form::textarea("Text",null,array('class'=>'form-control'))}}
        </div>
        <div>
            {{Form::submit('Send',array('class'=>'btn btn-default pull-right'))}}
        </div>
        {{Form::close()}}
</div>