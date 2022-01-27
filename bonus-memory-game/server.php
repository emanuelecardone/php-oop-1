<?php

    // Valori get alla chiamata api
    $user_name = $_GET['userName'];
    $user_lastname = $_GET['userLastName'];
    $user_age = $_GET['userAge'];

    class User {

        // Tutti questi campi sono obbligatori
        public $name;
        public $lastname;
        public $age;
        
        // Construct
        public function __construct($_name, $_lastname, $_age){
            $this->name = $_name;
            $this->lastname = $_lastname;
            $this->age = $_age;
        }
    }

    // Creazione nuovo user con i dati ricevuti da chiamata api
    $new_user = new User($user_name, $user_lastname, $user_age);
    
    // Invio quindi come risposta alla chiamata api l'oggetto user contenente i dati che la chiamata mi ha appena mandato
    $json = json_encode($new_user);
    header('Content-Type: application/json');

    echo $json;
?>