<p class="text-danger">{{{$message or ''}}}</p>
<section id="profile-tab">   
    <div class="wrapper">
        <h3 id="h-profile">User</h3> 
        <div class="img-panel">
            <img src="/{{{$user->Picture}}}"/>
        </div>              
        <div class="info-panel">
            <p>
                <strong>User Name:</strong>
                <span>{{{$user->UserName}}}</span>                
            </p>
            <p>
                <strong>First name:</strong>
                <span>{{{$user->FirstName}}}</span>
            </p>
            <p>
                <strong>Family name:</strong>
                <span>{{{$user->FamilyName}}}</span>
            </p>
            <p>
                <strong>Email:</strong>
                <span>{{{$user->Email}}}</span>
            </p>
            <p>
                <strong>Age:</strong>
                <span>{{{$user->Age}}}</span>
            </p>
            <p>
                <strong>Sex:</strong>
                <span>{{{$user->Sex}}}</span>
            </p>  
        </div>
        <div class="ctrl-panel">
            <a href="/{{$resource}}/{{{$user->UserName}}}/edit">Edit profile</a>
        </div>
    </div>
</section>