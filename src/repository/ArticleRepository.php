<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/Article.php';


class ArticleRepository extends Repository
{
    public function getArticle($id): ?Article
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM articles WHERE article_id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $article = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($article == false) {
            return null;
        }

        return new Article(
            $article['article_title'],
            $article['article_content'],
            $article['article_picture'],
            $article['article_id']


        );
    }

    public function addArticle(Article $article): void
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO articles (article_title, article_content, article_post_date, article_picture) VALUES (?, ?, ?, ?)
                                                                                                        
        ');

        $stmt->execute([
            $article->getTitle(),
            $article->getContent(),
            $date->format('Y-m-d'),
            $article->getArticlePicture()
        ]);

    }

    public function getAllArticles(): array{
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM articles;
        ');
        $stmt->execute();
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($articles as $article) {
            $result[] = new Article(
                $article['article_title'],
                $article['article_content'],
                $article['article_picture'],
                $article['article_id']

            );
        }

        return $result;
    }

    public function getArticleByTitleAndCont(string $searchString){
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM articles  WHERE LOWER(article_title) LIKE :search or LOWER(article_content) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}