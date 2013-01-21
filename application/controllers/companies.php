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
    $view['company'] = Company::find($id);
    return $view;
  }

  public function action_new() {
    $view = View::make('company.new');
    $view['title'] = 'New';
    $view['action'] = 'companies';
    $view['method'] = 'POST';
    $view['company'] = new Company;
    $view['submit'] = 'Create Company';
    return $view;
  }

  public function action_edit() {
  }

  public function action_create() {
    $company = Company::create(Input::all());
    if ($company) {
      return Redirect::to_action('companies@show', array($company->id))
      ->with('notice', 'Company was successfully created.');
    }
    // no view to render
  }

  public function action_update() {
    // no view to render
  }

  public function action_destroy() {
    // no view to render
  }

}