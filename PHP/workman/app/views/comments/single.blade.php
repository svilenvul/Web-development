<ul id = "latest-comments" class="list">
    <a>       
        <p>
            <strong>{{{$latestDiscussion->From}}} : </strong>
            <span>{{{$latestDiscussion->Text}}}</span>
        </p> 
        <p class="text-right">                    
            <small>{{{$latestDiscussion->Date}}}</small>
        </p>       
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
