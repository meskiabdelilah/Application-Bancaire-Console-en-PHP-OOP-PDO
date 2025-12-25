<!-- كل الكلاسات غادي تورث منو -->\
<?php
require_once __DIR__ . '/../config/database.php';
abstract class baseModel{

    protected $db;
    public function __construct()
    {
        $this-> db = database::getInstance()->getConnection();
    }
    abstract public function save();
    abstract public function delete();
    abstract public  static function find($email);
    abstract public static function all();
}