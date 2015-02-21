<section  id="comments" > 
    <h3 id="h-comments">Comments</h3> 

    <div  id ="all-comments" class="wrapper">        
        <h4>All</h4>
        <div class="info-panel">
            <ul class="list">
                @if(isset($comments))
                @foreach ($comments as $comment)
                <a class="discussion" href="/user/{{{$user->UserName}}}/comment/{{{$comment->Id}}}">
                    <p>
                        <strong>{{{$comment->To}}} : </strong>
                        <span>{{{$comment->Text}}}</span>
                    </p>
                    <p class="text-right">
                        <small >{{{$comment->Date}}}</small>
                    </p>
                </a>
                @endforeach
                @else
                <p>
                    You don't have any discussions
                </p>
                @endif
            </ul>
        </div>
        <div class="ctrl-panel">
            <a id="all" href="/user/{{{$user->UserName}}}/comment">View all</a>
            <a id="new" href="/user/{{{$user->UserName}}}/comment/create">Add new</a>
        </div>
    </div>

</section>