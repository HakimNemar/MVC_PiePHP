
<h1>Render de src/view/user/index.php</h1>

<?php

foreach ($users as $user) {
    echo "<div>
            <h4>" . $user['email'] . "</h4>
            <h4>" . $user['password'] . "</h4>
            <a href='/html/MVC_PiePHP/user/delete/" . $user["id"] . "'><button>Delete</button></a>
        </div>";
}