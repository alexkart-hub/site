<?php
namespace App\Pages\Web;

use App\Pages\Page;

class LoginPage extends Page
{
    protected function init()
    {
        $this->view = 'auth.login';
    }

    protected function setMeta()
    {
        $this->title = 'Авторизация';
    }
}
