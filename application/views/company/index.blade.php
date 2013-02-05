@layout('layouts.application')
@section('content')
<h1>Listing companies</h1>

<table>
  <tr>
    <th>Name</th>
    <th>Telephone</th>
    <th>Address</th>
    <th>Email</th>
    <th>Website</th>
    <th colspan="3">Actions</th>
  </tr>

  @forelse ($companies as $company)
  <tr>
    <td>{{ $company->name }}</td>
    <td>{{ $company->telephone }}</td>
    <td>{{ $company->address }}</td>
    <td>{{ $company->email }}</td>
    <td>{{ $company->website }}</td>
    <td>{{ HTML::link_to_action('companies@show', 'Show', array($company->id)) }}</td>
    <td>{{ HTML::link_to_action('companies@edit', 'Edit', array($company->id)) }}</td>
    <td>{{ HTML::link_to_action('companies@destroy', 'Destroy', array($company->id), array('class' => 'confirmDelete')) }}</td>
  </tr>
  @empty
  <p>There are no companies yet.</p>
  @endforelse

</table>

<br>
{{ HTML::link_to_action('companies@new', "New Company") }}

@endsection
