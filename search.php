  public function searchProduct(String $query) : Array | String{
            $search = "%$query%";
            $sql = "SELECT * FROM product_tbl WHERE productname LIKE ? OR 
            category LIKE ? OR price LIKE ? OR brand LIKE ? LIMIT 7";
            $stmt = (new Database)->openlink()->prepare($sql);
            $stmt->bindParam(1,$search);
            $stmt->bindParam(2,$search);
            $stmt->bindParam(3,$search);
            $stmt->bindParam(4,$search);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return ($data);
        }