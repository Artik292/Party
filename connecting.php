<?php
require 'vendor/autoload.php';

if (isset($_ENV['CLEARDB_DATABASE_URL'])) {
     $db = \atk4\data\Persistence::connect($_ENV['CLEARDB_DATABASE_URL']);
 } else {
     $db = \atk4\data\Persistence::connect('mysql:host=127.0.0.1;dbname=party;charset=utf8', 'root', '');
 }

class Friend extends \atk4\data\Model {
    public $table = 'friends';
    function init() {
        parent::init();
        $this->addField('name',['caption'=>'Имя','required'=>TRUE]);
        $this->addField('surname',['caption'=>'Фамилия','required'=>TRUE]);
        $this->addField('phone_number',['caption'=>'Номер телефона','required'=>TRUE,'default'=>'+371','type'=>'integer']);
        $this->addField('age',['caption'=>'Возраст','required'=>TRUE,'enum'=>['14','15','16','17','18','19']]);
    }
}
