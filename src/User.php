<?php


class User
{
    protected $pdo;

    public function __construct()
    {
        $db = new DBConnect();
        $this->pdo = $db->connect();
    }

    public function getAll()
    {
        $sql = 'SELECT id, username, email, address FROM users';
        $stmt = $this->pdo->query($sql);
        $users = $stmt->fetchAll();
        return $users;
    }

    public function delete($id)
    {
        try {
            $this->removeRole($id);
            $sql = 'DELETE FROM `users` WHERE id = :id';
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (PDOException $PDOException) {
            echo $PDOException->getMessage();
            exit();
        }
    }

    public function removeRole($idUser)
    {
        $sql = 'DELETE FROM `role_user` WHERE user_id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $idUser);
        $stmt->execute();
    }

    public function add($user)
    {
        $sql = 'INSERT INTO `users`(username, email, address, password, group_id) VALUES (:username, :email, :address, :password, :group_id)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':username', $user['username']);
        $stmt->bindValue(':email', $user['email']);
        $stmt->bindValue(':address', $user['address']);
        $stmt->bindValue(':password', $user['password']);
        $stmt->bindValue(':group_id', $user['group_id']);
        $stmt->execute();
    }


}