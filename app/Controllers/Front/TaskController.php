<?php

namespace App\Controllers\Front;

use App\Core\BaseController;
use App\Models\Task;

class TaskController extends BaseController
{
    private $taskModel;

    public function __construct()
    {
        $this->taskModel = new Task();
    }
    public function index()
    {
        $tasks = $this->taskModel->getAll();
        $this->render('front/tasks', ['tasks' => $tasks]);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $description = $_POST['description'] ?? '';

            if (empty($title) || empty($description)) {
                $this->render('front/create_task', ['error' => 'Başlık ve Açıklama alanları boş bırakılamaz.']);
            }

            if ($this->taskModel->create($title, $description)) {
                $this->render('front/create_task', ['success' => 'Görev başarıyla oluşturuldu.']);
            } else {
                $this->render('front/create_task', ['error' => 'Görev oluştururken bir hata oluştu.']);
            }
        } else {
            $this->render('front/create_task');
        }
    }
}
