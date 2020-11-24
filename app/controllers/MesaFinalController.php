<?php
defined('BASEPATH') or exit('No se permite acceso directo');
class MesaFinalController extends Controller
{

   public function index()
   {
      isLoggedIn();
      $data = [
         'titulo' => 'Inicio',
      ];
      $this->view('MesaFinal/ABMmesas', $data);
   }
}