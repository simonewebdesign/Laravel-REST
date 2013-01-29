@layout('layouts.application')
@section('content')
  <h2>Editing company</h2>
  @include('company._form')
  {{ HTML::link_to_action('companies@show', 'Show', array($company->id)) }} |
  {{ HTML::link_to_action('companies@index', 'Back') }}
@endsection