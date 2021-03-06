<?php
// 观察者模式

/* 
观察者接口
*/

interface InterfaceObserver
{
    function onListen($sender, $args);
    function getObserverName();
}

/* 
可被观察者接口
 */
interface InterfaceObservable
{
    function addObserver($observer);
    function removeObserver($name);
}

/* 
观察者抽象类
 */
abstract class Observer implements InterfaceObserver
{
    protected $name;
    function getObserverName()
    {
        return $this->name;
    }
    function onListen($sender, $args)
    {
    }
}

// 可被观察类
abstract class Observable implements InterfaceObservable
{
    protected $observers = array();
    function addObserver($observer)
    {
        if ($observer instanceof InterfaceObserver) {
            $this->observers[] = $observer;
        }
    }
    function removeObserver($name)
    {
        foreach ($this->observers as $index => $observer) {
            if ($observer->getObserverName() === $name) {
                array_splice($this->observers, $index, 1);
                return;
            }
        }
    }
}
// 模拟一个可以被观察的类
class A extends Observable
{
    public function addListener($listener)
    {
        foreach ($this->observers as $observer) {
            $observer->onListen($this, $listener);
        }
    }
}
// 模拟一个观察者类
class B extends Observer
{
    protected $name = 'B';
    public function onListen($sender, $args)
    {
        var_dump($sender);
        echo '<br>';
        var_dump($args);
        echo "<br>";
    }
}
// 模拟另外一个观察者类
class C extends Observer
{
    protected $name = 'C';
    public function onListen($sender, $args)
    {
        var_dump($sender);
        echo '<br>';
        var_dump($args);
        echo '<br>';
    }
}
$a = new A();
// 注入观察者
$a->addObserver(new B());
$a->addObserver(new C());

//查看观察者的信息
$a->addListener('D');
//移出观察者
$a->removeObserver('B');
