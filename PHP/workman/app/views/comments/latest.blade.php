<section id="latest-comment">
    <div class="wrapper">
        <h4 id="h-latest-comment">Latest</h4>  
        <div class="info-panel">
            <ul id = "latest-comments" class="list">
                <a>
                    @if(isset($latestDiscussion))
                    <p>
                        <strong>{{{$latestDiscussion->From}}} : </strong>
                        <span>{{{$latestDiscussion->Text}}}</span>
                    </p> 
                    <p class="text-right">                    
                        <small>{{{$latestDiscussion->Date}}}</small>
                    </p>   
                    @else
                    <p>You don't have latest discussion</p>
                    @endif
                </a>
                @if(isset($answers))
                @foreach ($answers as $answer)
                <a>
                    <p>
                        <strong>{{{$answer->From}}} : </strong>
                        <span>{{{$answer->Text}}}</span>
                    </p>
                    <p class="text-right">                    
                        <small>{{{$answer->Date}}}</small>
                    </p>
                </a> 
                @endforeach
                @endif
            </ul>
        </div>
        @if(isset($latestDiscussion))
        <h5>Add Answer</h5>
        <div class="info-panel">            
            {{Form::open(array('url'=>"/user/$user->UserName/comment"))}}
            <div>
                {{Form::hidden("From","$user->UserName")}}
                {{$errors->first('From')}}
                {{Form::hidden("About","$latestDiscussion->Id")}}
                {{$errors->first('About')}}
            </div>
            <div>
                {{Form::label("Text","Text:")}}
                {{$errors->first('Text')}}
                {{Form::textarea("Text",null,array('class'=>'form-control'))}}
            </div>
            <div class="ctrl-panel">
                {{Form::submit("Add answer")}}
            </div>
            <div>
                {{$message or ''}}
            </div>
            {{Form::close()}}  
        </div>
        @endif
    </div>
</section>
