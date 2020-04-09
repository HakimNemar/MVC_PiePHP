<a href="/html/MVC_PiePHP/user/article"><button>Show comments</button></a>

<?php

if ($comments != null) {
    echo "<div><h3>Comments on article " . $comments[0]["article_id"] . "</h3>"; 
    
    foreach ($comments as $comments) {
        echo "<p><u>Comments</u>: " . $comments["coms"] . "</p>
              <p><u>By user</u>: " . $comments["users_id"] . "</p>
        </div><br>";
    }
}
else {
    echo "<h3>No comments.</h3>";
}