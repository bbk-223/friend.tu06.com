<section id="display-search-box" style="display: none; position: fixed; top:0; left:0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('searching') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body bg-light">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group mt-1 text-info">
                                        <label for="gender">Geschlecht</label>
                                        <select class="form-select" id="gender" name="gender" aria-label="Default select example">
                                            <option value="männlich">männlich</option>
                                            <option value="weiblich">weiblich</option>
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
                                <div class="col-md-3">
                                    <div class="form-group mt-1 text-info">
                                        <label for="city">Stadt</label>
                                        <input type="text" name="city" id="city" class="form-control">
                                    </div>
                                </div>

                            <div class="col-md-2 mt-4">
                                <button type="submit" class="btn btn-success">suchen</button>
                            </div>
                        </div>
                        </div>
                    </div>  
                </form>
            </div>
        </div>
    </section>