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

    public function next_page(){
        if ($this->current_page() < $this->get_pagination_number()) {
            return ($this->current_page() + 1);
        }
        else {
            return ($this->get_pagination_number());
        }
    }

    public function prev_page(){
        if ($this->current_page() > 1) {
            return ($this->current_page() - 1);
        }
        else {
            return 1;
        }
    }

    public function is_active_class($page){
        return ($page == $this->current_page()) ? 'active' : '';
    }

    public function get_data(){
        $start = 0;
        if($this->current_page() > 1){
            $start = ($this->current_page() * $this->limit) - $this->limit;
        }
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table LIMIT $start, $this->limit");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function get_pagination_number(){
        return max(1, ceil($this->total_records / $this->limit));
    }

    public function is_showable($num){
        if($this->get_pagination_number() < 4 || $this->current_page() == $num) {
            return true;
        }
        if( ($this->current_page() - 2) <= $num && ($this->current_page() + 2) >= $num) {
            return true;
        }
    }
}
?>