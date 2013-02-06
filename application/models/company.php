<?php

class Company extends Eloquent
{
  /* schema:
      name
      description
      telephone
      address
      email
      website
      and the timestamps
  */

  // Validation
  public static $rules = array(
    'name'      => 'required|max:100',
//  'telephone' => 'numeric',
// I deactivated it because it's too restrictive: it doesn't allow spaces.
    'email'     => 'email|unique:companies,email',
    'website'   => 'active_url'
  );

}
