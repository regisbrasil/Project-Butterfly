<?php

namespace Source\Models;

class Address
{
		private $idUser;
    private $country;
    private $cep;
    private $street;
    private $number;

    /**
     * @param $country
     * @param $cep
     * @param $street
     * @param $number
     */
    public function __construct(
      string $country = NULL,
      string $cep = NULL,
      string $street = NULL,
      int $number = NULL
  )
  {
      $this->country = $country;
      $this->cep = $cep;
      $this->street = $street;
      $this->number = $number;
  }

	/**
	 * @return mixed
	 */
	function getCountry() {
		return $this->country;
	}
	
	/**
	 * @param mixed $country 
	 * @return Address
	 */
	function setCountry($country): self {
		$this->country = $country;
		return $this;
	}
  	/**
	 * @return mixed
	 */
	function getCep() {
		return $this->cep;
	}
	
	/**
	 * @param mixed $street 
	 * @return Address
	 */
	function setCep($cep): self {
		$this->cep = $cep;
		return $this;
	}
	/**
	 * @return mixed
	 */
	function getStreet() {
		return $this->street;
	}
	
	/**
	 * @param mixed $street 
	 * @return Address
	 */
	function setStreet($street): self {
		$this->street = $street;
		return $this;
	}
	/**
	 * @return mixed
	 */
	function getNumber() {
		return $this->number;
	}
	
	/**
	 * @param mixed $number 
	 * @return Address
	 */
	function setNumber($number): self {
		$this->number = $number;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getIdUser() {
		return $this->idUser;
	}
	
	/**
	 * @param mixed $idUser 
	 * @return self
	 */
	public function setIdUser($idUser): self {
		$this->idUser = $idUser;
		return $this;
	}
}