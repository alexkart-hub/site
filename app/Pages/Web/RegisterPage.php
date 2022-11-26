<?php
namespace App\Pages\Web;

use App\Pages\Page;

class RegisterPage extends Page
{
    protected function init()
    {
        $this->view = 'auth.register';
    }

    protected function setMeta()
    {
        $this->title = 'Регистрация';
    }
}
