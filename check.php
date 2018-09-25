<?php

session_start();

require 'vendor/autoload.php';

$app = new \atk4\ui\App('Проверка');
$app->initLayout('Centered');

$check = new \atk4\data\Model(new \atk4\data\Persistence_Array($a));
$check->addField('password',['type'=>'password','required'=>TRUE]);

$form = $app->layout->add('Form');
$form->setModel($check);
$pass = $_ENV['pass'];
$form->onSubmit(function($form) {
  if ($form->model['password'] == $pass) {
      $_SESSION['admin_access'] = 'fnupaw39r23rvwefk91248';
      return new \atk4\ui\jsExpression('document.location = "admin.php" ');
  } else {
      //return new \atk4\ui\jsExpression('document.location = "index.php" ');
      return new \atk4\ui\jsExpression('document.location = "admin.php" ');
  }
 });
