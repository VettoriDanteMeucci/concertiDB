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

        /**
         * restituisce una array associativo con ["nome", "nomeDir", "orchestrali[]"]
         * ricevendo un ID orchestra
         */
        private function getOrchestraByID($id){
            $conn = $this->newConnection();
            $ans = [];
            $query1 = "SELECT * FROM orchestra WHERE id = '$id'";
            
            $res = mysqli_query($conn, $query1);
            $rowOrchestra = mysqli_fetch_assoc($res);
            $ans["nome"] = $rowOrchestra["nome"];

            $conn = $this->newConnection();
            $queryDir = "SELECT * FROM direttore WHERE cf = '$rowOrchestra[idDirettore]'";
            $res = mysqli_query($conn, $queryDir);
            $rowDir = mysqli_fetch_assoc($res);
            $dir = $this->getInfoByCF($rowDir['cf']);
            $ans["nomeDir"] = "$dir[nome] $dir[cognome]";

            $orchestrali = [];
            $conn = $this->newConnection();
            $queryOrchestrali = "SELECT * FROM orchestrali_orchestra WHERE idOrchestra = '$id'";
            $res = mysqli_query($conn, $queryOrchestrali);
            while($row = mysqli_fetch_assoc($res)){
                $tmp = $this->getInfoByCF($row["idOrchestrale"]);
                $orchestrali[] = "$tmp[nome] $tmp[cognome]";
            }
            $ans["orchestrali"] = $orchestrali;
            return $ans;
        }

        public function getOrchestre(){
            $conn = $this->newConnection();
            $query = "SELECT * FROM orchestra";
            $res = mysqli_query($conn, $query);
            $ans = [];
            while($row = mysqli_fetch_assoc($res)){
                $ans[] = $this->getOrchestraByID($row["id"]);
            }
            return $ans;
        }
        /**
         * Return the row from persona
         */
        private function getInfoByCF($cf){
            $conn = $this->newConnection();

            $query = "SELECT * FROM persona WHERE cf = '$cf'";
            $res = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($res);
            return $row;
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