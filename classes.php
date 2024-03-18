<?php 
    session_start();
    class Usuario{
        private string $nome;
        private string $email;
        private string $senha;


      

      function setNome($nome){
        $this->nome = $nome;
      }
      function getNome(){
        return $this->nome;
      }

      function setEmail($email){
        $this->email = $email;
      }
      function getEmail(){
        return $this->email;
      }

      function setSenha($senha){
        $this->senha = $senha;
      }
      function getSenha(){
        return $this->senha;
      }
    }

    class ClasseSQL{


       public function Conexao(){
            $hostname = "localhost";
            $username = "root";
            $password = "root";
            $database = "usuarios";
            $port = 3306;
            $conn = mysqli_connect($hostname, $username, $password, $database, $port);
            return $conn;
        }

        public function Cadastrar($nome, $email, $senha){

            $conn = $this->Conexao();
            $sql = "SELECT * FROM user WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();

            $resultado = $stmt->get_result();

            if($resultado->num_rows > 0){
                echo "<script> alert('Já existe um usuário com este e-mail!'); </script>";
                

            }
            else{
                
                $sql = "INSERT INTO user (nome, email, senha) VALUES (? , ? , ?)";
                $declaracao = $conn->prepare($sql);
                $declaracao->bind_param("sss", $nome, $email, $senha);
             
                $declaracao->execute();
                echo "<script> alert('Usuário cadastrado com sucesso!'); </script>";
                
            }
            
            
        }

        public function Logar($email, $senha){
            $conn = $this->Conexao();
            $sql = "SELECT * FROM user WHERE email = ? AND senha = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $email, $senha);
            $stmt->execute();

            $resultado = $stmt->get_result();

            if($resultado->num_rows > 0){
                echo "<script> alert('Login efetuado com sucesso!'); </script>";
            }
            else{
                echo "<script>alert('Verifique os dados e tente novamente!'); </script>";
            }

        }
       

    }



?>