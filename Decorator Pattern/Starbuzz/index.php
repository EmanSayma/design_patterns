<?php

 abstract class Beverage 
 {
    protected $description = 'Unknown Beverage';

    public function getDescription(): String 
    {
        return $this->description;
    }
    
    public abstract function cost(): float;
 }

 abstract class CondimentDecorator extends Beverage
 {
     protected $beverage;
     public function __construct(Beverage $beverage)
     {
         $this->beverage = $beverage;
     }

     public function getDescription(): String
     {
         return $this->beverage->getDescription();
     }
 }

 class Espresso extends Beverage
 {
     public function __construct()
     {
         $this->description = 'Espresso';
     }
   
     public function cost(): float
     {
         return 1.99;
     }
 }

 class HouseBlend extends Beverage
 {
     public function __construct()
     {
         $this->description = 'House Blend Coffee';
     }

     public function cost(): float
     {
         return .89;
     }
 }

 class Mocha extends CondimentDecorator
 {
    public function getDescription(): string
     {
         $description = parent::getDescription();
         return  $description. ', Mocha';
     }

     public function cost(): float
     {
         return $this->beverage->cost() + .20;
     }
 }


 class Whip extends CondimentDecorator
 {
     public function getDescription(): string
     {
         $description = parent::getDescription();
         return  $description. ', Whip';
     }

     public function cost(): float
     {
         return $this->beverage->cost() + .19;
     }
 }

$beverage = new Espresso();
echo 'Order is: ' . $beverage->getDescription();
echo ' - Cost: ' . $beverage->cost();

$beverage = new Mocha($beverage);
echo ', Order is: ' . $beverage->getDescription();
echo ' - Cost: ' . $beverage->cost();

$beverage = new Whip($beverage);
echo ', Order is: ' . $beverage->getDescription();
echo ' - Cost: ' . $beverage->cost();


$beverage = new HouseBlend();
echo 'Order is: ' . $beverage->getDescription();
echo ' - Cost: ' . $beverage->cost();

$beverage = new Mocha($beverage);
echo ', Order is: ' . $beverage->getDescription();
echo ' - Cost: ' . $beverage->cost();


$beverage = new Mocha($beverage);
echo ', Order is: ' . $beverage->getDescription();
echo ' - Cost: ' . $beverage->cost();

