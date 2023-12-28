<?php
    require("Conexao.class.php");

    class Register
    {
        private $conexaoDB;
        private $connect;
        private $consult;
        private $insert;
        private $update;
        private $insertPayment;

        public function registrar($nome, $email, $telefone, $senha, $cvt)
        {
            if(isset($nome) && isset($email) && isset($telefone) && isset($senha) && isset($cvt))
            {
                if(($nome != "") && ($email != "") && ($telefone != "") && ($senha != ""))
                {
                    //Preparar os dados para o cadastro
                    $senhaCodificada = password_hash($senha, PASSWORD_DEFAULT);
                    $partesDoNome = explode(" ", $nome);
                    $primeiroNome = $partesDoNome[0];

                    $datetime = new DateTime( "now", new DateTimeZone( "America/Sao_Paulo" ) );
                    $dataHoje = $datetime->format("Y-m-d"); //Data do registro
                    $dataFim = clone $datetime;
                    $dataFim->modify("-1 day");
                    $dataFim = $dataFim->format("Y-m-d"); //Data do fim dos estudos pagos.

                    //Indica quem é o estudante que fez o convite.
                    $chaveIdUp = $cvt;

                    //Criar Conexão
                    $this->conexaoDB = new Conexao();
                    $this->connect = $this->conexaoDB->conectarBD();

                    //Confere se o email já existe no banco de dados
                    $contaExiste = true;
                    $this->consult = $this->connect->query("SELECT * FROM estudantes WHERE emailEstudante = '$email'");
                    
                    if($this->consult->num_rows && $this->consult->num_rows > 0)
                    {
                        return 2; //Email já existe
                    }
                    else
                    {
                        $contaExiste = false;
                    }

                    //Inserir
                    if($nome != "" && $email != "" && $telefone != "" && $senha != "" && $contaExiste == false)
                    {
                        $this->insert = $this->connect->query("INSERT INTO estudantes (idEstudante, emailEstudante, telefoneEstudante, senhaEstudante, nomeCompleto, nomeDeEscudeiro, dataDeNascimento, dataDeRegistro, dataFimDosEstudos, patente, escolaridade, pontosDeComportamento, experiencia, moedasDeEscudeiro, nomeResponsavel, emailResponsavel, cpfResponsavel, celularResponsavel, senhaResponsavel, enderecoRua, enderecoNumero, enderecoComplemento, enderecoBairro, enderecoCidade, enderecoEstado, enderecoCep, chaveNovaSenha, chaveAtualizaAnuidade, chaveConvite, up, sobreMim, amigos, pedidosFeitos, 	pedidosRecebidos, salto)
                        VALUES (NULL, '$email', '$telefone', '$senhaCodificada', '$nome', '$primeiroNome', '', '$dataHoje', '$dataFim', '0', '0', '500', '0', '100', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '$chaveIdUp', '', '', '', 	'', 0)");
                    }

                    //Pagamento, Imagem de perfil, pasta de redações
                    if($this->insert)
                    {
                        //paymentMethod->type: 1 = cartão de crédito, 2 = boleto, 3 = débito online, 4 = PIX, 5 = PicPay, 6 = Mão
                        //Cadastra o pagamento no banco de dados.
                        $this->consult = $this->connect->query("SELECT * FROM estudantes WHERE emailEstudante = '$email'");
                        if($this->consult->num_rows && $this->consult->num_rows > 0)
                        {
                            while($dados = $this->consult->fetch_array())
                            {
                                $idEstudante = $dados["idEstudante"];
                                $up = $dados["up"];
                                $chaveConvite = password_hash($idEstudante, PASSWORD_DEFAULT);
                                $this->update = $this->connect->query("UPDATE estudantes SET chaveConvite = '$chaveConvite' WHERE idEstudante = '$idEstudante'");
                            }
                        }

                        $reference = $idEstudante;
                        $sistemaPagamento = "Indefinido";
                        $tipoPagamento = "0";  //Cartão, débito, boleto etc.
                        $codTransaction = "";
                        $statusPagamento = "0";
                        $linkBoleto="";
                        $criadoEm = $dataHoje;
                        $modificadoEm = "";
                        $comissao = "0";
                        $recebedorComissao = $up;

                        //idPagamento, reference, sistemaPagamento, tipoPagamento, codTransaction, statusPagamento, linkBoleto, criadoEm, modificadoEm
                        $this->insertPayment = $this->connect->query("INSERT INTO pagamentos (idPagamento, reference, nomeEstudante, sistemaPagamento, tipoPagamento, codTransaction, statusPagamento, linkBoleto, criadoEm, modificadoEm, comissao, dataPagComissao, recebedorComissao)
                        VALUES (NULL, '$reference', '$nome', '$sistemaPagamento', '$tipoPagamento', '$codTransaction', '$statusPagamento', '$linkBoleto', '$criadoEm', '$modificadoEm', '$comissao', '', '$recebedorComissao')");

                        //Insere uma imagem de perfil no diretório.
                        $criarImagemProfile = copy("../images/profile/0.jpg", "../images/profile/" . $idEstudante . ".jpg");
                    
                    } //FECHA O IF INSERT

                    $this->connect = $this->conexaoDB->fecharConexao();
                    
                    if($this->insert)
                    {
                        return 1;
                    }
                    else
                    {
                        return 3;
                    }
                }
                else
                {
                    return 0;
                } //Fecha o IF se ($nome, $email, $telefone, $senha) diferente de ""
            }
            else
            {
                return 0;
            } //Fecha o IF isset ($nome, $email, $telefone, $senha)
        } //Fecha a função de logar.

    } //Fecha a classe.

?>