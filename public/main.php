<!-- واجهة المستخدم / CLI menu -->
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once '../app/config/database.php'; 
require_once '../app/models/client.php';
require_once '../app/models/Compte.php';
require_once '../app/models/CompteCourant.php';
require_once '../app/models/CompteEpargne.php';
require_once '../app/models/baseModel.php';

echo "<h2>--- Bank System Test ---</h2>";
