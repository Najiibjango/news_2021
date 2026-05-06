<?php

function connectDB(){
        static $connection;
        if(!isset($connection)) {
            $connection = connect();
        }      
        return $connection;
}

function connect() {
        $host = getenv('DB_HOST', true) ?: "najjan25.treok.io";
        $port = getenv('DB_PORT', true) ?: 3306; 
        $dbname = getenv('DB_NAME', true) ?: "najjan25_three"; 
        $user = getenv('DB_USERNAME', true) ?: "najjan25_three"; 
        $password = getenv('DB_PASSWORD', true) ?: "cImnPr{VqnM;jLSm"; 

        $connectionString = "mysql:host=$host;dbname=$dbname;port=$port;charset=utf8";

        try {       
                $pdo = new PDO($connectionString, $user, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
        } catch (PDOException $e){
                echo "Virhe tietokantayhteydessä: " . $e->getMessage();
                die();
        }
}