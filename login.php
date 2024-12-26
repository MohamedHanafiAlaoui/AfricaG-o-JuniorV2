<?php
class User {
    private $conn;
    private $email;
    private $password;
    private $firstName;
    private $lastName;
    private $roleId;

    public function __construct($db) {
        $this->conn = $db->connect();
    }

    public function setEmail($email) {
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    public function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function setRoleId($roleId) {
        $this->roleId = $roleId;
    }

    public function register() {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format!";
        }
    
        $stmt = $this->conn->prepare("INSERT INTO user (Email, Password, FirstName, LastName, id_role) VALUES (:email, :password, :firstName, :lastName, :roleId)");
        
      
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':firstName', $this->firstName);
        $stmt->bindParam(':lastName', $this->lastName);
        $stmt->bindParam(':roleId', $this->roleId);
    
        if ($stmt->execute()) {
            return "New record inserted successfully!";
        } else {
            return "Error: " . $stmt->errorInfo()[2];  
        }
    }
    
}
?>