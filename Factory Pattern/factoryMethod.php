<?php

echo "Factory Method Pattern \n";

abstract class Pizza {
    protected $name;
    protected $dough;
    protected $sauce;
    protected $toppings;

    abstract public function prepare();
    abstract public function bake();
    abstract public function cut();
    abstract public function box();
}

class NYStyleCheesePizza extends Pizza {
    public function __construct()
    {
        $this->name = 'cheese NY pizza';
    }

    public function prepare()
    {
        echo "prepare NY style cheese pizza {$this->name} \n";
    }

    public function bake()
    {
        echo "baking NY style cheese pizza \n";
    }

    public function cut()
    {
        echo "cutting NY style cheese pizza \n";
    }

    public function box()
    {
        echo "boxing NY style cheese pizza \n";
    }
}

class ChicagoStyleCheesePizza extends Pizza {
    public function prepare()
    {
        echo "prepare Chicago style cheese pizza \n";
    }

    public function bake()
    {
        echo "baking Chicago style cheese pizza \n";
    }

    public function cut()
    {
        echo "cutting Chicago style cheese pizza \n";
    }

    public function box()
    {
        echo "boxing Chicago style cheese pizza \n";
    }
}


class NYStyleVeggiePizza extends Pizza {
    public function prepare()
    {
        echo "prepare NY style Veggie pizza \n";
    }

    public function bake()
    {
        echo "baking NY style Veggie pizza \n";
    }

    public function cut()
    {
        echo "cutting NY style Veggie pizza \n";
    }

    public function box()
    {
        echo "boxing NY style Veggie pizza \n";
    }
}

class ChicagoStyleVeggiePizza extends Pizza {
    public function prepare()
    {
        echo "prepare Chicago style Veggie pizza \n";
    }

    public function bake()
    {
        echo "baking Chicago style Veggie pizza \n";
    }

    public function cut()
    {
        echo "cutting Chicago style Veggie pizza \n";
    }

    public function box()
    {
        echo "boxing Chicago style Veggie pizza \n";
    }
}


// pizza store 
// contains abstact create method 
abstract class PizzaStore 
{
    public function orderPizza(String $type)
    {
        $pizza = $this->createPizza($type);

        $pizza->prepare();
        $pizza->bake();
        $pizza->cut();
        $pizza->box();
        return $pizza;
    }

    abstract public function createPizza(String $type): Pizza;
}

class NYPizzaStore extends PizzaStore {
    public function createPizza(String $type): Pizza
     {
        if($type == 'cheese') {
            return new NYStyleCheesePizza();
        } else if ($type == 'veggie') {
            return new NYStyleVeggiePizza();
        } else return null;
    }
}

class ChicagoPizzaStore extends PizzaStore {
    public function createPizza(String $type): Pizza
    {
        if($type == 'cheese') {
            return new ChicagoStyleCheesePizza();
        } else if ($type == 'veggie') {
            return new ChicagoStyleVeggiePizza();
        } else return null;
    }
}

$store = new NYPizzaStore();
$store->orderPizza('cheese');


$store = new ChicagoPizzaStore();
$store->orderPizza('veggie');
