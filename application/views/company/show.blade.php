@layout('layouts.application')
@section('content')

<p>
  <b>Name:</b>
  {{ $company->name }}
</p>

<p>
  <b>Telephone:</b>
  {{ $company->telephone }}
</p>

<p>
  <b>Address:</b>
  {{ $company->address }}
</p>

<p>
  <b>Email:</b>
  {{ $company->email }}
</p>

<p>
  <b>Website:</b>
  {{ $company->website }}
</p>

{{ HTML::link_to_action('companies@edit', 'Edit', $company->id) }} |
{{ HTML::link_to_action('companies@index', 'Back') }}
@endsection
