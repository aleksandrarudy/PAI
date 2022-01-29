<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';


class UserRepository extends Repository
{
    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.user WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['id_user'],
            $user['email'],
            $user['password'],
            $user['user_name']
        );
    }

    public function addUser(User $user): string{
        if(($this->getUser($user->getEmail()))!=null){
            return "user already exist";
        }
        try{
            $stmt= $this->database->connect()->prepare('
                insert into public.user(email, password, user_name) values (?,?,?)
            ');
            $stmt->execute([
                $user->getEmail(),
                $user->getPassword(),
                $user->getUsername()
            ]);
            return "user created";
        }
        catch(PDOException $e){
            return $e;
        }
    }

}