<?php
Use App\Hotel;
class HotelsController extends Controller
{
  public static function getphoto() {

            $path =  $hotel->photos->first()->path;

            return $path;
     }
}



?>
