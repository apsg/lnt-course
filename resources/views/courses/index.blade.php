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
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    Nazwa
                                </th>
                                <th>
                                    Rodzaj
                                </th>
                                <th>
                                    Organizator
                                </th>
                                <th>
                                    Termin
                                </th>
                                <th class="text-right">
                                    Akcje
                                </th>
                                </thead>
                                <tbody>
                                @foreach($courses as $course)
                                    <tr>
                                        <td>
                                            <a href="{{ route('course.show', $course->id) }}">
                                                {{ $course->title }}
                                            </a>
                                        </td>
                                        <td>{{ $course->type_string }}</td>
                                        <td>{{ $course->user->public_name }}</td>
                                        <td>{{ $course->term }}</td>
                                        <td></td>
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
@endsection
