<?php
defined('BASEPATH') or exit('No se permite acceso directo');
class HomeController extends Controller
{

   public function index()
   {
      isAlumno();
      $data = [
         'titulo' => 'Mesas Finales',
      ];
      return $this->view('home/index', $data);
   }

}