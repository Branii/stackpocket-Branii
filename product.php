class GetProducts {

    private PDO $con;
    /**
     * Summary of __construct
     * @param Database $database
     */
    public function __construct(Database $database) {
        $this->con = $database->shout();
    }

    /**
     * Summary of fetchProducts
     * @return array
     */
    public function fetchProducts() : array {
        $sql = "SELECT * FROM products";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    /**
     * Summary of fetchProductsId
     * @return array
     */
    public function fetchProductsId($id) : array {
        $sql = "SELECT * FROM products WHERE pid = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(1,$id);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    /**
     * Summary of addNewProduct
     * @param mixed $name
     * @param mixed $size
     * @param mixed $available
     * @return string
     */
    public function addNewProduct($name,$size,$available) : void {
        $sql = "INSERT INTO products (name,size,is_available)VALUES(?,?,?)";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(1,$name);
        $stmt->bindParam(2,$size);
        $stmt->bindParam(3,$available);
        $stmt->execute();
        echo json_encode(["Message" => "New product added"]);
    }

}