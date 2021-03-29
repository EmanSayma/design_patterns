<?php

echo "Abstract Method Pattern \n";

//idea is pizzaStore, abstract pizza, pizza types : cheese - veggie ...
// ingrediants factory 

abstract class Dough {}
class ThinCrustDough extends Dough { 
    public function __construct()
    {
        echo "this is NY thin crust Dough style \n";
    }
}
class CrustDough extends Dough {

    public function __construct()
    {
        echo "this is Chicago crust Dough style \n";
    }
}

abstract class Sauce {}
class MarinaSauce extends Sauce {
    public function __construct()
    {
        echo "this is NY Marina Sauce style \n";
    }
}
class TomatoSauce extends Sauce {}

abstract class Cheese {}
class RegannoCheese extends Cheese {
    public function __construct()
    {
        echo "this is NY Reganno Cheese style \n";
    }
}
class MozzorillaCheese extends Cheese {}

abstract class Pepperoni {}
class SlicedPepperoni extends Pepperoni {}
class ChiliPepperoni extends Pepperoni {
    public function __construct()
    {
        echo "this is Chicago pepperoni style \n";
    }
}


abstract class Clam {}
class FreshClams extends Clam {}
class FrozenClams extends Clam {
    public function __construct()
    {
        echo "this is Chicago frozen clams style \n";
    }
}


abstract class PizzaStore {
     public function orderPizza(String $type)
     {
        $pizza = $this->createPizza($type);

        $pizza->prepare();
        $pizza->bake();
        $pizza->cut();
        $pizza->box();
        return $pizza;
     }

     abstract function createPizza(String $type): Pizza;
}

class NYPizzaStore extends PizzaStore {
    
    
    public function createPizza(String $type): Pizza
    {
        $pizza = null;
        $pizzaIngrediantFactory = new NYPizzaIngrediantFactory();
        if ($type == 'cheese') {
            $pizza = new CheesePizza($pizzaIngrediantFactory);
            $pizza->setName('NY Pizza Store: Cheese Pizza here ..');
        }
        return $pizza;
    }
}

class ChicagoPizzaStore extends PizzaStore {
    public function createPizza(String $type): Pizza
    {
        $pizza = null;
        $pizzaIngrediantFactory = new ChicagoPizzaIngrediantFactory();
        if ($type == 'clam') {
            $pizza = new ClamPizza($pizzaIngrediantFactory);
            $pizza->setName('Chicago Pizza Store: Clam Pizza here ..');
        }
        return $pizza;
    }
}

abstract class Pizza {
    protected $name;
    protected $dough;
    protected $sauce;
    protected $cheese;
    protected $toppings;

    abstract public function prepare();
    public function bake() { echo "baking pizza \n"; }
    public function cut() { echo "cutting pizza \n"; }
    public function box(){ echo "boxing pizza \n"; }

    public function setName($name) { echo "{$name} \n"; }
}

class CheesePizza extends Pizza {
    protected $pizzaIngrediantFactory;

    public function __construct(PizzaIngrediantFactory $pizzaIngrediantFactory)
    {
        $this->pizzaIngrediantFactory = $pizzaIngrediantFactory;
    }

    public function prepare()
    {
        $this->dough = $this->pizzaIngrediantFactory->creatDough();
        $this->sauce = $this->pizzaIngrediantFactory->createSauce();
        $this->cheese = $this->pizzaIngrediantFactory->createCheese();
    }
}

class ClamPizza extends Pizza {
    protected $pizzaIngrediantFactory;

    public function __construct(PizzaIngrediantFactory $pizzaIngrediantFactory)
    {
        $this->pizzaIngrediantFactory = $pizzaIngrediantFactory;
    }

    public function prepare()
    {
        $this->dough = $this->pizzaIngrediantFactory->creatDough();
        $this->sauce = $this->pizzaIngrediantFactory->createPepperoni();
        $this->cheese = $this->pizzaIngrediantFactory->createClam();
    }
}

interface PizzaIngrediantFactory {
    public function creatDough();
    public function createSauce();
    public function createCheese();
    public function createPepperoni();
    public function createClam();
}

class NYPizzaIngrediantFactory implements PizzaIngrediantFactory {
    public function creatDough() { return new ThinCrustDough(); }
    public function createSauce() { return new MarinaSauce(); }
    public function createCheese() { return new RegannoCheese(); }
    public function createPepperoni() { return new SlicedPepperoni(); }
    public function createClam() { return new FreshClams(); }
}

class ChicagoPizzaIngrediantFactory implements PizzaIngrediantFactory {
    public function creatDough() { return new CrustDough(); }
    public function createSauce() { return new TomatoSauce(); }
    public function createCheese() { return new MozzorillaCheese(); }
    public function createPepperoni() { return new ChiliPepperoni(); }
    public function createClam() { return new FrozenClams(); }
}






$store = new NYPizzaStore();
$store->orderPizza('cheese');

$store2 = new ChicagoPizzaStore();
$store2->orderPizza('clam');