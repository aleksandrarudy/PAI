<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Profile.php';
require_once __DIR__.'/../repository/ProfileRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';

class ProfileController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024*8;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg', 'image/jpg'];
    const UPLOAD_DIRECTORY = '/../public/img/uploads/';

    private $messages = [];
    private $profileRepository;
    private $userRepository;
    private $id;
    private $idProfileDetails;

    public function __construct()
    {
        parent::__construct();
        $this->profileRepository=new ProfileRepository();
        $this->userRepository=new UserRepository();
        $this->id=$_COOKIE['id'];
        $this->idProfileDetails=$_COOKIE['profileDetails'];
    }

    public function profile()
    {
        $profile = $this->profileRepository->getUserDetails($_COOKIE['profileDetails']);
        $user = $this->userRepository->getUser($_COOKIE['user']);
        $this->render('profile', ['profile'=>$profile, 'user'=>$user]);

    }

    public function addUserDetails(){
        $profile = $this->profileRepository->getUserDetails($this->id);
        $user = $this->userRepository->getUserById($this->id);
        if ($this->isPost() && is_uploaded_file($_FILES['p-file']['tmp_name']) && $this->validate($_FILES['p-file']))
        {
            move_uploaded_file(
                $_FILES['p-file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['p-file']['name']
            );

            $profile = new Profile($_POST['firstname'], $_POST['surname'],$_POST['biogram'],$_FILES['p-file']['name']);
            $this->profileRepository->addUserDetails($profile,$this->idProfileDetails);
            $this->idProfileDetails=$_COOKIE['profileDetails'];
            return $this->profile();
        }
        else {
            return $this->render('editProfile',['messages'=>$this->messages, 'profile'=>$profile, 'user'=>$user,]);
        }

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