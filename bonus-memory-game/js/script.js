Vue.config.devtools = true;

const app = new Vue(
    {
        el: '#root',
        data: {
            // Oggetto con informazioni sull'user
            user: {
                // Indica se è stato creato un utente
                registered: true,
                // Indica se l'utente deve confermare
                almostRegistered: false,
                name: null,
                lastname: null,
                age: null,
                // Verrà riempito col response dell'api
                toShow: null
            },
            // Oggetto per dare il v-if alle sezioni di game
            game: {
                tutorial: true,
                grid: false,
                endgame: false
            },
            // Array con l'elenco delle classi per ciclare le icone
            icons: ['circle', 'square', 'triangle', 'circle', 'square', 'triangle', 'circle', 'square', 'triangle', 'circle', 'square', 'triangle'],
            // Oggetto con funzioni del gioco quale il clock
            utilities: {
                gameStartClock: null,
                gameClock: null,
                endShowClock: null,
                showedIndex: null,
                currentText: 'Playing sequence, pay attention!',
                level: 0,
                clickIsPossible: false,
                finalMessage: null
            },
            // Array con gli index delle icone per ciascun livello
            iconsToShow: [
                [2,3,6,1],
                [0,8,3,10,1],
                [11,9,0,9,2,7]
            ],
            // Array con le icone clickate così da colorarle di verde al click
            clickedList: [],
            // Indice che inquadra il numero di click effettuati dall'utente, così da comparare quell'indice con quello corrispondente nell'array di indici mostrati
            clickedIcons: null
        },
        methods: {
            // Funzione per creare l'utente al click di "Send"
            createUser: function(){
                axios.get(
                    'http://localhost:8888/php-oop-1/bonus-memory-game/server.php',
                    {
                        params: {
                            userName: this.user.name,
                            userLastName: this.user.lastname,
                            userAge: this.user.age
                        }
                    })
                    .then((response) => {
                        // Rendo visibile la pagina di conferma
                        this.user.almostRegistered = true;
                        this.toShow = response.data;
                    });
            },
            // Funzione per confermare i dati al click di "Confirm" e mostrare la sezione gioco
            startGame: function(){
                this.user.registered = true;
            },
            // Funzione per passare da tutorial alla griglia di gioco
            playGame: function(){
                this.game.tutorial = false;
                this.game.grid = true;

                // Dopo 1 secondo inizia la sequenza
                this.utilities.gameStartClock = setTimeout(() => {

                    // Variabile per tener conto dell'indice da seguire dentro l'array, va 0 di default
                    let iconIndex = 0;
                    // L'index selezionato diventa il primo dell'array
                    this.utilities.showedIndex = this.iconsToShow[this.utilities.level][iconIndex];
                    console.log(this.utilities.showedIndex);

                    // Ogni secondo cambia l'index 
                    this.utilities.gameClock = setInterval(() => {
                        iconIndex++;
                        this.utilities.showedIndex = this.iconsToShow[this.utilities.level][iconIndex];
                        console.log(this.utilities.showedIndex);

                        // Condizione di uscita se ha percorso tutto l'array 
                        if(iconIndex === this.iconsToShow[this.utilities.level].length - 1){
                            clearInterval(this.utilities.gameClock);
                            // Dopo 1 secondo finisce di mostrare le icone e anche l'ultima torna nulla
                            this.utilities.endShowClock = setTimeout(() => {
                                this.utilities.showedIndex = null;
                                this.utilities.currentText = 'Your turn!';
                                this.utilities.clickIsPossible = true;
                            }, 1000);
                        }
                    }, 1000);
                }, 1000);
            },
            // Funzione per controllare l'errore al click di un'icona (parametro = index dell'icona clickata)
            checkClicked: function(clickedIndex){
                // Tutto è possibile se la sequenza è già stata mostrata, quindi se clickIsPossible è true
                if(this.utilities.clickIsPossible){
                    // Push nell'array per colorare le icone clickate
                    this.clickedList.push(clickedIndex);
                    // Per far andare pari passo indice dell'array di icone mostrate e il conteggio di click, il conteggio parte da 0 e non da 1
                    if(this.clickedIcons === null){
                        this.clickedIcons = 0;
                    } else{
                        this.clickedIcons++;
                    }

                    // Condizione per l'endgame (vittoria o sconfitta) 
                    if(this.iconsToShow[this.utilities.level][this.clickedIcons] !== clickedIndex){
                        this.game.grid = false;
                        this.game.endgame = true;
                        this.utilities.finalMessage = 'You lost!';
                    } else if(this.clickedIcons === this.iconsToShow[this.utilities.level].length - 1){
                        this.game.grid = false;
                        this.game.endgame = true;
                        this.utilities.finalMessage = 'You won!';
                    }
                }
            }
        }
    }
);