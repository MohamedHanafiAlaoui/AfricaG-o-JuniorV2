<?php
session_start();
include('conect_db.php');

class User {
    private $conn;
    private $email;
    private $password;

    public function __construct($db) {
        $this->conn = $db->connect();
    }

    public function setEmail($email) {
        $this->email = $email; // No need to use mysqli_real_escape_string with prepared statements
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function authenticate() {
        // Prepare the SQL query
        $stmt = $this->conn->prepare("SELECT  Email, Password, id_role FROM `user` WHERE Email = :email");
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        $stmt->execute();

        // Fetch the result as an associative array
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return [
                'id' => $row['id'],
                'email' => $row['Email'],
                'hashed_pass' => $row['Password'],
                'role_id' => $row['id_role']
            ];
        }

        return false;
    }
}


class Auth {
    private $user;

    public function __construct($user) {
        $this->user = $user;
    }

    public function login($input_email, $input_password) {
        $this->user->setEmail($input_email);
        $this->user->setPassword($input_password);

        $user_data = $this->user->authenticate();

        if ($user_data && password_verify($input_password, $user_data['hashed_pass'])) {
            $_SESSION['email'] = $user_data['email'];
            $_SESSION['user_id'] = $user_data['id'];
            $this->redirectBasedOnRole($user_data['role_id']);
        } else {
            $_SESSION['error'] = 'Invalid email or password';
            header('Location: login.php'); // Redirect to login page with an error message
            exit;
        }
    }

    private function redirectBasedOnRole($role_id) {
        if ($role_id == 1) {
            header('Location: user.php');
        } else {
            header('Location: menuutil.php');
        }
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
    $db = new Controller(); // Assuming the Controller class handles the DB connection
    $user = new User($db);
    $auth = new Auth($user);
    $auth->login($_POST['email'], $_POST['password']);
    $db->close();
} else {
    echo 'Please enter both email and password';
}
?>
