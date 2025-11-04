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
                return;
            }

            try {
                if ($this->taskModel->create($title, $description)) {
                    $this->render('front/tasks', [
                        'success' => 'Görev başarıyla oluşturuldu.',
                        'tasks' => $this->taskModel->getAll()
                    ]);
                } else {
                    $this->render('front/create_task', ['error' => 'Görev oluşturulamadı.']);
                }
            } catch (\Exception $e) {
                $this->render('front/create_task', ['error' => 'Veritabanı hatası: ' . "Görev oluşturulamadı."]);
            }
        } else {
            $this->render('front/create_task');
        }
    }

    public function update($id)
    {
        $task = $this->taskModel->getById($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $description = $_POST['description'] ?? '';

            if (empty($title) || empty($description)) {
                return $this->render('front/update_task', [
                    'error' => 'Başlık ve Açıklama alanları boş bırakılamaz.',
                    'id' => $id
                ]);
            }

            try {
                $this->taskModel->update($id, $title, $description);
                $task = $this->taskModel->getById($id);
                return $this->render('front/update_task', [
                    'success' => 'Görev başarıyla güncellendi.',
                    'task' => $task
                ]);
            } catch (\Exception $e) {
                $this->render('front/update_task', [
                    'error' => 'Veritabanı hatası: ' . "Görev güncellemesi başarısız.",
                    'id' => $id
                ]);
            }
        } else {



            if (!$task) {
                return $this->render('front/update_task', [
                    'error' => 'Görev bulunamadı.',
                    'id' => $id
                ]);
            }

            return $this->render('front/update_task', [
                'task' => $task
            ]);
        }
    }

    public function delete($id)
    {
        $task = $this->taskModel->getById($id);

        if ($this->taskModel->delete($id)) {
            return $this->render('front/tasks', [
                'success' => 'Görev başarıyla silindi.',
                'tasks' => $this->taskModel->getAll()
            ]);
        } else {
            return $this->render('front/tasks', [
                'error' => 'Görev silinemedi.'
            ]);
        }
    }
}
