<?php

namespace App\Controllers\Front;

use App\Core\BaseController;

class ExampleController extends BaseController
{
    public function index()
    {
        $title = 'Örnek MVC Sayfası';
        $content = 'Örnek MVC Sayfa Detayı';
        $this->render('front/home', ['title' => $title, 'content' => $content]);
    }
}