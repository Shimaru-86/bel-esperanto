<?php
    class Connection {
        private string $host = "localhost";
        private string $usuario = "root";
        private string $senha = "";
        private string $dbname = "treenet-edu"; //Nome da base de dados dentro do mySql.
        private $connect = null;

        /*
        //REAL
        private string $host = "localhost";
        private string $usuario = "id21190166_tneadmin";
        private string $senha = "Totcesmeso8!";
        private string $dbname = "id21190166_tnedb"; //Nome da base de dados dentro do mySql.
        private $connect = null;
        */

        public function connectDB() {
            $this->connect = new mysqli($this->host, $this->usuario, $this->senha, $this->dbname);

            if ($this->connect->connect_error) {
                die("Erro ao conectar com o Banco de Dados: " . $this->connect->connect_error);
            }

            $this->connect->set_charset('utf8mb4');

            return $this->connect;
        }

        public function disconnectDB() {
            $this->connect->close();
        }
    }
?>
