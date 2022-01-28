<!-- Utilizzo il require in quanto tutta la pagina non ha senso se non ho i dati sui film -->
<?php require __DIR__ . '/moviedata.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Oggetti</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/frameworksizespace.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-success">
    
    <header class="w-100 h_100p d-flex justify-content-center align-items-center border-bottom border-5 border-white">
        <h1 class="text-white text-uppercase mb-0">movies</h1>
    </header>

    <main class="w-100 d-flex justify-content-around align-items-center">

        <div class="joker_box">
            <h2 class="title mb-0"><?php echo $joker->title; ?> (<?php echo $joker->year; ?>)</h2>
            <span class="cast">Cast: <?php echo $joker->showActors(); ?></span>
            <span class="genre">Genre: <?php echo $joker->genre; ?></span>
        </div>

        <div class="james_bond_box">
            <h2 class="title mb-0"><?php echo $james_bond->title; ?> (<?php echo $james_bond->year; ?>)</h2>
            <span class="cast">Cast: <?php echo $james_bond->showActors(); ?></span>
            <span class="genre">Genre: <?php echo $james_bond->genre; ?></span>
        </div>

    </main>

</body>
</html>