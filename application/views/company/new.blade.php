@layout('layouts.application')
@section('content')
<h1>asd</h1>
  @include('company._form')
  {{ HTML::link_to_action('companies@index', 'Back') }}
@endsection