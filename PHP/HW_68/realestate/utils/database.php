  <?php

    class Database {
        
       private $cs; 
       private $user; 
       private $password;
       private $options;
       private $db;
       private static $instance = null;

       private function __construct(){ 
           $this->cs = "mysql:host=localhost;dbname=php";
           $this->user = "test";
           $this->password = "test";

           try {
            $this->options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            $this->db = new PDO($this->cs, $this->user, $this->password, $this->options);
            } catch (PDOException $e) {
                $error = "Something went wrong " . $e->getMessage();
            }
           
       }

        public function getDb(){
            return $this->db;
       }

       public static function getInstance(){
           if(self::$instance === null){
               self::$instance = new Database();
           }
           return self::$instance;
       }

           
    }

?>