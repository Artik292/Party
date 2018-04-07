<?php

session_start();
unset($_SESSION['admin_access']);

echo $_ENV['pass'];
require 'vendor/autoload.php';

$app = new \atk4\ui\App('Запись на тусовку');
$app->initLayout('Centered');

//require 'connecting.php';

{$form = $app->layout->add('Form');
$form->setModel(new Friend($db));
$form->onSubmit(function($form) {
  $form->model->save();
  $form->success('Record updated');
  return new \atk4\ui\jsExpression('document.location = "index.php" ');
 });}

$app->add(['ui'=>'divider']);

{$grid = $app->layout->add('Grid');
$grid->setModel(new Friend($db));
$grid->addQuickSearch(['name','surname','phone_number','age']);}

$app->add(['ui'=>'divider']);

$app->layout->add(['Button','Admin','violet','icon'=>'tasks'])
  ->link(['check']);
