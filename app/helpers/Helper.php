<?php

namespace App\Helpers;

class Helper
{
  public function formatDate($date){
         return date('F j, Y, g:i a', strtotime($date));
      }

      public static function textShorten($text,$limit){
         $text = substr($text, 0, $limit);
         // $text = substr($text, 0, strrpos($text, ' '));
         return $text;
      }

      public function validation($data){
         $data = trim($data);
         $data = stripcslashes($data);
         $data = htmlspecialchars($data);
         return $data;
      }

      public function title(){
         $path = $_SERVER['SCRIPT_FILENAME'];
         $title = basename($path, '.php');
         if ($title == 'homepage') {
          return $title;
         }
      }
}

?>
