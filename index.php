<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre>
        <?php
        
        // var_dump($_POST, $_GET, $_SERVER);
        
        define("BASE_URI", str_replace("\\", "/", substr(__DIR__, strlen($_SERVER["DOCUMENT_ROOT"]))));
        
        require_once(implode(DIRECTORY_SEPARATOR, ["Core", "autoload.php"]));
        
        $app = new Core\Core();
        $app->run();

        // $test = new Model\UserModel();
        // $test->tes();

        ?>
    </pre>
</body>
</html>