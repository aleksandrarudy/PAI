<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/ProfileRepository.php';

class SecurityController extends AppController
{



    private $userRepository;
    private $profileRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository=new UserRepository();
        $this->profileRepository=new ProfileRepository();
    }

    public function login()
    {
        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $userRepository->getUser($email);

        if(!$user){
            return $this->render('login', ['messages' => ['User not found!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        if(!isset($_COOKIE['user'])){
            $cookie_id = $user->getId();
            $cookie_user = $user->getEmail();
            $cookie_profileId = $this->profileRepository->getUserProfileIdById($cookie_id);

            setcookie('id', $cookie_id, time()+(86400*30),'/');
            setcookie('user', $cookie_user, time()+(86400*30),'/');
            setcookie('profileDetails', $cookie_profileId, time()+(86400*30),'/');
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/dashboard");

    }

    public function register()
    {
        if(!$this->isPost()){
           return $this->render('signUp');
        }
        $user = new User(
            null,
            $_POST['email'],
            $_POST['password'],
            $_POST['user_name']

        );
        $message = $this->userRepository->addUser($user);
        return $this->render('login',['messages'=>[$message]]);

    }

    public function logout(){
        if(isset($_COOKIE['user'])){
            setcookie('user', '', time()-(86400*30),'/');
            setcookie('id', '', time()-(86400*30),'/');
            setcookie('profileDetails', '', time()-(86400*30),'/');
        }
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
    }
}