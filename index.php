<?php

require_once('Movie.php');
require_once('Rental.php');
require_once('Customer.php');
require_once('PriceCodes.php');

$rental1 = new Rental(
    new Movie(
        'Back to the Future',
        Movie::CHILDRENS
    ), 4
);

$rental2 = new Rental(
    new Movie(
        'Office Space',
        Movie::REGULAR
    ), 3
);

$rental3 = new Rental(
    new Movie(
        'The Big Lebowski',
        Movie::NEW_RELEASE
    ), 5
);

$priceCodeSale = new PriceCodes('SALE', '2');
$priceCodeSale->changePrice(1);

$customer = new Customer('Joe Schmoe');

$customer2 = new Customer('Kate Moe');

$customer->addRental($rental1);
$customer->addRental($rental2);
$customer->addRental($rental3);

$customer2->addRental($rental1);
$customer2->addRental($rental2);


echo $customer->statement();

echo $customer->htmlStatement();

// echo $customer2->htmlStatement();

// echo $priceCodeSale->getPriceCodeName();
// echo $priceCodeSale->getPrice();

// MAKE SURE CUSTOMER FUNCTIONS ARE WORKING
// echo $customer->amtOwed();

// echo $customer->getPoints();
