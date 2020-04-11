<a href="/html/MVC_PiePHP/user/article"><button>Articles</button></a>

<!-- 
{{$users[0]["email"]}}

@if(count($users) === 1)
    i have one record 
@elseif(count($users) > 1)
    i have multiple
@else
    i dont have
@endif 

@foreach($users as $user)
    <p>This is user {{$user["id"]}}</p>
@endforeach

@isset($users)
    <p> is defined and is not null</p>
@endisset

@empty($users)
    <p>is empty</p>
@endempty
-->

<?php

// if (count($users) === 1) {
//     echo "i have one";
// }
// else if (count($users) > 1) {
//     echo "multiple";
// }
// else {
//     echo "dont have";
// }

foreach ($users as $user) {
    echo "<div>
            <h4>" . $user['email'] . "</h4>
            <h4>" . $user['password'] . "</h4>
            <a href='/html/MVC_PiePHP/user/show/" . $user["id"] . "'><button>Show</button></a>
            <a href='/html/MVC_PiePHP/user/delete/" . $user["id"] . "'><button>Delete</button></a>
        </div>";
}