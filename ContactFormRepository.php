<?php
include_once "databaseConnection.php";

class ContactFormRepository
{
    private $conn;

    public function __construct()
    {
        $dbConnection = new DatabaseConnection();
        $this->conn = $dbConnection->startConnection();
    }

    public function getAllContactFormData()
    {
        $sql = "SELECT * FROM contact_form_data";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getContactFormDataById($id)
    {
        $sql = "SELECT * FROM contact_form_data WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateContactFormData($id, $data)
    {
        $sql = "UPDATE contact_form_data SET first_name = ?, last_name = ?, fiance_first_name = ?, fiance_last_name = ?, email = ?, phone = ?, event_date = ?, event_type = ?, event_location = ?, guests = ?, love_story = ?, contact_method = ?, how_found = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(1, $data['first_name']);
        $stmt->bindParam(2, $data['last_name']);
        $stmt->bindParam(3, $data['fiance_first_name']);
        $stmt->bindParam(4, $data['fiance_last_name']);
        $stmt->bindParam(5, $data['email']);
        $stmt->bindParam(6, $data['phone']);
        $stmt->bindParam(7, $data['event_date']);
        $stmt->bindParam(8, $data['event_type']);
        $stmt->bindParam(9, $data['event_location']);
        $stmt->bindParam(10, $data['guests']);
        $stmt->bindParam(11, $data['love_story']);
        $stmt->bindParam(12, $data['contact_method']);
        $stmt->bindParam(13, $data['how_found']);
        $stmt->bindParam(14, $id);

        return $stmt->execute();
    }

    public function deleteContactFormData($id)
    {
        $sql = "DELETE FROM contact_form_data WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>