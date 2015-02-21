<section id="votes">    
    <h3>Votes</h3>   
    <div>
        <h4>Current vote</h4>
        
        @if(isset($mark))
        <p><strong>{{{$mark}}}</strong><span> from 5 </span></p>
        @for($i = 1;$i < $mark; $i++)
        <span class="glyphicon glyphicon-star"></span>
        @endfor
        @for($l = $i;$l <= 5; $l++)
        <span class="glyphicon glyphicon-star-empty"></span>
        @endfor    
       
        @else
        <p>{{{'No votes until now'}}}</p>
        @endif
    </div>
    <div>        
        <h4>Vote</h4>
        @if(!Auth::hasVotedTo($user->UserName))
        {{Form::open(array('url'=>"/user/$loggedUser/vote/$user->UserName",'method'=>'post'))}}
        {{Form::select('mark',array('1'=>'1','2'=>'2','3'=>3,'4'=>'4','5'=>'5'))}}
        {{Form::submit('Vote')}}
        {{$errors->first('mark')}}
        {{Form::close()}}
        @else
        <p>You have already voted</p>
        @endif
    </div>
</section>
