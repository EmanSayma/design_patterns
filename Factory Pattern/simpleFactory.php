<?php

echo "Hello world";

abstract class Pizza {
    public function prepare(){}
    abstract function bake();
    abstract function cut();
    abstract function box();
}
class CheesePizza extends Pizza {
     function prepare() {}
     function bake() {}
     function cut() {}
     function box() {}
}
class GreekPizza extends Pizza {
    function prepare() {}
    function bake() {}
    function cut() {}
    function box() {}
}

class PizzaStore 
{
    private $factory;
    
    public function __construct(SimplePizzaFactory $factory)
    {
        $this->factory = $factory;
    }

    public function orderPizza(String $type) 
    {
        $pizza = $this->factory->createPizza($type);

        $pizza->prepare();
        $pizza->bake();
        $pizza->cut();
        $pizza->box();
        
        return $pizza;
    }
}


class SimplePizzaFactory {
    private $pizza;
    
    public function __construct(Pizza $pizza)
    {
        $this->pizza = $pizza;

    }
    
    public function createPizza(String $type): Pizza
    {
        if ($type == 'cheese') {
            $this->pizza = new CheesePizza();
        } else if ($type == 'greek') {
            $this->pizza = new GreekPizza();
        }

        return $this->pizza;
    }
}
