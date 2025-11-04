<?php

namespace App\Core;

use Carbon\Carbon;
use Locale;

class BaseController
{
    public function render($view, $data = [])
    {
        Carbon::setLocale('tr');
        $data['Carbon'] = new Carbon();
        extract($data);
        require __DIR__ . "/../../views/layouts/header.php";
        require __DIR__ . "/../../views/$view.php";
        require __DIR__ . "/../../views/layouts/footer.php";
    }
}
