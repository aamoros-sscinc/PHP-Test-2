<?php // --taint-analysis

/** @psalm-immutable */
class User {
    public $id;
    public function __construct($userId) {
        $this->id = $userId;
    }
}

class UserUpdater {
    public static function deleteUser(PDO $pdo, User $user) : void {
        $pdo->exec("delete from users where user_id = " . $user->id);
    }
}

$userObj = new User($_GET["user_id"]);

// remove the next line to fix issue
UserUpdater::deleteUser(new PDO(), $userObj);
