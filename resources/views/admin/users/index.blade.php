<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>

<h2>Paslaugų gavėjai</h2>

<table id="table_id" style="width:100%">
    <tr>
        <th>Vardas</th>
        <th>Pavardė</th>
        <th>Gimimo data</th>
        <th>El. paštas</th>
        <th></th>
    </tr>
    @foreach($users as $user)
        @if($user['type'] === 0)
    <tr>
        <td>{{$user['name']}}</td>
        <td>{{$user['surname']}}</td>
        <td>{{$user['year_of_birth']}}</td>
        <td>{{$user['email']}}</td>
        <td><button class="bg-primary">Redaguoti</button></td>
    </tr>
        @endif
    @endforeach
</table>

<h2>Paslaugų teikėjai</h2>

<table id="table_id" style="width:100%">
    <tr>
        <th>Vardas</th>
        <th>Pavardė</th>
        <th>Gimimo data</th>
        <th>El. paštas</th>
        <th></th>
    </tr>
    @foreach($users as $user)
        @if($user['type'] === 3)
        <tr>
            <td>{{$user['name']}}</td>
            <td>{{$user['surname']}}</td>
            <td>{{$user['year_of_birth']}}</td>
            <td>{{$user['email']}}</td>
            <td><button class="bg-primary">Redaguoti</button></td>
        </tr>
        @endif
    @endforeach
</table>
<h2>Moderatoriai</h2>

<table id="table_id" style="width:100%">
    <tr>
        <th>Vardas</th>
        <th>Pavardė</th>
        <th>Gimimo data</th>
        <th>El. paštas</th>
        <th></th>
    </tr>
    @foreach($users as $user)
        @if($user['type'] === 1)
        <tr>
            <td>{{$user['name']}}</td>
            <td>{{$user['surname']}}</td>
            <td>{{$user['year_of_birth']}}</td>
            <td>{{$user['email']}}</td>
            <td><button class="bg-primary">Redaguoti</button></td>
        </tr>
        @endif
    @endforeach
</table>
</body>
<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>
</html>


