<?php

class CabinetController{

public function actionIndex(){

    $userId = User::checkLogged();

 
    $user = User::getUserById($userId);

require_once(ROOT.'/views/cabinet/index.php');




    return true;
}


public function actionEdit()
{
 
    $userId = User::checkLogged();

    $user = User::getUserById($userId);

    $name  = $user['name'];
    $password = $user['password'];

    $result = false;

    if (isset($_POST['submit'])) {

        $name      = $_POST['name'];
        $password      = $_POST['password'];

        $errors = false;

        if (!User::checkName($name)) {
            $errors[] = "Ім'я повинно бути не менше 3-х символів";
        }

        if (!User::checkPassword($password)) {
            $errors[] = "Пароль не має бути коротшим 6 символів";
        }

        if ($errors == false) {
            $result = User::edit($userId, $name, $password);
        }
    }

   
    require_once (ROOT . '/views/cabinet/edit.php');
    return true;
}

// /**
//  * Action для сторінки зміни паролю
//  */
// public function actionEditPassword()
// {
//     // Отримуємо ідентифікатор користувача із сесії
//     $userId = User::checkLogged();

//     // Отримуємо інформацію про користувача із бази даних
//     $user = User::getUserById($userId);

//     $result = false;

//     if (isset($_POST['submit'])) {

//         $password = trim($_POST['password']);
//         $password_repeat = trim($_POST['password_repeat']);

//         $errors = false;

//         if (!User::checkPassword($password)) {
//             $errors[] = "Пароль повинен бути не менше 6 символів";
//         }

//         if ($password !== $password_repeat) {
//             $errors[] = "Ви не вірно повторили пароль";
//         }

//         if ($errors == false) {
//             $result = User::editUserPassword($userId, $password);
//         }
//     }

//     // Підключаємо view
//     require_once (ROOT . '/../app/views/cabinet/editpassword.php');
//     return true;
// }

// /**
//  * Action для сторінки перегляду історій замовлень
//  */
// public function actionHistory()
// {
//     // Отримуємо перелік замовлень
//     $ordersList = Order::getOrdersList();

//     // Підключаємо view
//     require_once (ROOT . '/../app/views/cabinet/history.php');
//     return true;
// }

// /**
//  * Action для сторінки з переглядом деталей замовлення
//  */
// public function actionView($id)
// {
//     // Отримуємо дані про замовлення
//     $order = Order::getOrderById($id);

//     // Отримуємо масив з ідентифікаторами і кількістю товарів
//     $productsQuantity = json_decode($order['products'], true);

//     // Отримуємо масив з ідентифікаторами товарів
//     $productsIds = array_keys($productsQuantity);

//     // Отримуємо список товарів в замовленні
//     $products = Product::getProductsByIds($productsIds);

//     // Рахуємо загальну вартість замовлення
//     $totalPrice = 0;
//     foreach ($products as $item) {
//         $totalPrice = $totalPrice + $item['price'];
//     }

//     // Підключаємо view
//     require_once(ROOT . '/../app/views/cabinet/view.php');
//     return true;
// }
}