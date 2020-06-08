<?php
class Router{
private $routes;

public function __construct(){

    $routesPath=ROOT. '/config/routes.php';
    $this->routes=include($routesPath);

}

private function getURI(){
    if(!empty($_SERVER["REQUEST_URI"])){
        return trim($_SERVER["REQUEST_URI"],'/');
    }
    





}
public function run(){
    // // echo 'Class Router, method run';
    // print_r($this->routes);

    //Отримати стрічку запиту
   $uri=$this->getURI();






//Перевірити наявність запиту в роутах

foreach($this->routes as $uriPattern=>$path){
    // echo "<hr> $uriPattern->$path";
    if(preg_match("~$uriPattern~",$uri)){



    // echo '<br> Де шукаємо: (запит який набрав користувач):' . $uri;
    
    // echo '<br> Що шукаємо: (співпадіння з правила):' . $uriPattern;


    // echo '<br> Хто обробляє:' . $path;

    $iternalRoute=preg_replace("~$uriPattern~",$path,$uri);

    

       //Якщо є співпадіння то визначити який котролер 
    //    і екшен обробляє запит
    $segments=explode('/', $iternalRoute);

// Підключити файл класу-контролера


$controllerName=array_shift($segments) . 'Controller'; 
$actionName='action'. ucfirst(array_shift($segments));


$parameters=$segments;



$controllerFile=ROOT . '/controllers/' . $controllerName . '.php';
 if(file_exists($controllerFile)){

include_once($controllerFile);

}
// echo 'Клас:' . $controllerName. "<br>";
// echo 'Метод:' . $actionName;

// Створити обєкт класу викликати метод (екшен)

$controllerObject = new $controllerName;
//$result = $controllerObject->$actionName($parameters);

$result=call_user_func_array(array($controllerObject,$actionName),$parameters);

if($result!=null) {

break;
}
 



    }
}










   }
}