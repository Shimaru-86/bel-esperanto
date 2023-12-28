<?php
require("Connection.class.php");

class Registry {
    private $connectionDB;
    private $connect;

    public function registryAccount($nome, $email, $telefone, $cpf, $senha) {
        if($nome !== "" && $email !== "" && $telefone !== "" && $cpf !== "" && $senha !== "" ) {
            $senhaCodificada = password_hash($senha, PASSWORD_DEFAULT);
            $dataHoje = date("Y-m-d");
            $nomeCurto = substr($nome, 0, 7);

            $this->connectionDB = new Connection();
            $this->connect = $this->connectionDB->connectDB();

            $stmt = $this->connect->prepare("SELECT * FROM estudantes WHERE estudanteEmail = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows > 0) {
                $stmt->close();
                $this->connectionDB->disconnectDB();
                return 2; // Email já existe
            }

            $stmt = $this->connect->prepare("INSERT INTO estudantes (idEstudante_PK, estudanteNome, estudanteNomeCurto, estudanteEmail, estudanteTelefone, estudanteCpf, estudanteSenha, dataRegistro)
                VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)");

            $stmt->bind_param("sssssss", $nome, $nomeCurto, $email, $telefone, $cpf, $senhaCodificada, $dataHoje);
            $stmt->execute();

            $stmt->close();
            $this->connectionDB->disconnectDB();

            return 1;
        } else {
            return 0;
        }
    }
}
?>