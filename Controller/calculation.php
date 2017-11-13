<?php
/**
 * Created by PhpStorm.
 * User: AndersWin
 * Date: 09-11-2017
 * Time: 10:23
 */

require_once '../vendor/autoload.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('../Views');
$twig = new Twig_Environment($loader, array('auto_reload'=>true));
$template= $twig->loadTemplate('index.html.twig');



if (isset($_REQUEST['a']))
{
    $a = $_REQUEST['a'];
    $b = $_REQUEST['b'];
    $operatorRequested = $_REQUEST['operatorInput'];

    switch ($operatorRequested) {
        case "+":
            $result = $a + $b;
            break;
        case "-":
            $result = $a - $b;
            break;
        case "*":
            $result = $a * $b;
            break;
        case "/":
            $result = $a / $b;
            break;
        default:
            $result = 0;
    }


    echo $template->render(array('a' => $a, 'b' => $b, 'operator' => $operatorRequested, 'result' => $result));
}
else
    echo $template->render(array('a' => 0, 'b' => 0, 'operator' => '+', 'result' => 0));



?>


