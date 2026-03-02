<?php 
    class Pagination{
        private $pdo;
        private $table;
        private $total_records;
        private $limit;

    public function __construct(PDO $user_pdo, string $user_table, int $user_limit) {
        $this->pdo = $user_pdo;
        $this->table = $user_table;
        $this->limit = $user_limit;
        $this->set_total_records();
    }
    
    public function set_total_records(){
        $stmt = $this->pdo->prepare("SELECT `id` FROM $this->table");
        $stmt->execute();
        $this->total_records = $stmt->rowCount();
    }

    public function current_page(){
        if (isset($_GET['page'])) {
            return (int)$_GET['page'];
        }
        else {
            return 1;
        }
    }

    public function get_data(){
        $start = 0;
        if($this->current_page() > 1){
            $start = ($this->current_page() * $this->limit) - $this->limit;
        }
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table LIMIT $start, $this->limit");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_pagination_number(){
        return ceil($this->total_records / $this->limit);
    }
}
?>