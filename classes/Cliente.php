<?php

//implements ClienteInterface
class Cliente  implements ClienteInterface 
{

	private $id;
	private $nome;
	private $email;
	private $telefone;
	private $cpf;

	public function __construct($id,$nome,$email,$telefone)
	{
		$this->setId($id)
			 ->setNome($nome)
			 ->setEmail($email)
			 ->setTelefone($telefone)
			 ;
	}


	public function isJuridica()
	{
		$this-> isJuridica = false;
		return false;
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
	public function getEmail()
	{
	    return $this->email;
	}
	
	public function setEmail($email)
	{
	    $this->email = $email;
	    return $this;
	}
	public function getCpf()
	{
	    return $this->cpf;
	}
	
	public function setCpf($cpf)
	{
	    $this->cpf = $cpf;
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