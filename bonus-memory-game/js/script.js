Vue.config.devtools = true;

const app = new Vue(
    {
        el: '#root',
        data: {
            // Oggetto con informazioni sull'user
            user: {
                // Indica se è stato creato un utente
                registered: false,
                // Indica se l'utente deve confermare
                almostRegistered: false,
                name: null,
                lastname: null,
                age: null,
                // Verrà riempito col response dell'api
                toShow: null
            }
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
            }
        }
    }
);