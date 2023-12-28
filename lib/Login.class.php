<?php
    require("Connection.class.php");

    class Login
    {
        private $connectionDB;

        public function logar($email, $senha)
        {
            session_start();

            if(isset($email, $senha) && $email !== "" && $senha !== "")
            {
                // Criar Conexão
                $this->connectionDB = new Connection();
                $connect = $this->connectionDB->connectDB();

                if ($connect->connect_error) {
                    die("Erro ao conectar com o Banco de Dados: " . $connect->connect_error);
                    return array('userLogged' => '0', 'info' => 'Erro ao conectar ao Banco de Dados.');
                }

                // Conferir se a conta existe através do email.
                $stmt = $connect->prepare("SELECT * FROM estudantes WHERE estudanteEmail = ?");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();

                if($result->num_rows > 0)
                {
                    $dados = $result->fetch_assoc(); // Recebo os dados da consulta se existe um usuário com o email informado.
                    
                    // Confere se a senha está correta.
                    if(password_verify($senha, $dados["estudanteSenha"]))
                    {
                        $userData = array(
                            'userLogged' => '1',
                            'info' => 'Estudante conectado',
                            'idEstudante_PK' => $dados["idEstudante_PK"],
                            'estudanteNome' => $dados["estudanteNome"],
                            'estudanteNomeCurto' => $dados["estudanteNomeCurto"],
                            'estudanteEmail' => $dados["estudanteEmail"],
                            'estudanteTelefone' => $dados["estudanteTelefone"],
                            'estudanteCpf' => $dados["estudanteCpf"],
                            'dataRegistro' => $dados["dataRegistro"]
                        );

                        $_SESSION['userData'] = $userData;

                        $stmt->close();
                        $connect->close();

                        return $_SESSION['userData'];
                    }
                }

                $stmt->close();
                $connect->close();
            }

            return array('userLogged' => '0', 'info' => 'Email ou senha não definidos.');
        }
    }
?>
