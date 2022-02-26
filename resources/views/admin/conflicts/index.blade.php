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
        <div id="categories">
            <h2 style="font-size: 30px;padding-top: 20px;padding-bottom: 20px;">Konfliktai</h2>

            <table id="table_id" class="display">
                <thead>
                <tr>
                    <th>Tema</th>
                    <th>Pateikęs asmuo</th>
                    <th>Kaltinamasis</th>
                    <th>Būsena</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($conflicts as $conflict)

                    <tr>
                        <td>{{$conflict->name}}</td>
                        @foreach($users as $user)
                        @if($user->id === $conflict->applicantId)
                        <td>{{$user->name.' ' .$user->surname}}</td>
                        @endif
                        @endforeach
                        @foreach($users as $user)
                        @if($user->id === $conflict->accusedId)
                        <td>{{$user->name.' ' .$user->surname}}</td>
                        @endif
                        @endforeach
                        <td>{{$conflict->state}}</td>
                        <td>
                            <a href={{"/admin/conflict/".$conflict->id}}><button class="bg-primary">Spręsti konfliktą</button></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
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
    </script>
    </body>
@endsection
