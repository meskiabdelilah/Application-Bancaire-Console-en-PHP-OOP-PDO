<!-- كل الكلاسات غادي تورث منو -->\
<?php
abstract class baseModel{

    abstract public function save();
    abstract public function delete();
    abstract public function find($id);
    abstract public function all();
}