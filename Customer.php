<?php

class Customer
{
    /**
     * @var string
     */
	private $name;

    /**
     * @var Rental[]
     */
    private $rentals;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
		$this->name = $name;
		$this->rentals = [];
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @param Rental $rental
     */
    public function addRental(Rental $rental)
    {
        $this->rentals[] = $rental;
	}

	/**
     * @var int
     */
	private $totalAmount;


	/**
     * @return int
     */
	//  FUNCTION TO RETURN AMOUNT CUSTOMER OWES FOR ALL RENTALS
	 public function amtOwed ()
	 {
		 $totalAmount = 0;
		 foreach ($this->rentals as $rental) {
            $totalAmount += $rental->rentalPrice();
		}
		return $totalAmount;
	 }


	 /**
     * @var int
     */
	public $frequentRenterPoints;

	/**
     * @return int
     */
	//  FUNCTION TO RETURN ALL CUSTOMER FREQUENT RENTER POINTS
	 public function getPoints ()
	 {
		$frequentRenterPoints = 0;
		foreach ($this->rentals as $rental) {
		$frequentRenterPoints++;

		if ($rental->movie()->priceCode() === Movie::NEW_RELEASE && $rental->daysRented() > 1) {
			$frequentRenterPoints++;
		}
		}
		return $frequentRenterPoints;
	 }


    /**
     * @return string
     */
    public function statement()
    {
        $result = 'Rental Record for ' . $this->name() . PHP_EOL;

        foreach ($this->rentals as $rental) {
            $result .= "\t" . str_pad($rental->movie()->name(), 30, ' ', STR_PAD_RIGHT) . "\t" . $rental->rentalPrice() . PHP_EOL;
        }

        $result .= 'Amount owed is ' . $this->amtOwed() . PHP_EOL;
        $result .= 'You earned ' . $this->getPoints() . ' frequent renter points' . PHP_EOL;

        return $result;
	}


	/**
     * @return template
     */
	public function htmlStatement()
	{
		include("template-statement.php");
	}


	/**
     * @var int
     */
	private $rentalAmount;

	// /**
    //  * @return int
    //  */
	// public function rentalPrice()
	// {
	// 	$rentalAmount = 0;
	// 	foreach ($this->rentals as $rental) {


    //         switch($rental->movie()->priceCode()) {
    //             case Movie::REGULAR:
    //                 $rentalAmount += 2;
    //                 if ($rental->daysRented() > 2) {
    //                     $rentalAmount += ($rental->daysRented() - 2) * 1.5;
    //                 }
    //                 break;
    //             case Movie::NEW_RELEASE:
    //                 $rentalAmount += $rental->daysRented() * 3;
    //                 break;
    //             case Movie::CHILDRENS:
    //                 $rentalAmount += 1.5;
    //                 if ($rental->daysRented() > 3) {
    //                     $rentalAmount += ($rental->daysRented() - 3) * 1.5;
    //                 }
    //                 break;
	// 		}
	// 	}
	// 	return $rentalAmount;
	// }

}
