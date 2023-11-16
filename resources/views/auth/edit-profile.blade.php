@extends('layouts.main')

@section('title', 'Profilinformationen bearbeiten')

@section('content')
<main class="py-5">
    <div class="container">
      <div class="row">
        @include('auth._sidenav')

        <div class="col-md-9">
            <form action="{{ route('user-profile-information.update') }}" method="POST" enctype="multipart/form-data">                
                @csrf
                @method('PUT')
              <div class="card">
                <div class="card-header card-title">
                  <strong>Profil bearbeiten</strong>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-8">
                        @if (session('status') === 'profile-information-updated')
                            <div class="alert alert-success">Profil wurde aktualisiert.</div>
                        @endif
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" id="name" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" id="email" class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="form-group mt-1">
                        <label for="gender">Geschlecht</label>
                        <select class="form-select" id="gender" name="gender" aria-label="Default select example">
                            <option {{ $user->gender == 'männlich' ? 'selected' : '' }} value="männlich">männlich</option>
                            <option {{ $user->gender == 'weiblich' ? 'selected' : '' }} value="weiblich">weiblich</option>
                        </select>
                      </div>

                      <div class="form-group mt-1">
                        <label for="age">Alter</label>
                        <select class="form-select" id="age" name="age" aria-label="Default select example">
                            @for ($i = 18; $i < 90; $i++)
                            <option {{ $user->age == "$i" ? 'selected' : '' }} value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                      </div>

                      <div class="form-group mt-1">
                        <label for="relationship">Beziehung</label>
                        <select class="form-select" id="relationship" name="relationship" aria-label="Default select example">
                            <option {{ $user->relationship == 'single' ? 'selected' : '' }} value="single">Single</option>
                            <option {{ $user->relationship == 'verheiratet' ? 'selected' : '' }} value="verheiratet">Verheiratet</option>
                            <option {{ $user->relationship == 'geschieden' ? 'selected' : '' }} value="geschieden">Geschieden</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="country">Land</label>
                        <input type="text" name="country" id="country" value="Deutschland" readonly class="form-control">
                      </div>

                      <div class="form-group">
                        <label for="state">Bundesland</label>
                        <input type="text" name="state" value="{{ old('state', $user->state) }}" id="state" class="form-control">
                      </div>

                      <div class="form-group">
                        <label for="city">Stadt</label>
                        <input type="text" name="city" value="{{ old('city', $user->city) }}" id="city" class="form-control">
                      </div>

                      <div class="form-group mt-1">
                        <label for="">Ich suche nach (Alter)</label>
                        <div class="row want-age">
                        von
                        <div class="col-md-4">
                        <select class="form-select" id="start_want_age" name="start_want_age" aria-label="Default select example">
                            @for ($i = 18; $i < 90; $i++)
                            <option {{ $user->start_want_age == "$i" ? 'selected' : '' }} value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        </div>
                        bis
                        <div class="col-md-4">
                        <select class="form-select" id="end_want_age" name="end_want_age" aria-label="Default select example">
                            @for ($i = 18; $i < 90; $i++)
                            <option {{ $user->end_want_age == "$i" ? 'selected' : '' }} value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        </div>
                      </div>
                      </div>

                      <div class="form-group">
                        <label for="favorites">Hobbys</label>
                        <textarea name="favorites" id="favorites" rows="3" class="form-control">{{ old('favorites', $user->favorites) }}</textarea>                      </div>
                    </div>

                    <div class="offset-md-1 col-md-3">
                        <div class="form-group">
                          <label for="bio">Profilbild</label>
                          <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new img-thumbnail" style="width: 150px; height: 150px;">
                              <img src="{{ $user->profilePictureUrl() }}" alt="..." style="width: 150px; height: 150px;">
                            </div>
                            <div class="fileinput-preview fileinput-exists img-thumbnail"
                              style="max-width: 150px; max-height: 150px;"></div>
                            <div class="mt-2">
                              <span class="btn btn-outline-secondary btn-file"><span class="fileinput-new">Bild auswählen
                                </span><span class="fileinput-exists">Ändern</span><input type="file"
                                  name="profile_picture" accept="image/*"></span>
                              <a href="#" class="btn btn-outline-secondary fileinput-exists"
                                data-dismiss="fileinput">Entfernen</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="row">
                      <div class="col-md-8">
                        <div class="row">
                          <div class="col-md-offset-3 col-md-6">
                            <button type="submit" class="btn btn-success">Profil aktualisieren</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </main>
  @endsection

@push('styles')
<link href="{{ asset('css/jasny-bootstrap.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('js/jasny-bootstrap.min.js') }}"></script>
@endpush