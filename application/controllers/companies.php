<?php

class Companies_Controller extends Base_Controller {

  /* public $restful = true; do I really need this? Maybe not.
  I don't want to have 'index' or 'show' in the URL. */ 

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
    $view['company'] = new Company;
    $view['action'] = 'companies';
    $view['method'] = 'POST';
    $view['submit'] = 'Create Company';
    return $view;
  }

  public function action_edit() {
    $view = View::make('company.edit');
    $view['id'] = URI::segment(2); // 1st segment is "company", 2nd is the id
    $view['company'] = Company::find($view['id']);
    $view['action'] = 'companies/' . $view['id'];
    $view['method'] = 'PUT';
    $view['submit'] = 'Update Company';
    return $view;
  }

  public function action_create() {
    $attributes = Input::all();
    $company = Company::create($attributes);
    if ($company) {
      return Redirect::to_action('companies@show', array($company->id))
      ->with('notice', 'Company was successfully created.');
    }
    // no view to render
  }

  public function action_update() {
    $attributes = Input::all();    
    $id = URI::segment(2); // 1st segment is "company", 2nd is the id
    if ( Company::find($id)->update($id, $attributes) ) {
      return Redirect::to_action('companies@show', array($id))
      ->with('notice', 'Company was successfully updated.');
    }
    return Redirect::to_action('companies@edit', array($id));
    // no view to render
  }

  public function action_destroy() {
    $id = URI::segment(2);
    $company = Company::find($id)->delete();
    return Redirect::to_action('companies@index');
    // no view to render
  }
}