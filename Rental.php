<?php

class Rental
{
    /**
     * @var Movie
     */
    private $movie;

    /**
     * @var int
     */
    private $daysRented;

    /**
     * @param Movie $movie
     * @param int $daysRented
     */
    public function __construct(Movie $movie, $daysRented)
    {
        $this->movie = $movie;
        $this->daysRented = $daysRented;
    }

    /**
     * @return Movie
     */
    public function movie()
    {
        return $this->movie;
    }

    /**
     * @return int
     */
    public function daysRented()
    {
        return $this->daysRented;
	}


	/**
     * @var int
     */
	private $rentalAmount;



	/**
     * @return int
     */
	public function rentalPrice()
	{
            $rentalAmount = 0;

            switch($this->movie()->priceCode()) {
				case Movie::REGULAR:
					    $rentalAmount += 2;
					    if ($this->daysRented() > 2) {
					        $rentalAmount += ($this->daysRented() - 2) * 1.5;
					    }
					    break;
                case Movie::NEW_RELEASE:
                    $rentalAmount += $this->daysRented() * 3;
                    break;
                case Movie::CHILDRENS:
                    $rentalAmount += 1.5;
                    if ($this->daysRented() > 3) {
                        $rentalAmount += ($this->daysRented() - 3) * 1.5;
                    }
                    break;
			}
			return $rentalAmount;
	}

}
