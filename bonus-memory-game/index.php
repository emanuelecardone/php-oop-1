<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memory Game</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/frameworksizespace.css">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js"></script>
</head>

<body>
    <div id="root" class="w-100 vh-100 bg-primary">

        <!-- Pagina registrazione -->
        <div v-if="!user.registered && !user.almostRegistered" class="register_page w-100 h-100 d-flex flex-column justify-content-center align-items-center text-center">
            <h2 class="mb_100">Hello user, please register before you start playing</h2>
            <div class="forms w-50 h-50 d-flex flex-column justify-content-center align-items-center">
                <input v-model="user.name" type="text" placeholder="Insert your name here">
                <input v-model="user.lastname" type="text" placeholder="Insert your lastname here" class="my-5">
                <input v-model="user.age" type="number" placeholder="Insert your age here">
            </div>
            <a @click="createUser" href="#" class="btn btn-light mt_100 text-primary fw-bold px-5 py-3">Send</a>
        </div>

        <!-- Pagina conferma -->
        <div v-else-if="!user.registered && user.almostRegistered" class="confirm_page w-100 h-100 d-flex flex-column justify-content-center align-items-center text-center">
            <h2 class="mb_100">Your datas:</h2>
            <ul class="p-0 text-white fw-bold fs-4">
                <li v-for="data,index in toShow">{{data}}</li>
            </ul>
            <a @click="startGame" href="#" class="btn btn-light mt_100 text-primary fw-bold px-5 py-3">Confirm</a>
        </div>

        <!-- Pagina gioco -->
        <div v-else-if="user.registered" class="game w-100 h-100 d-flex justify-content-center align-items-center text-center">
            <div class="game_subwrapper w-75 h-75 border border-5 border-white">
                <div v-if="game.tutorial" class="tutorial">
                    <h2 class="fs_40">Tutorial</h2>
                    <p class="w-50">Remember the correct sequence of the icons you see, then try to repeat it. If you fail, you will start the level again. Ready?</p>
                    <a @click="playGame" href="#" class="btn btn-light text-primary fw-bold px-5 py-3">Start</a>
                </div>
                <div v-else-if="game.grid" class="game_grid">

                </div>
                <div v-else-if="game.endgame" class="end_game">

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>