<?php

namespace Code\Controller;

use Code\View\View;


class MyExpensesController 
{
  public function index()
  {
    var_dump((new Expense(Connection::getInstance()))->findAll());
  }

  public function new()
  {
    //recupera o valor da action no méthod myexpenses, método global
    $method = $_SERVER['REQUEST_METHOD'];
   
    if($method == 'POST'){
      //vai mostrar em array os dados passados pelo formulário
      // var_dump($_POST);
      // die;

      //passo o post para o $data
      $data = $POST;

      //pega o connection com o banco de dados para trabalhar
      $expense = Expense(Connection::getInstance());
      $expense->insert($data);

      return header(string: 'Location: ' . HOME . '/mvexpenses');
    }
   
    $view = new View(view: 'expenses/new.phtml');
  
    return $view->render();
  }
}