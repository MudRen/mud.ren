<div>
    <h1> {{ $message }} </h1>
</div>
<hr>
<table class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>age</th>
            <th>title</th>
        </tr>
    </thead>

    <tbody>
@foreach ($users as $user)
    <tr>
        <td>{{ json_decode($user, true)['id'] }}</td>
        <td>{{ json_decode($user, true)['name'] }}</td>
        <td>{{ json_decode($user, true)['age'] }}</td>
        <td>{{ json_decode($user, true)['title'] }}</td>
    </tr>
@endforeach
    </tbody>
</table>
