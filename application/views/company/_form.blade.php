

<h2>{{ $title }} company</h2>

{{-- TODO add error handling --}}

{{ Form::open($action, $method) }}

  <div>
    {{ Form::label('name', 'Name') }}<br>
    {{ Form::text('name', $company->name) }}
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