
<div>
    {{Form::label('UserName','User Name')}}
    {{Form::text('UserName',null,array('autofocus '=>true))}}
    {{$errors->first('username','<p class="error">:message</p>')}}
</div>
<div>
    {{Form::label('FirstName','First Name')}}
    {{Form::text('FirstName')}}
    {{$errors->first('FirstName','<p class="error">:message</p>')}}
</div>
<div>
    {{Form::label('FamilyName','Family Name')}}
    {{Form::text('FamilyName')}}
    {{$errors->first('FamilyName','<p class="error">:message</p>')}}
</div>
<div>
    {{Form::label('Email','Email')}}
    {{Form::email('Email')}}
    {{$errors->first('Email','<p class="error">:message</p>')}}
</div>
<div>
    {{Form::label('Age','Age')}}
    {{Form::text('Age')}}
    {{$errors->first('Age','<p class="error">:message</p>')}}
</div>
<div>
    {{Form::label('Picture','Picture')}}
    {{Form::file('Picture')}}
    {{$errors->first('Picture','<p class="error">:message</p>')}}
</div>
<div>
    {{Form::label('male','Male')}}
    {{Form::radio('Sex','male')}}
</div>
<div>
    {{Form::label('female','Famale')}}
    {{Form::radio('Sex','female')}}
    {{$errors->first('Sex','<p class="error">:message</p>')}}

</div>
<div>
    {{Form::label('Password','Password')}}
    {{Form::password('Password')}}
    {{$errors->first('Password','<p class="error">:message</p>')}}
</div>
<div>
    {{Form::label('RepearPassword','Reapet password')}}
    {{Form::password('RepearPassword')}}
    {{$errors->first('RepearPassword','<p class="error">:message</p>')}}
</div>
<div>
    {{Form::label('Question','Question')}}
    {{Form::text('Question')}}
    {{$errors->first('Question','<p class="error">:message</p>')}}
</div>
<div>
    {{Form::label('Answer','Answer')}}
    {{Form::text('Answer')}}
    {{$errors->first('Answer','<p class="error">:message</p>')}}
</div>


