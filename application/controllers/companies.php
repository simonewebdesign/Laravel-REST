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
    // RAILS logic
    // if save was successful
      // redirect to the company with notice successfully created
    // else
      // render action new with errors (and old input)
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

  public function action_update() {
    /* attualmente fa questo:
    se trovo la company e riesco a updatarla
      redirect to show
    altrimenti
      redirect to edit

    - invece deve fare -

    validation
    se fallisce
      redirect to edit with data
    altrimenti
      se trovo la company e riesco a updatarla
        redirect to show
    */
    $id = URI::segment(2); // 1st segment is "company", 2nd is the id
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
      // company not found
      return Response::error('404');
    }
    // no view to render
  }

  public function action_destroy() {
    $id = URI::segment(2);
    $company = Company::find($id)->delete();
    return Redirect::to_action('companies@index');
    // no view to render
  }
}
