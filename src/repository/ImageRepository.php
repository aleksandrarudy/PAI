<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/Image.php';


class ImageRepository extends Repository
{
    public function getImage(int $id): ?Image
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.image WHERE id_image = :id
        ');
        $stmt->bindParam(':id', $id_image, PDO::PARAM_INT);
        $stmt->execute();

        $image = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($image == false) {
            return null;
        }

        return new Image(
            $image['image']

        );
    }
}