<?php namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    
    protected $table = 'news';
    protected $allowedFields = ['title', 'slug', 'body'];
    
    
    public function getNews($slug = false)
{
    if ($slug === false)
    {
        return $this->findAll();
    }

    return $this->asArray()
                ->where(['slug' => $slug])
                ->first();
}

public function view($slug = NULL)
{
    $model = new NewsModel();

    $data['news'] = $model->getNews($slug);

    if (empty($data['news']))
    {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: '. $slug);
    }

    $data['title'] = $data['news']['title'];

    echo view('templates/header', $data);
    echo view('news/view', $data);
    echo view('templates/footer', $data);
}
}