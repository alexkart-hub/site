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

    public static function getDate($date = false, $format = '')
    {
        $format = $format ?: 'd-m-Y H:i:s';
        $timestamp = ($date ? date_timestamp_get($date) : time()) + 3 * 3600;
        return date($format, $timestamp);
    }

    public static function translit($s) {
        $s = (string) $s; // преобразуем в строковое значение
        $s = strip_tags($s); // убираем HTML-теги
        $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
        $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
        $s = trim($s); // убираем пробелы в начале и конце строки
        $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
        $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
        $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
        $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
        $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
        return $s; // возвращаем результат
    }
}
