<a href="/html/MVC_PiePHP/user/article"><button>Articles</button></a>

<?php

foreach ($users as $user) {
    echo "<div>
            <h4>" . $user['email'] . "</h4>
            <h4>" . $user['password'] . "</h4>
            <a href='/html/MVC_PiePHP/user/show/" . $user["id"] . "'><button>Show</button></a>
            <a href='/html/MVC_PiePHP/user/delete/" . $user["id"] . "'><button>Delete</button></a>
        </div>";
}