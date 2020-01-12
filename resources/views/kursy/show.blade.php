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
                        <h4 class="card-title">{{ $course->title }}</h4>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Termin:</h5>
                                {{ $course->term }}
                            </div>
                            <div class="col-md-3">
                                <h5>Organizator:</h5>
                                {{ $course->user->public_name }}
                            </div>
                            <div class="col-md-3">
                                <h5>Lokalizacja:</h5>
                                {{ $course->location }} (Chorągiew {{ $course->choragiew }})
                            </div>
                            <div class="col-md-3">
                                <h5>Typ:</h5>
                                {{ $course->type_string }}
                            </div>
                        </div>
                        <hr/>
                    </div>
                    <div class="card-body">
                        {!! $course->description !!}
                    </div>
                    <div class="card-footer">
                        <a href="" class="btn btn-green">Zgłoś się na ten kurs</a>
                        <a href="" class="btn btn-secondary">Zadaj pytanie organizatorowi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
