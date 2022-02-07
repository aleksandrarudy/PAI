<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Article.php';
require_once __DIR__.'/../repository/ArticleRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';


class ArticleController extends AppController
{

    const MAX_FILE_SIZE = 1024*1024*8;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg', 'image/jpg'];
    const UPLOAD_DIRECTORY = '/../public/img/uploads/';

    private $messages = [];
    private $articleRepository;

    public function __construct()
    {
        parent::__construct();
        $this->articleRepository = new ArticleRepository();
    }


    public function articles()
    {
        $articles = $this->articleRepository->getAllArticles();
        $this->render('articles', ['articles'=>$articles]);

    }

    public function articleSingle($id)
    {
        $article = $this->articleRepository->getArticle($id);
        $this->render('articleSingle', ['article'=>$article]);

    }

    public function addArticle()
    {
        if ($this->isPost() && is_uploaded_file($_FILES['a-file']['tmp_name']) && $this->validate($_FILES['a-file']))
        {
            move_uploaded_file(
                $_FILES['a-file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['a-file']['name']
            );

            $article = new Article($_POST['title'], $_POST['content'],$_FILES['a-file']['name']);
            $this->articleRepository->addArticle($article);

            return $this->render('articleSingle', [
                'articles' => $this->articleRepository->getAllArticles(),
                'messages' => $this->messages, 'article' => $article]);
        }

        return $this->render('add-article', ['messages' => $this->messages]);


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