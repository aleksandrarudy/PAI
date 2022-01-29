<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Article.php';
require_once __DIR__.'/../repository/ArticleRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';


class ArticleController extends AppController
{

    private $messages = [];
    private $articleRepository;

    public function __construct()
    {
        parent::__construct();
        $this->articleRepository = new ArticleRepository();
    }

    public function search(){
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->articleRepository->getArticleByTitleAndCont($decoded['search']));
        }
    }

    public function articles()
    {
        $this->render('articles');

    }

    public function articleSingle($id)
    {
        $article = $this->articleRepository->getArticle($id);
        $this->render('articleSingle', ['articleSingle'=>$article]);

    }

    public function addArticle()
    {
        if ($this->isPost())
        {

            $article = new Article($_POST['title'], $_POST['content']);
            $this->articleRepository->addArticle($article);

            return $this->render('articleSingle', [
                'articles' => $this->articleRepository->getAllArticles(),
                'messages' => $this->messages, 'article' => $article]);
        }

        return $this->render('add-article', ['messages' => $this->messages]);


    }

}