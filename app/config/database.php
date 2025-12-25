 <!-- الاتصال بـ PDO -->
 <?php

    class  database
    {
        private static $Instance = null;
        private PDO $pdo;
        private function __construct()
        {
            try {
                $this->pdo = new PDO('mysql:host=localhost;dbname=app_bancaire', 'root', '');
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            } catch (PDOException $err) {
                die($err->getMessage());
            }
        }

        public static function getInstance()
        {
            if (self::$Instance === null) {
                self::$Instance = new database();
            }
            return self::$Instance;
        }

        public function getConnection()
        {
            return $this->pdo;
        }
    }
