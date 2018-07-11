<?php
declare(strict_types=1);

class Article {
    public $title;
    public $author;
    public $date;
    public $category;

    /**
     * Article constructor.
     * @param $title
     * @param $author
     * @param $date
     * @param $category
     */
    public function __construct(string $title, string $author, DateTime $date, string $category)
    {
        $this->title = $title;
        $this->author = $author;
        $this->date = $date;
        $this->category = $category;
    }

    public function write($writer){
        $writer->write($this);
    }
}

interface iWriter{
    public function write(Article $article);
}

class PlainWriter implements iWriter {
    public function write(Article $article)
    {
        echo $article->title . ':' . $article->author . ':' . $article->date->format('d.m.Y') . ':' . $article->category;
    }
}

class XMLLWriter implements iWriter{
    public function write(Article $article){
        echo '<article>
                    <title>' . $article->title . '</title>
                    <author>' . $article->author . '<article>
              </article>';
    }
}

class JSONWriter implements iWriter{
    public function write(Article $article)
    {
        echo json_encode($article);
    }
}

class Factory {
    static function getWriter(string $type){
        $class = $type. 'Writer';
        return new $class();
    }
}
$a = new Article('Abc', 'Xyz', new DateTime(), 'comics');
$a->write(Factory::getWriter('Plain'));
