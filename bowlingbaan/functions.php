<?php
        public function fetch(){
            $data = null;

            $query = "SELECT * FROM records";
            if ($sql = $this->conn->query($query)) {
                while ($row = mysqli_fetch_assoc($sql)) {
                    $data[] = $row;
                }
            }
            return $data;
        }

        public function delete($id){

            $query = "DELETE FROM records where id = '$id'";
            if ($sql = $this->conn->query($query)) {
                return true;
            }else{
                return false;
            }
        }

        public function fetch_single($id){

            $data = null;

            $query = "SELECT * FROM records WHERE id = '$id'";
            if ($sql = $this->conn->query($query)) {
                while ($row = $sql->fetch_assoc()) {
                    $data = $row;
                }
            }
            return $data;
        }

        public function edit($id){

            $data = null;

            $query = "SELECT * FROM records WHERE id = '$id'";
            if ($sql = $this->conn->query($query)) {
                while($row = $sql->fetch_assoc()){
                    $data = $row;
                }
            }
            return $data;
        }

        public function update($data){

            $query = "UPDATE records SET name='$data[name]', email='$data[email]', mobile='$data[mobile]', address='$data[address]' WHERE id='$data[id] '";

            if ($sql = $this->conn->query($query)) {
                return true;
            }else{
                return false;
            }

            function selectAll($pdo, $query){
  try{
      $stmt = $pdo->prepare($query);
      $stmt->execute();
      return $stmt;
  } catch(PDOException $e){
      echo "Error: ".$e->getMessage();
  }
}
?>