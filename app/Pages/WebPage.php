<?php

namespace App\Pages;

interface WebPage
{
    public function getTitle();
    public function getDescription();
    public function getData();
}
