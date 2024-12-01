@extends('layouts.main')

@section('title', 'Freunde finden Website')
@section('content')
    <section>
        <div class="container mt-2 mb-2">
            @if (session('welcome'))
                <div class="text-center alert alert-success">{{ session('welcome') }} Bitte vervollständigen Sie <a href="settings/profile-information">hier</a> Ihr Profil.</div>
            @endif
        </div>

        <div class="container mt-2 mb-2">

            <div class="card">
                <div class="card-header card-title bg-success text-center h4">
                    <strong>به سایت دوست یابی ایرانیان مقیم آلمان خوش آمدید</strong>
                </div>
            </div>

        </div>

        <div class="container background-img">
            <div class="row">
                <div class="col-md-4 mt-5 mb-5">
                    <form style="margin-left: 10px" action="{{ route('searching') }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-header card-title bg-danger">
                              <strong>Suchen</strong>
                            </div>
                            <div class="card-body bg-light">
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="form-group mt-1 text-info">
                                            <label for="gender">Geschlecht</label>
                                            <select class="form-select" id="gender" name="gender" aria-label="Default select example">
                                                <option value="männlich">männlich</option>
                                                <option value="weiblich">weiblich</option>
                                            </select>
                                        </div>
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
                                        <div class="form-group mt-1 text-info">
                                            <label for="city">Stadt</label>
                                            <input type="text" name="city" id="city" class="form-control" aria-label="Default select example">
                                        </div>
                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-success">suchen</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </form>
                </div>
                <div class="col-md-8">
                    <div class="row mt-3" id="js-zone">
                        @foreach ($js_users as $js_user)
                        <div style="display: @if($loop->index > 7) {{ 'none' }} @else {{ 'inline' }} @endif" class="col-md-3 index-{{$loop->index}}">
                            <a href="profile/{{ $js_user->id }}">
                            <img width="180px" height="180px" src="{{$js_user->profilePictureUrl()}}" alt="">
                            <div style="color: red">{{ $js_user->name }} ({{ age($js_user->birth) }})</div>
                            </a>
                        </div>                       
                        @endforeach
                    </div>

                </div>
            </div>

            </div>
    </section>
    @include('partials._search-box')
    <section>
        <div class="container">
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
                                <p class="text-secondary">({{ age($user->birth) }}, {{ $user->city }})</p>
                            </div>
                        @endforeach
                        </div>
                        {{ $users->links() }}
                    </article>
                </div>

        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('myjs/tu06/main.js') }}" type="module" defer></script>
@endpush