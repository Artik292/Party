<?php

require 'vendor/autoload.php';

session_start();

if (isset($_SESSION['admin_access'])) {
  if (($_SESSION['admin_access']) == 'fnupaw39r23rvwefk91248')
  {
    $app = new \atk4\ui\App('Записи на тусовку');
    $app->initLayout('Admin');

    require 'connecting.php';

    $app->layout->leftMenu->addItem(['Главная страница', 'icon'=>'unordered list'],['index']);

    $crud = $app->layout->add('CRUD');
    $crud->setModel(new Friend($db));
    $crud->addQuickSearch(['name','surname','phone_number','age']);

  } else {
    header('Location: index.php');
  }
} else {
  header('Location: index.php');
}
