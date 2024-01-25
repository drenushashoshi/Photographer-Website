<?php

include_once "DatabaseConnection.php";

class PortofolioRepository
{
    private $connection;

    public function __construct()
    {
        $dbConnection = new DatabaseConnection;
        $this->connection = $dbConnection->startConnection();
    }

    public function getAllPortofolios()
    {
        $sql = "SELECT * FROM portofolio";
        $statement = $this->connection->query($sql);

        $portofolios = [];

        if ($statement->rowCount() > 0) {
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $portofolios[] = $row;
            }
        }

        return $portofolios;
    }
    public function getAllCouples()
    {
        $sql = "SELECT * FROM portofolio_couples";
        $statement = $this->connection->query($sql);

        $portofolioCouples = [];

        if ($statement->rowCount() > 0) {
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $portofolioCouples[] = $row;
            }
        }

        return $portofolioCouples;
    }

    public function insertPortofolio($description, $imagePath, $lastEditedBy)
    {
        $conn = $this->connection;

        $sql = "INSERT INTO portofolio (description, image_path, last_edited_by) VALUES (?, ?, ?)";

        try {
            $statement = $conn->prepare($sql);
            $statement->execute([$description, $imagePath, $lastEditedBy]);
            echo "<script>alert('Successfully inserted!')</script>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function updatePortofolio($id, $imagePath, $description, $lastEditedBy)
    {
        $sql = "UPDATE portofolio SET image_path=?, description=?, last_edited_by=? WHERE id=?";

        $statement = $this->connection->prepare($sql);
        $statement->execute([$imagePath, $description, $lastEditedBy, $id]);
    
        if ($statement->errorInfo()[0] !== '00000') {
            echo "<script>alert('Error: " . $statement->errorInfo()[2] . "')</script>";
        } else {
            echo "<script>alert('Portofolio item updated!')</script>";
        }
    }



    public function deletePortofolio($id)
    {
        $sql = "DELETE FROM portofolio WHERE id=?";

        $statement = $this->connection->prepare($sql);
        $statement->execute([$id]);
    }

    public function getPortofolioById($id)
    {
        $sql = "SELECT * FROM portofolio WHERE id='$id'";

        $statement = $this->connection->query($sql);
        $portofolio = $statement->fetch();

        return $portofolio;
    }
}

?>
