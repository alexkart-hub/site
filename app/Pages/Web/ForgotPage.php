<?php
namespace App\Pages\Web;

use App\Pages\Page;

class ForgotPage extends Page
{
    protected function init()
    {
        $this->view = 'auth.forgot';
    }

    protected function setMeta()
    {
        $this->title = 'Восстановление пароля';
    }
}
