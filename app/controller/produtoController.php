<?php

class ProdutoController
{
    public function getAll($ativo = 1)
    {
        try {
            $dao = new DAO;
            $sql = "SELECT * from produto where ativo = :ativo";
            $conn = $dao->conecta();
            $stman = $conn->prepare($sql);
            //$stman = $dao->conecta()->prepare($sql);
            $stman->bindParam(":ativo", $ativo);
            $stman->execute();
            $result = $stman->fetchAll();
            return $result;
        } catch (Exception $e) {
            throw new Exception("Erro ao listar os produtos: " . $e->getMessage());
        }
    }

    public function get($id)
    {
        try {
            $sql = "SELECT * from produto where id = :id and ativo <> 0";
            $dao = new DAO;
            $stman = $dao->conecta()->prepare($sql);
            $stman->bindParam(":id", $id);
            $stman->execute();
            $result = $stman->fetchALL();
            return $result;
        } catch (Exception $e) {
            throw new Exception("Erro ao pegar o produto: " . $e->getMessage());
        }
    }

    public function add(Produto $prod)
    {
        try {
            $sql = "INSERT INTO produto 
                    (id, nome, altura, largura, comprimento, valor, tipo, cor, marca, peso, obs, quantidade, codigo, validade_pro,
                    foto_perfil1, foto_perfil2, foto_perfil3,  ativo) 
                    VALUES
                    (null, :nome, :altura, :largura, :comprimento, :valor, :tipo, :cor, :marca, :peso, :obs, :quantidade, :codigo, :validade_pro,
                    :foto_pro1, :foto_pro2, :foto_pro3, :ativo)";
            //$senhaCryp = md5($prod->senha);
            // $senhaCryp = crypt($prod->senha, '$5$rounds=5000$' . $prod->email . '$');
            $dataBanco = $this->formatDateBD($prod->data_nasc);

            $dao = new DAO;
            $stman = $dao->conecta()->prepare($sql);
            $stman->bindParam(":nome", $prod->nome);
            $stman->bindParam(":largura",  $prod->lagura);
            $stman->bindParam(":validade_pro", $dataBanco);
            $stman->bindParam(":comprimento", $prod->comprimento);
            $stman->bindParam(":valor", $prod->valor);
            $stman->bindParam(":tipo", $prod->tipo);
            $stman->bindParam(":cor", $prod->cor);
            $stman->bindParam(":narca", $prod->narca);
            $stman->bindParam(":peso", $prod->peso);
            $stman->bindParam(":obs", $prod->obs);
            $stman->bindParam(":quantidade", $prod->quantidade);
            $stman->bindParam(":codigo", $prod->codigo);
    
            $stman->bindParam(":foto_pro1", $prod->foto_perfil1);
            $stman->bindParam(":foto_pro2", $prod->foto_perfil2);
            $stman->bindParam(":foto_pro3", $prod->foto_perfil3);
          
            $stman->bindParam(":ativo", $prod->ativo);
            return $stman->execute();
        } catch (Exception $e) {
            throw new Exception("Erro ao cadastra o produto: " . $e->getMessage());
        }
    }

    public function update(Usuario $prod)
    {
        try {
            $sql = "UPDATE  usuario 
                    SET nome = :nome,
                    altura = :altura, 
                    largura = :lagura,
                    comprimento = :comprimento,
                    valor = :valor,
                    tipo = :tipo,
                    cor = :cor,
                    marca = :marca,
                    peso = :peso,
                    obs = :obs,
                    quantidade = :quantidade,
                    codigo = :codigo,
                    validade_pro = validade_pro,
                    foto_pro1 = :foto_pro1,
                    foto_pro2 = :foto_pro2,
                    foto_pro3 =:foto_pro3, 
                    ativo = :ativo
                    WHERE usuario.id = :id";
            //$senhaCryp = md5($user->senha);
            // $senhaCryp = crypt($user->senha, '$5$rounds=5000$' . $user->email . '$');
            $dataBanco = $this->formatDateBD($prod->validade);

            $dao = new DAO;
            $stman = $dao->conecta()->prepare($sql);
            $stman->bindParam(":id", $prod->id);
            $stman->bindParam(":nome", $prod->nome);
            $stman->bindParam(":largura",  $prod->lagura);
            $stman->bindParam(":validade_pro", $dataBanco);
            $stman->bindParam(":comprimento", $prod->comprimento);
            $stman->bindParam(":valor", $prod->valor);
            $stman->bindParam(":tipo", $prod->tipo);
            $stman->bindParam(":cor", $prod->cor);
            $stman->bindParam(":narca", $prod->narca);
            $stman->bindParam(":peso", $prod->peso);
            $stman->bindParam(":obs", $prod->obs);
            $stman->bindParam(":quantidade", $prod->quantidade);
            $stman->bindParam(":codigo", $prod->codigo);
    
            $stman->bindParam(":foto_pro1", $prod->foto_perfil1);
            $stman->bindParam(":foto_pro2", $prod->foto_perfil2);
            $stman->bindParam(":foto_pro3", $prod->foto_perfil3);
            $stman->bindParam(":ativo", $prod->ativo);
            return $stman->execute();
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizado o produto: " . $e->getMessage());
        }
    }


    public function delete($id)
    {
        try {
            //$sql = "DELETE FROM usuario WHERE id = :id";
            $sql = "DELETE produto Set ativo = 0 Where id = :id";
            $dao = new DAO;
            $stman = $dao->conecta()->prepare($sql);
            $stman->bindParam(":id", $id);
            return $stman->execute();
        } catch (PDOException $pe) {
            throw new Exception("Erro ao apagar o produto: " . $pe->getMessage());
        } catch (Exception $e) {
            throw new Exception("Erro ao acessar a base de produto: " . $e->getMessage());
        }
    }


    // public function busca ($usuario, $pass)
    // {
    //     try {
    //         $sql = "SELECT id, nome, email, foto_perfil 
    //             From usuario 
    //             Where email = :email and senha = md5(:senha)";
    //         $senhaCryp = crypt($pass, '$5$rounds=5000$' . $usuario . '$');
    //         $dao = new DAO;
    //         $stman = $dao->conecta()->prepare($sql);
    //         $stman->bindParam(":email", $usuario);
    //         $stman->bindParam(":senha", $senhaCryp);
    //         $stman->execute();
    //         $user = $stman->fetchALL();
    //         if (count($user) > 0) {
    //             //var_dump($user);
    //             $user["token"] = generateJWT($user[0]);
    //         }
    //         return $user;
    //     } catch (PDOException $pe) {
    //         throw new Exception("Erro ao busca acesso ao usuario: " . $pe->getMessage());
    //     } catch (Exception $e) {
    //         throw new Exception("Erro ao acessar a base de dados: " . $e->getMessage());
    //     }
    // }


    private  function  formatDateBD($date)
    { // Entrada: DD/MM/YYYY -> YYYY/MM/DD
        $partDate = explode("/", $date);
        return ($partDate[2] . "-" . $partDate[1] . "-" . $partDate[0]);
    }
};
