<?php
namespace App\Pages\Web;

use App\Pages\Page;

class ContactsPage extends Page
{
    protected function setMeta()
    {
        $this->title = 'Контакты';
        $this->description = 'Если у Вас возникли вопросы, воспользуйтесь контактной формой.';
    }
}
