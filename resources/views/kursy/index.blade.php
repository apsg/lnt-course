@extends('layouts.app', [
    'namePage' => 'Lista kursów',
    'class' => 'sidebar-mini',
    'activePage' => 'table',
  ])

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Lista Kursów</h4>
                    </div>
                    <div class="card-body">

                        <kursy-table></kursy-table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
