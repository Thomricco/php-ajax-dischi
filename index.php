<?php

include __DIR__ . "/database/dischiDb.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>


<body>
    
    <main>

        <div class="container">
            <div class="container-album">
                <div class="album-box">
                    <?php
                    foreach ($albums as $album) {
                    ?>
                    <div class="box">
                        <img src="<?php echo $album['poster'] ?>" class="box-img" alt="">
                        <p class="text-title"><?php echo $album['title'] ?></p>
                        <p class="text-author"><?php echo $album['author'] ?></p>
                        <p class="text-years"><?php echo $album['year'] ?></p>
                    </div>
                    
                    <?php
                    }
                    ?>
                </div>

            </div>

        </div>
        
    </main>


</body>


</html>