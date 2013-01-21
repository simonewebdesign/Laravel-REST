@layout('layouts.application')
@section('content')
  @render('company._form')
<%= link_to 'Show', @company %> |
<%= link_to 'Back', companies_path %>
  
@endsection