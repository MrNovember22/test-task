<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Workers list</title>
    {{-- STYLES --}}
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- END STYLES --}}
</head>
<body>

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Workers
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <form method="POST" action="{{ action('WorkersController@importWorkers') }}" enctype="multipart/form-data" class="form-row">
                                        {{ csrf_field() }}
                                        <div class="col-md-10">
                                            <input type="file" name="import-file" class="form-control">
                                        </div>

                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-primary">Import file</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="col-md-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Last name</th>
                                    <th>First name</th>
                                    <th>Patronymic</th>
                                    <th>Year of birth</th>
                                    <th>The post</th>
                                    <th>Salary</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($workers as $worker)
                                    <tr id="worker-{{ $worker->id }}">
                                        <td>{{ $worker->famimliya }}</td>
                                        <td>{{ $worker->imya }}</td>
                                        <td>{{ $worker->otchestvo }}</td>
                                        <td>{{ $worker->god_rozhdeniya }}</td>
                                        <td>{{ $worker->dolzhnost }}</td>
                                        <td>{{ $worker->zp_v_god }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>