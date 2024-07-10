<?php

class User {
    private $id;
    private $name;
    private $email;

    public function __construct($id, $name, $email) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
}

class UserManager {
    private $users = [];

    public function addUser(User $user) {
        $this->users[$user->getId()] = $user;
    }

    public function removeUser($id) {
        if (isset($this->users[$id])) {
            unset($this->users[$id]);
        }
    }

    public function getUser($id) {
        if (isset($this->users[$id])) {
            return $this->users[$id];
        }
        return null;
    }

    public function getAllUsers() {
        return $this->users;
    }
}

// 使用示例
$userManager = new UserManager();

// 添加用户
$user1 = new User(1, "Alice", "alice@example.com");
$user2 = new User(2, "Bob", "bob@example.com");
$userManager->addUser($user1);
$userManager->addUser($user2);

// 获取所有用户
$users = $userManager->getAllUsers();
foreach ($users as $user) {
    echo "ID: " . $user->getId() . ", Name: " . $user->getName() . ", Email: " . $user->getEmail() . "\n";
}

// 删除用户
$userManager->removeUser(1);

// 获取单个用户
$user = $userManager->getUser(2);
if ($user) {
    echo "Found User: " . $user->getName() . "\n";
}
?>
