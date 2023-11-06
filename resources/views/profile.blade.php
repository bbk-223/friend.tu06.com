@extends('layouts.main')

@section('title', '{{ $user->name }} Profile')

@section('content')
    
    <section class="mt-2">
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-1">
                    <img src="{{ $user->profilePictureUrl() }}" alt="..." style="width:280px; height:280px">
                    <div class="mt-3" style="position: relative; left:1rem">
                        <div class="d-inline">
                            <a style="text-decoration:none; color:violet;" href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-chat-square-text" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-2.5a2 2 0 0 0-1.6.8L8 14.333 6.1 11.8a2 2 0 0 0-1.6-.8H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                    <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                </svg>
                                Nachright
                            </a>              
                        </div>
                        <div class="d-inline">
                            <a style="text-decoration:none; color:violet" href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                                Addieren
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                <table class="table table-bordered border-primary">
                    <tbody>
                        <tr class="table-primary">
                            <td>Name</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr class="table-primary">
                            <td>Geschlecht</td>
                            <td>{{ ucfirst($user->gender) }}</td>
                        </tr>
                        <tr class="table-primary">
                            <td>Alter</td>
                            <td>{{ ucfirst($user->alter) }}</td>
                        </tr>
                        <tr class="table-primary">
                            <td>Beziehung</td>
                            <td>{{ ucfirst($user->relationship) }}</td>
                        </tr>
                        <tr class="table-primary">
                            <td>Land</td>
                            <td>{{ ucfirst($user->country) }}</td>
                        </tr>
                        <tr class="table-primary">
                            <td>Bundesland</td>
                            <td>{{ ucfirst($user->state) }}</td>
                        </tr>
                        <tr class="table-primary">
                            <td>Stadt</td>
                            <td>{{ ucfirst($user->city) }}</td>
                        </tr>
                        <tr class="table-primary">
                            <td>Hobbys</td>
                            <td>{{ ucfirst($user->favorites) }}</td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
            <div class="row justify-content-center">

            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row mt-2">
                <div class="col-md-12 mt-4">
                    <form action="{{ route('search') }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-header card-title bg-danger">
                              <strong>Suchen</strong>
                            </div>
                            <div class="card-body bg-light">
                                <div class="row">
                                    <div class="col-md-4">
                                        @if (session('status') === 'profile-information-updated')
                                            <div class="alert alert-success">Profile has been updated.</div>
                                        @endif
                                        <div class="form-group mt-1 text-info">
                                            <label for="gender">Geschlecht</label>
                                            <select class="form-select" id="gender" name="gender" aria-label="Default select example">
                                                <option value="male">männlich</option>
                                                <option value="female">weiblich</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mt-1 text-info">
                                            <label for="age">Alter (von bis)</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select class="form-select" id="age" name="age1" aria-label="Default select example">
                                                        @for ($i = 18; $i < 90; $i++)
                                                        <option {{ $i == 25 ? 'selected' : '' }} value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select class="form-select" id="age" name="age2" aria-label="Default select example">
                                                        @for ($i = 18; $i < 90; $i++)
                                                        <option {{ $i == 35 ? 'selected' : '' }} value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mt-1 text-info">
                                            <label for="city">Stadt</label>
                                            <input type="text" name="city" id="city" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-success">suchen</button>
                                </div>

                            </div>
                        </div>  
                    </form>
                </div>
            </div>
    </section>
    <section>
        <div class="container">
            <div class="row">

                <div class="card mt-2">
                    <div class="card-header card-title bg-success">
                        <strong>Personen</strong>
                    </div>
                </div>

                <div class="card-body mt-2">
                    <article id="searched">
                        <div class="row">
                        @foreach ($users as $user)
                            <div class="col-md-3">
                                <a href="profile/{{ $user->id }}">
                                    <img class="person-img" src="{{ $user->profilePictureUrl() }}" alt="Profile Picture">
                                    <div class="mt-1 text-info">{{ $user->name }}</div>
                                </a>
                                <p class="text-secondary">({{ $user->age }}, {{ $user->city }})</p>
                            </div>
                        @endforeach
                        </div>
                        {{ $users->links() }}
                    </article>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush