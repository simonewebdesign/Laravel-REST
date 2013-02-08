<?php

class Companies_Controller extends Base_Controller {

  public $restful = true;

  # GET /companies
  public function get_index() {

    $view = View::make('company.index');
  //$view['companies'] = DB::table('companies')->get();
    $view['companies'] = Company::all();
    return $view;
  }

  # GET /companies/1
  public function get_show($id) {

    $view = View::make('company.show');
    $view['company'] = Company::find($id);
    if ($view['company'] == null) {
      return Response::error('404');
    }
    return $view;
  }

  # GET /companies/new
  public function get_new() {

    $view = View::make('company.new');
    $view['company'] = new Company;
    $view['action'] = URL::to_action('companies@create');
    $view['method'] = 'POST';
    $view['submit'] = 'Create Company';
    return $view;
  }

  # GET /companies/1/edit
  public function get_edit($id) {

    $view = View::make('company.edit');
    $view['company'] = Company::find($id);
    if ($view['company'] == null) {
      return Response::error('404');
    }
    $view['action'] = URL::to_action('companies@update', array($id));
    $view['method'] = 'PUT';
    $view['submit'] = 'Update Company';
    $view['id'] = $id;
    return $view;
  }

  # POST /companies
  public function post_create() {

    $attributes = Input::all();
    $validation = Validator::make($attributes, Company::$rules);
    if ($validation->fails()) {
      return Redirect::to_action('companies@new')
      ->with('errors', $validation->errors)
    //->with_errors()
      ->with_input();
    }
    else {
      $company = Company::create($attributes);
      if ($company) {
        return Redirect::to_action('companies@show', array($company->id))
        ->with('notice', 'Company was successfully created.');
      }
    }
    // no view to render
  }

  # PUT /companies/1
  public function put_update($id) {

    $company = Company::find($id);

    if ($company) {

      $attributes = Input::all();
      $rules = Company::$rules;
      $rules['email'] .= ",$id"; // Forcing the unique rule to ignore a given ID
      $validation = Validator::make($attributes, $rules);

      if ($validation->fails()) {
        return Redirect::to_action('companies@edit', array($id))
        ->with('errors', $validation->errors)
        ->with_input();
      }
      else {
        // validation successful
        if ( $company->update($id, $attributes) ) {
          // update successful
          return Redirect::to_action('companies@show', array($id))
          ->with('notice', 'Company was successfully updated.');
        }
      }
    } else {
      // Company not found
      return Response::error('404');
    }
    // no view to render
  }

  # GET /companies/1/delete
  public function get_destroy($id) {

    $company = Company::find($id)->delete();
    return Redirect::to_action('companies@index');
    // no view to render
  }
}
