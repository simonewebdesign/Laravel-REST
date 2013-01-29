@layout('layouts.application')
@section('content')
  <h2>New company</h2>
  @include('company._form')
  {{ HTML::link_to_action('companies@index', 'Back') }}
@endsection