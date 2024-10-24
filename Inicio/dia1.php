<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
        $title = "mi web";
    ?>
    <title>
        <?php
            echo $title;
        ?>
    </title>
</head>
<body>
    <h1> Hola Mundo</h1>

    <?php
        $array[0]['title'] = 'title ';
        $array[0]['content'] = 'content';
        $array[1]['title'] = 'title 2';
        $array[1]['content'] = 'content 2';
        if (!isset($title)) echo "cosa";
        else echo "no cosa";

        foreach ($array as $item) {
            foreach ($item as $key => $value) {
                echo $key . ": " . $value . "<br>";
            }
            echo $item . "<br>";
        }

        echo "Como estamos ";
    ?>
</body>
</html>