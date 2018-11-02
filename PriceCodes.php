<?php

class PriceCodes
{
    /**
     * @var array
     */
	public $priceCodes = [];

	// ADDED NAME FOR PRICE CODE
	/**
     * @var string
     */
	private $name;

	 /**
     * @var int
     */
	private $price;


    /**
     * @param string $name
     * @param int $price
     */
    public function __construct($name, $price)
    {
		$this->name = $name;
		$this->price = $price;

		if(isset($this->priceCodes[$name])){
            return true;
        } else {
            return false;
        }

        // require_once('config.php');
        // $this->priceCodes = $priceCode;
    }

    /**
     * @return int
     */
    public function getPriceCodeName()
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function changePrice($price)
    {
		$this->price = $price;
		return true;
	}

	/**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return bool
     */
    public function removePriceCode()
    {
        unset($this->priceCodes[$this->name]);
        if(!isset($this->priceCodes[$this->name])){
            return true;
        } else {
            return false;
        }
	}

}
