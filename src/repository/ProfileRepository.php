<?php
require_once "Repository.php";
require_once __DIR__.'/../models/Profile.php';

class ProfileRepository extends Repository
{

    public function getUserDetails($id): ?Profile
    {

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM user_profile_details WHERE id_user_profile_details = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $profile = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($profile == false) {
            return null;
        }
        return new Profile(
            $profile['firstname'],
            $profile['surname'],
            $profile['biogram'],
            $profile['profile_picture']

        );
    }

    public function addUserDetails(Profile $profile, User $user, $id_user_profile_details): void
    {

        $stmt = $this->database->connect()->prepare('
        update public.user_profile_details set firstname=:fn ,surname=:sn, biogram=:biogram, profile_picture=:pp WHERE id_user_profile_details=:idU;
        ');

        $firstname = $profile->getFirstname();
        $surname = $profile->getSurname();
        $biogram = $profile->getBiogram();
        $profile_picture = $profile->getProfilePicture();
        $stmt->bindParam(':fn', $firstname, PDO::PARAM_STR);
        $stmt->bindParam(':sn', $surname, PDO::PARAM_STR);
        $stmt->bindParam(':biogram', $biogram, PDO::PARAM_STR);
        $stmt->bindParam(':pp', $profile_picture, PDO::PARAM_STR);
        $stmt->bindParam(':idU', $id_user_profile_details, PDO::PARAM_INT);
        $stmt->execute();

    }



    public function getUserProfileIdById($id){
        $stmt = $this->database->connect()->prepare('
            SELECT id_user_profile_details FROM public.user WHERE id_user= :id
        ');

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();


         return $stmt->fetch(PDO::FETCH_ASSOC)['id_user_profile_details'];
    }

    public function getUserByUsername(string $searchString){
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM user WHERE LOWER(user_name) LIKE :search or LOWER(article_content) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}