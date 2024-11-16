<?php
class User {
    public $name;
    public $email;
    public $password;

    public function __construct($name, $email, $password) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public static function check_password($password) {
        $lengthCheck = strlen($password) >= 12;
        $uppercaseCheck = preg_match('/[A-Z]/', $password);
        $lowercaseCheck = preg_match('/[a-z]/', $password);
        $specialCharCheck = preg_match('/[\W_]/', $password);

        return $lengthCheck && $uppercaseCheck && $lowercaseCheck && $specialCharCheck;
    }

    public static function validate_email($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function copy_with($name = null, $email = null, $password = null) {
        return new User(
            $name ?? $this->name,
            $email ?? $this->email,
            $password ?? $this->password
        );
    }
}


// Test Password Validation
$password = "Strong@Password1";
echo "Password Valid: " . (User::check_password($password) ? "Yes\n" : "No\n"); 

$password = "weakpass";
echo "Password Valid: " . (User::check_password($password) ? "Yes\n" : "No\n"); 

// Test Email Validation
$email = "user@example.com";
echo "Email Valid: " . (User::validate_email($email) ? "Yes\n" : "No\n"); 

$email = "invalid-email";
echo "Email Valid: " . (User::validate_email($email) ? "Yes\n" : "No\n"); 

$user1 = new User("John Doe", "john@example.com", "Secure@Pass123");
$user2 = $user1->copy_with(name: "Jane Doe");

echo "Original User: {$user1->name}, {$user1->email}\n"; 
echo "New User: {$user2->name}, {$user2->email}\n"; 
?>