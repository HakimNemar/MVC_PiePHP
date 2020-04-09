<a href="/html/MVC_PiePHP/user"><button>Show users</button></a>

<?php

foreach ($article as $article) {
    echo "<div>
            <p>Title: <b>" . $article["titre"] . "</b></p>
            <p>Author: <b>" . $article["author"] . "</b></p>
            <p>Content: <b>" . $article["content"] . "</b>
            <a href='/html/MVC_PiePHP/user/article/". $article["id"] . "'><button>See comments</button></a></p>
        </div><br>";
}
