@extends('layouts.admin_navbar')

@section('content')
    <head>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
        <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    </head>
    <body>
<div class="container" style="font-size: 20px">
    <label for="standard-select">Tipas:</label>
    <div class="select">
        <select>
            <option value="Default">Pasirinkite naudotojo tipą</option>
            <option value="Klientai">Klientai</option>
            <option value="Laisvai samdomi darbuotojai">Laisvai samdomi darbuotojai</option>
            <option value="Moderatoriai">Moderatoriai</option>
        </select>
        <span class="focus"></span>
    </div>
    <div id="clients">
        <h2 style="font-size: 30px;padding-top: 20px;padding-bottom: 20px;">Klientai</h2>

        <table id="table_id" class="display">
            <thead>
            <tr>
                <th>Vardas</th>
                <th>Pavardė</th>
                <th>Gimimo data</th>
                <th>El. paštas</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                @if($user['type'] === 0)
                    <tr>
                        <td>{{$user['name']}}</td>
                        <td>{{$user['surname']}}</td>
                        <td>{{$user['year_of_birth']}}</td>
                        <td>{{$user['email']}}</td>
                        <td>
                            <a href={{"/admin/user/".$user['id']}}><button class="bg-primary">Peržiūrėti</button></a>
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
<div id="freelancers">
    <h2 style="font-size: 30px; padding-top: 20px; padding-bottom: 20px;">Laisvai samdomi darbuotojai</h2>

    <table id="table_id1" class="display">
        <thead>
        <tr>
            <th>Vardas</th>
            <th>Pavardė</th>
            <th>Gimimo data</th>
            <th>El. paštas</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            @if($user['type'] === 1)
                <tr>
                    <td>{{$user['name']}}</td>
                    <td>{{$user['surname']}}</td>
                    <td>{{$user['year_of_birth']}}</td>
                    <td>{{$user['email']}}</td>
                    <td>
                        <a href={{"/admin/user/".$user['id']}}><button class="bg-primary">Peržiūrėti</button></a>
                    </td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</div>
<div id="moderators">
    <h2 style="font-size: 30px; padding-top: 20px; padding-bottom: 20px;">Moderatoriai</h2>

    <table id="table_id2" class="display">
        <thead>
        <tr>
            <th>Vardas</th>
            <th>Pavardė</th>
            <th>Gimimo data</th>
            <th>El. paštas</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            @if($user['type'] === 3)
                <tr>
                    <td>{{$user['name']}}</td>
                    <td>{{$user['surname']}}</td>
                    <td>{{$user['year_of_birth']}}</td>
                    <td>{{$user['email']}}</td>
                    <td>
                        <a href="/admin/user/{{$user['id']}}"><button class="bg-primary">Peržiūrėti</button></a>
                    </td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</div>
</div>
<script>
    $(document).ready(function(){
        let clients = document.getElementById("clients");
        let freelancers = document.getElementById("freelancers");
        let moderators = document.getElementById("moderators");
        clients.style.display = "none";
        freelancers.style.display = "none";
        moderators.style.display = "none";
        $('select').change(function(){
            if ($(this).val() == "Klientai") {
                clients.style.display = "block";
                freelancers.style.display = "none";
                moderators.style.display = "none";
            } else if ($(this).val() == "Laisvai samdomi darbuotojai") {
                freelancers.style.display = "block";
                clients.style.display = "none";
                moderators.style.display = "none";
            } else if ($(this).val() == "Moderatoriai") {
                moderators.style.display = "block";
                clients.style.display = "none";
                freelancers.style.display = "none";
            } else if ($(this).val() == "Default") {
                moderators.style.display = "none";
                clients.style.display = "none";
                freelancers.style.display = "none";
            }
        });
    });
    $(document).ready(function() {
        $('#table_id').DataTable( {
            "language": {
                "decimal":        "",
                "emptyTable":     "Nėra duomenų",
                "info":           "Rodoma nuo _START_ iki _END_ iš _TOTAL_ įrašų",
                "infoEmpty":      "Rodoma nuo 0 iki 0 iš 0 įrašų",
                "infoFiltered":   "(išfiltruota iš _MAX_ įrašų)",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "Rodyti _MENU_ įrašų",
                "loadingRecords": "Ieškoma...",
                "processing":     "Ieškoma...",
                "search":         "Paieška:",
                "zeroRecords":    "Nėra įrašų",
                "paginate": {
                    "first":      "Pirmas",
                    "last":       "Paskutinis",
                    "next":       "Kitas",
                    "previous":   "Ankstesnis"
                },
                "aria": {
                    "sortAscending":  ": aktyvuoti filtravimą didėjimo tvarka",
                    "sortDescending": ": aktyvuoti filtavimą mažėjimo tvarka"
                }
            }
        } );
    } );
    $(document).ready(function() {
        $('#table_id1').DataTable( {
            "language": {
                "decimal":        "",
                "emptyTable":     "Nėra duomenų",
                "info":           "Rodoma nuo _START_ iki _END_ iš _TOTAL_ įrašų",
                "infoEmpty":      "Rodoma nuo 0 iki 0 iš 0 įrašų",
                "infoFiltered":   "(išfiltruota iš _MAX_ įrašų)",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "Rodyti _MENU_ įrašų",
                "loadingRecords": "Ieškoma...",
                "processing":     "Ieškoma...",
                "search":         "Paieška:",
                "zeroRecords":    "Nėra įrašų",
                "paginate": {
                    "first":      "Pirmas",
                    "last":       "Paskutinis",
                    "next":       "Kitas",
                    "previous":   "Ankstesnis"
                },
                "aria": {
                    "sortAscending":  ": aktyvuoti filtravimą didėjimo tvarka",
                    "sortDescending": ": aktyvuoti filtavimą mažėjimo tvarka"
                }
            }
        } );
    } );
    $(document).ready(function() {
        $('#table_id2').DataTable( {
            "language": {
                "decimal":        "",
                "emptyTable":     "Nėra duomenų",
                "info":           "Rodoma nuo _START_ iki _END_ iš _TOTAL_ įrašų",
                "infoEmpty":      "Rodoma nuo 0 iki 0 iš 0 įrašų",
                "infoFiltered":   "(išfiltruota iš _MAX_ įrašų)",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "Rodyti _MENU_ įrašų",
                "loadingRecords": "Ieškoma...",
                "processing":     "Ieškoma...",
                "search":         "Paieška:",
                "zeroRecords":    "Nėra įrašų",
                "paginate": {
                    "first":      "Pirmas",
                    "last":       "Paskutinis",
                    "next":       "Kitas",
                    "previous":   "Ankstesnis"
                },
                "aria": {
                    "sortAscending":  ": aktyvuoti filtravimą didėjimo tvarka",
                    "sortDescending": ": aktyvuoti filtavimą mažėjimo tvarka"
                }
            }
        } );
    } );
</script>
    </body>
@endsection


