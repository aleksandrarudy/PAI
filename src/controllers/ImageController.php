<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Image.php';
require_once __DIR__.'/../repository/ImageRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/ProfileRepository.php';


class ImageController extends AppController
{
    const MAX_FILE_SIZE = 5242880;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg', 'image/jpg'];
    const UPLOAD_DIRECTORY = '/../public/img/uploads/';

    private $messages = [];
    private $imageRepository;
    private $userRepository;
    private $profileRepository;
    private $id_user;

    public function __construct()
    {
        parent::__construct();
        $this->imageRepository = new ImageRepository();
        $this->userRepository = new UserRepository();
        $this->profileRepository = new ProfileRepository();
        $this->id_user = $_COOKIE['id'];
    }

    public function search(){
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->imageRepository->getImageByDesAndProp($decoded['search']));
        }
    }

    public function dashboard()
    {
        $images = $this->imageRepository->getAllImages();
        $this->render('dashboard', ['images' =>$images]);

    }

    public function categories()
    {
        $images = $this->imageRepository->getAllImages();
        $this->render('categories', ['images' =>$images]);

    }

    public function image($id)
    {

        $image = $this->imageRepository->getImage($id);

        $userName = $this->userRepository->getUserById($id);
        $userPicture = $this->profileRepository->getUserDetails($id);
        $this->render('image', ['image' =>$image[0], 'userName'=>$image[1], 'userPicture'=>$image[2]]);


    }

    public function addImage()
    {

        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file']))
        {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );


            $image = new Image($_POST['camera'], $_POST['lens'], $_POST['flash'], $_POST['aperture'],
                $_POST['exposure'], $_POST['focus'], $_POST['iso'], $_POST['light'], $_POST['description'],
                $_FILES['file']['name'], $_POST['Category']);

            $imageid = $this->imageRepository->addImage($image, $this->id_user);

            $this->getImage($imageid);
        }

        return $this->render('add-image', ['messages' => $this->messages]);


    }

    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->messages[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) && !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->messages[] = 'File type is not supported.';
            return false;
        }
        return true;
    }
}