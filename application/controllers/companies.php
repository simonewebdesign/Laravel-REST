<?php

class Companies_Controller extends Base_Controller {

  public function action_index() {
    $view = View::make('company.index');
    //$view['companies'] = DB::table('companies')->get();
    $view['companies'] = Company::all();
    return $view;
  }

  public function action_show() {
    $view = View::make('company.show');
    $id = URI::segment(2); // 1st segment is "company", 2nd is the id
    $view['company'] =  Company::find($id);
    return $view;
  }    

  public function action_new() {
    return View::make('company.new');
  }

  public function action_edit() {
  }    

  public function action_create() {
    // no view to render
  }

  public function action_update() {
    return View::make('company.update');
  }    

  public function action_destroy() {
    // no view to render
  }

}