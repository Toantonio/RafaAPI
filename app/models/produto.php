<?php
class Produto
{
    public $id;
    public $nome_pro;
    public $altura;
    public $largura;
    public $comprimento;
    public $valor;
    public $tipo;
    public $cor;
    public $marca;
    public $peso;
    public $obs;
    public $quuantidade;
    public $codigo;
    public $validade_pro;
    public $foto_perfil1;
    public $foto_perfil2;
    public $foto_perfil3;  
    public $ativo;

    public function popo($dadosPro)
    {
        //Popular o objeto usuario ($dadosUser para $user)
        $this->id = $dadosPro->id; //"id": null,
        $this->nome = $dadosPro->nome; 
        $this->altura = $dadosPro->altura; 
        $this->largura = $dadosPro->largura; 
        $this->comprimento = $dadosPro->comprimento; 
        $this->valor = $dadosPro->valor; 
        $this->tipo = $dadosPro->tipo; 
        $this->valor = $dadosPro->valor; 
        $this->cor = $dadosPro->cor; 
        $this->marca = $dadosPro->marca; 
        $this->peso = $dadosPro->peso; 
        $this->obs = $dadosPro->obs; 
        $this->validade_pro = $dadosPro->validade_pro; 
        // $this->valor = $dadosPro->valor; 
        // $this->valor = $dadosPro->valor; 
        $this->foto_pro1 = $dadosPro->foto_pro1; // "foto_perfil": "",
        $this->foto_pro2 = $dadosPro->foto_pro2; // "foto_perfil": "",
        $this->foto_pro3 = $dadosPro->foto_pro3; // "foto_perfil": "",
        $this->codigo = $dadosPro->codigo;  
        $this->quantidade = $dadosPro->quantidade;  
        $this->ativo = $dadosPro->ativo; // "ativo": 1            
    }
}

