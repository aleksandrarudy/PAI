<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/Image.php';


class ImageRepository extends Repository
{
    public function getImage($id): ?array
    {
        $stmt = $this->database->connect()->prepare('SELECT *
from image a
         inner join "user" b on b.id_user = a.id_user
         inner join "user_profile_details" c on c.id_user_profile_details = b.id_user_profile_details
WHERE id_image=:id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $image = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($image == false) {
            return null;
        }

        $newimage = new Image(
            $image['camera_name'],
            $image['lens_name'],
            $image['flash'],
            $image['aperture'],
            $image['exposure_time'],
            $image['focus_length'],
            $image['iso'],
            $image['light'],
            $image['description'],
            $image['image'],
            $image['id_image_categories'],
            $image['id_image']

        );

        $newuser = new User(
            $image['id_user'],
            $image['email'],
            $image['password'],
            $image['user_name']
        );

        $userpic =  new Profile(
            $image['firstname'],
            $image['surname'],
            $image['biogram'],
            $image['profile_picture']
        );



        return array($newimage, $newuser, $userpic);
    }


    public function addImage(Image $image, $id_user)
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO image (id_user, id_image_categories, image, camera_name, lens_name, flash,
                                 aperture, exposure_time, focus_length, iso, light, post_date,description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) returning id_image
                                                                                                        
        ');

        $stmt->execute([
            $id_user,
            $image->getCategory(),
            $image->getPicture(),
            $image->getCamera(),
            $image->getLens(),
            $image->getFlash(),
            $image->getAperture(),
            $image->getExposure(),
            $image->getFocus(),
            $image->getIso(),
            $image->getLight(),
            $date->format('Y-m-d'),
            $image->getDescription()
        ]);

        $imageid = $stmt -> fetchColumn();

        return $imageid;
    }

    public function getAllImages(): array{
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM image;
        ');
        $stmt->execute();
        $images = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($images as $image) {
            $result[] = new Image(
                $image['camera_name'],
                $image['lens_name'],
                $image['flash'],
                $image['aperture'],
                $image['exposure_time'],
                $image['focus_length'],
                $image['iso'],
                $image['light'],
                $image['description'],
                $image['image'],
                $image['id_image_categories'],
                $image['id_image']
            );
        }

        return $result;
    }

    public function getImageByDesAndProp(string $searchString){
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
      SELECT image FROM image inner join image_categories on image.id_image_categories = image_categories.id_image_categories WHERE 
        LOWER(description) LIKE :search or LOWER(image_category_name) like :search
           ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}