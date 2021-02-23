<?php
// 策略模式 strategy

interface FlyBehavior{
    public function fly();
}

class FlyWithWings implements FlyBehavior{
    public function fly()
    {
        echo 'fly with wings ';
    }
}
class FlyWithNo implements FlyBehavior{
    public function fly()
    {
        echo 'fly with no wings';
    }
}

class Duck{
    private $FlyBehavior;

    public function performFly()
    {
        $this->FlyBehavior->fly();
    }

    public function setFlyBehavior(FlyBehavior $behavior)
    {
        $this->FlyBehavior = $behavior;
    }
}

class RubberDuck extends Duck{

}

$duck = new RubberDuck();
$duck->setFlyBehavior(new FlyWithWings());
$duck->performFly();

$duck->setFlyBehavior(new FlyWithNo());
$duck->performFly();