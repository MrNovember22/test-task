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

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h4>Workers list</h4>
                    </div>
                    <div class="panel-body">
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
                                        <td>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <button type="submit" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal{{ $worker->id }}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </div>
                                                <div class="col-md-3">
                                                    <form  method="POST" action="{{action('WorkersController@removeWorker', $worker->id)}}">
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        {{csrf_field()}}
                                                        <button class="btn btn-danger btn-xs" type="submit">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    {{-- WORKERS MODALS --}}
                                    <div class="modal fade" id="myModal{{ $worker->id }}" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">Edit info</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="text" class="form-group form-control" name="famimliya" value="{{ $worker->famimliya }}">
                                                    <input type="text" class="form-group form-control" name="imya" value="{{ $worker->imya }}">
                                                    <input type="text" class="form-group form-control" name="otchestvo" value="{{ $worker->otchestvo }}">
                                                    <input type="text" class="form-group form-control" name="god_rozhdeniya" value="{{ $worker->god_rozhdeniya }}">
                                                    <input type="text" class="form-group form-control" name="dolzhnost" value="{{ $worker->dolzhnost }}">
                                                    <input type="text" class="form-group form-control" name="zp_v_god" value="{{ $worker->zp_v_god }}">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <form method="POST" action="{{ action('WorkersController@saveWorker') }}" class="form-row">
                                                        {{ csrf_field() }}
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ENDWORKERS MODALS --}}
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-12">
                            <a href="{{ URL::to('export-workers') }}" class="btn btn-dark pull-right"><button class="btn btn-info">Export file</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>