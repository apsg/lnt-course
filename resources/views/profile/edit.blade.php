@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Profil użytkownika',
    'activePage' => 'profile',
    'activeNav' => '',
])

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Edytuj profil</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.update') }}" autocomplete="off"
                              enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            @include('alerts.success')
                            <div class="row">
                            </div>
                            <div class="row">
                                <div class="col-md-7 pr-1">
                                    <div class="form-group">
                                        <label>{{__("Name")}}</label>
                                        <input type="text" name="name" class="form-control"
                                               value="{{ old('name', auth()->user()->name) }}">
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 pr-1">
                                    <div class="form-group">
                                        <label>Imię i nazwisko</label>
                                        <input type="text" name="full_name" class="form-control"
                                               value="{{ old('full_name', auth()->user()->full_name) }}">
                                        <p class="small text-dark">To, co tu wpiszesz będzie pojawiać się na listach
                                            publicznych, jeśli wyrazisz
                                            zgodę na publikację.
                                            To imię również będzie używane przy autogenerowanych certyfikatach.</p>
                                        @include('alerts.feedback', ['field' => 'full_name'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 pr-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{__("Email address")}}</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                               value="{{ old('email', auth()->user()->email) }}">
                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>
                                </div>
                            </div>

                            <stopien selected="{{ old('stopien', auth()->user()->stopien) }}"></stopien>

                            <choragiew
                                selected="{{ old('choragiew', auth()->user()->choragiew) }}"
                                classes="col-md-7"
                            ></choragiew>

                            <okk selected="{{ old('okk', auth()->user()->okk)  }}"></okk>

                            <div class="card-footer ">
                                <button type="submit" class="btn btn-primary btn-round">Zapisz</button>
                            </div>
                            <hr class="half-rule"/>
                        </form>
                    </div>
                    <div class="card-header">
                        <h5 class="title">Hasło</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                            @csrf
                            @method('put')
                            @include('alerts.success', ['key' => 'password_status'])
                            <div class="row">
                                <div class="col-md-7 pr-1">
                                    <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <label>Aktualne hasło</label>
                                        <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               name="old_password" placeholder="{{ __('Current Password') }}"
                                               type="password" required>
                                        @include('alerts.feedback', ['field' => 'old_password'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 pr-1">
                                    <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <label>{{__("New password")}}</label>
                                        <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               placeholder="{{ __('New password') }}" type="password" name="password"
                                               required>
                                        @include('alerts.feedback', ['field' => 'password'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 pr-1">
                                    <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <label>{{__("Confirm New Password")}}</label>
                                        <input class="form-control" placeholder="{{ __('Confirm New Password') }}"
                                               type="password" name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit"
                                        class="btn btn-primary btn-round ">{{__('Change Password')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="{{asset('assets')}}/img/bg5.jpg" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray" src="{{ auth()->user()->gravatar }}"
                                     alt="...">
                                <h5 class="title">{{ auth()->user()->name }}</h5>
                            </a>
                            <p class="description">
                                {{ auth()->user()->email }}
                            </p>
                        </div>
                        <hr/>
                        <h5 class="title">Twoje uprawnienia:</h5>
                        <ul>
                            @foreach(auth()->user()->roles as $role)
                                <li>{{ __('roles.'.$role->name) }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    import Choragiew from "../../js/components/Choragiew";

    export default {
        components: {Choragiew}
    }
</script>
