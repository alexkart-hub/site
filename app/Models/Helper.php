<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Helper extends Model
{
    use HasFactory;

    public static function getCommentWordByCount($count)
    {
        $word = 'комментариев';
        $remainder10 = $count % 10;
        $remainder100 = $count % 100;
        $skip = ($count > 10 && $count < 15) || ($remainder100 > 10 && $remainder100 < 15);
        if (!$skip) {
            switch ($remainder10) {
                case 1:
                    $word = 'комментарий';
                    break;
                case 2:
                case 3:
                case 4:
                    $word = 'комментария';
                    break;
                default:
                    $word = 'комментариев';
                    break;
            }
        }
        return $word;
    }
}
