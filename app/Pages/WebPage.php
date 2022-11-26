<?php

namespace App\Pages;

interface WebPage
{
    public function getTitle();
    public function getDescription();
    public function getView();
    public function getData();
}
