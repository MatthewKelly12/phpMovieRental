<!DOCTYPE html>
<html>
<body>
<h1>Rental Record for <em><?= $this->name()  ?></em></h1>
<ul>
    <?php  foreach ($this->rentals as $rental) : ?>
    <li><?= $rental->movie()->name() ?> - <?= $rental->rentalPrice() ?></li>
    <?php endforeach; ?>
<ul>
<p>Amount owed is <em><?= $this->amtOwed() ?></em></p>
<p>You earned <em><?= $this->getPoints() ?></em> frequent renter points</p>
</body>
</html>
