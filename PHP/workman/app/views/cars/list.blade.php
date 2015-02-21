<section id="cars">
    <div class="wrapper">
        <h3 id="h-cars">Cars</h3>    
        <ul class="list">
            @if(isset($cars))
            @foreach($cars as $car)
            <li>
                <div class="cars">
                    <div class="img-panel">
                        <img src="{{{$car->Image}}}" alt="...">
                    </div>
                    <div class="info-panel">
                        <p>
                            <strong>Model:</strong>
                            <span>{{{$car->Model}}}</span>
                        </p>
                        <p>
                            <strong>Year:</strong>
                            <span>{{{$car->Year}}}</span>
                        </p>
                        <p>
                            <strong>Trademark:</strong>
                            <span>{{{$car->Trademark}}}</span>
                        </p>
                        <p>
                            <strong>EngineSize:</strong>
                            <span>{{{$car->EngineSize}}}</span>
                        </p>
                    </div>
                </div>
            </li>
            @endforeach
            @endif
        </ul>
        <div class="ctrl-panel">
            <a type="button" id="new" href="/user/{{{$user->UserName}}}/car/create">Add new</a>
            <a type="button" id="remove" href="/user/{{{$user->UserName}}}/car/$id">Remove</a>
            <a type="button" id="update" href="/user/{{{$user->UserName}}}/car/$id" >Update</a>
            <a type="button" id="all" href="/user/{{{$user->UserName}}}/car">View all</a>
        </div>   
    </div>
</section>   
