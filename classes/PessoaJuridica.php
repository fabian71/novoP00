<?php

class PessoaJuridica implements ClienteInterface 
{	

	private $id;
	private $nome;
    private $razaoSocial;
    private $cnpj;
    private $email;
	private $telefone;
	private $isJuridica;

	public function __construct($id,$nome,$razaoSocial,$telefone)
	{
		$this->setId($id)
			 ->setNome($nome)
			 ->setRazaoSocial($razaoSocial)
			 ->setTelefone($telefone)
			 ;
	}

	public function isJuridica()
	{
		$this-> isJuridica = true;
		return true;
	}

	public function getIsJuridica()
	{
	    return $this->isJuridica;
	}
	
	public function setIsJuridica($isJuridica)
	{
	    $this->isJuridica = $isJuridica;
	    return $this;
	}	

	public function getStars()
	{
	    return $this->stars;
	}
	
	public function setStars($stars)
	{
	    $this->stars = $stars;
	    return $this;
	}

    public function getEnderecos()
    {
        return $this->enderecos;
    }    

    public function addEndereco(Endereco $endereco)
    {
        $this->enderecos[] = $endereco;
        
        return $this;
    }


    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

	public function getNome()
	{
	    return $this->nome;
	}
	
	public function setNome($nome)
	{
	    $this->nome = $nome;
	    return $this;
	}
    public function getRazaoSocial()
    {
        return $this->razaoSocial;
    }
    
    public function setRazaoSocial($razaoSocial)
    {
        $this->razaoSocial = $razaoSocial;
        return $this;
    }
    public function getCnpj()
    {
        return $this->cnpj;
    }
    
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    public function getTelefone()
    {
        return $this->telefone;
    }
    
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
        return $this;
    }


}