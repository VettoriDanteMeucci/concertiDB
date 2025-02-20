<?php

    class DB {

        function __construct(){
        }

        public function newConnection(){
            return mysqli_connect("localhost","root","","concerti");
        } 

        public function getConcerts(){
            $conn = $this->newConnection();
            $ans = [];
            //generazione connessione
            //recupero dati dalla connessione con il DB
            $res = mysqli_query($conn, "SELECT * FROM concerti");    
        
            while($riga = mysqli_fetch_assoc($res)){
                $ans[] = $riga;
            }
            return $ans;
        }

        public function loginAdmin($username, $passwd){
            $conn = $this->newConnection();
            $query = "SELECT * 
            FROM user
            JOIN admin ON admin.idUser = user.id 
            WHERE username = '$username' 
            AND password = '$passwd'";
            $res = mysqli_query($conn, $query);
            if($res == false || mysqli_num_rows($res) == 0){
                return null;
            }
            while($row = mysqli_fetch_assoc($res)){
                return $row;
            }
        }
    }

?>