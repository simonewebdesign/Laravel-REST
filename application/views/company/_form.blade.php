<!--
Company is always empty on new action
Company is always full on edit action
So?
So on edit action you don't even need the Input::old() !!
and because company is always empty on new action,
you can actually put the old input directly in company:
-->
<?php
$old_input = Input::old();
if (!empty($old_input)) {
  $company = new Company;
  $company->attributes = $old_input;
}
?>
<!-- the code above is just a little hack that preserves the form cleanness. -->

<!-- begin form -->
{{ Form::open($action, $method) }}

  <!-- display errors (if any) -->
  @unless (empty($errors->messages))
    <div id="error_explanation">
      <h2>
        {{ count($errors->messages) . " " . Str::plural('error', count($errors->messages)) }}
        prohibited this company from being saved:
      </h2>

      <ul>
        @foreach ($errors->messages as $error)
          <li>{{ $error[0] }}</li>
        @endforeach
      </ul>
    </div>
  @endunless
  <!-- end errors -->

  <div>
    {{ Form::label('name', 'Name') }}<br>
    {{ Form::text('name', $company->name) }}
  </div>
  <div>
    {{ Form::label('description', 'Description') }}<br>
    {{ Form::textarea('description', $company->description) }}
  </div>
  <div>
    {{ Form::label('telephone', 'Telephone') }}<br>
    {{ Form::telephone('telephone', $company->telephone) }}
  </div>
  <div>
    {{ Form::label('address', 'Address') }}<br>
    {{ Form::text('address', $company->address) }}
  </div>
  <div>
    {{ Form::label('email', 'Email') }}<br>
    {{ Form::email('email', $company->email) }}
  </div>
  <div>
    {{ Form::label('website', 'Website') }}<br>
    {{ Form::url('website', $company->website) }}
  </div>
  <div>
    {{ Form::submit($submit) }}
  </div>

{{ Form::close() }}
