<?php
class Conexao {
   
   public static $instance;

   private function __construct() {
       //
   }

   public static function getConexao() {
       if (!isset(self::$instance)) {
           self::$instance = new PDO('mysql:host=localhost:3306;dbname=escola', 'root', '');
       }

       return self::$instance;
   }

}