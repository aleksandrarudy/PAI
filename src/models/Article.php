<?php

class Article
{
    private $id_article;
    private $title;
    private $content;
    private $article_picture;

    public function __construct($title, $content, $article_picture, $id_article=null)
    {

        $this->id_article = $id_article;
        $this->title = $title;
        $this->article_picture = $article_picture;
        $this->content = $content;
    }

    public function getArticlePicture()
    {
        return $this->article_picture;
    }

    public function setArticlePicture($article_picture)
    {
        $this->article_picture = $article_picture;
    }

    public function getIdArticle()
    {
        return $this->id_article;
    }

    public function setIdArticle($id_article): void
    {
        $this->id_article = $id_article;
    }



    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }


    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content): void
    {
        $this->content = $content;
    }




}