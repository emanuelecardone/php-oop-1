<?php
    // Rendo obbligatorio solo il nome del film, altrimenti l'oggetto con classe Movie non avrebbe senso di esistere
    class Movie {

        // Obbligatori
        public $title;

        // Non obbligatori
        public $cast;
        public $year;
        public $genre;

        // Funzione per il campo obbligatorio
        public function __construct($_title){
            $this->title = $_title; 
        }

        // Funzione che trasforma l'array di attori in una stringa
        public function showActors(){

            // Creo la stringa vuota
            $actors_as_string = '';

            // Concateno alla stringa vuota ogni attore separato da una virgola ad ogni iterazione
            // Mi serve l'indice così non metto la virgola e lo spazio all'ultimo elemento
            foreach($this->cast as $index => $actor){
                $actors_as_string .= ($index < count($this->cast) - 1) ? $actor . ', ' : $actor;
            }

            // Return della stringa
            return $actors_as_string;
        }
    }

    // Oggetti
    $joker = new Movie('Joker');
    $joker->cast = ['Joaquin Phoenix', 'Robert De Niro', 'Zazie Beetz', 'Frances Conroy'];
    $joker->year = 2019;
    $joker->genre = 'Thriller';

    $james_bond = new Movie('No Time To Die');
    $james_bond->cast = ['Daniel Craig', 'Ralph Fiennes', 'Rami Malek', 'Léa Seydoux', 'Naomie Harris'];
    $james_bond->year = 2021;
    $james_bond->genre = 'Action';
?>