@extends('layouts.app', ['authgroup' => 'admin'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('店舗登録')}}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('create')}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="shop_name" class="col-md-4 col-form-label text-md-end">{{ __('店名') }}</label>

                            <div class="col-md-6">
                                <input id="shop_name" type="text" class="form-control @error('shop_mame') is-invalid @enderror" name="shop_name" value="{{ old('shop_name') }}" required autocomplete="shop_name" autofocus>

                                @error('shop_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="shop_pref" class="col-md-4 col-form-label text-md-end">{{ __('住所（都道府県）') }}</label>

                            <div class="col-md-6">
                                <input id="shop_pref" type="text" class="form-control @error('shop_pref') is-invalid @enderror" name="shop_pref" value="{{ old('shop_pref') }}" required autocomplete="shop_pref" autofocus>

                                @error('shop_pref')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="shop_city" class="col-md-4 col-form-label text-md-end">{{ __('住所（市町村）') }}</label>

                            <div class="col-md-6">
                                <input id="shop_city" type="text" class="form-control @error('shop_city') is-invalid @enderror" name="shop_city" required autocomplete="shop_city">

                                @error('shop_city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nearest_station" class="col-md-4 col-form-label text-md-end">{{ __('最寄駅') }}</label>

                            <div class="col-md-6">
                                <input id="nearest_station" type="text" class="form-control @error('nearest_station') is-invalid @enderror" name="nearest_station" required autocomplete="nearest_station">

                                @error('nearest_station')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="budget_min" class="col-md-4 col-form-label text-md-end">{{ __('予算下限') }}</label>

                            <div class="col-md-6">
                                <input id="budget_min" type="number" class="form-control @error('budget_min') is-invalid @enderror" name="budget_min" value="{{ old('budget_min') }}" required autocomplete="budget_min" autofocus>

                                @error('budget_min')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="budget_max" class="col-md-4 col-form-label text-md-end">{{ __('予算上限') }}</label>

                            <div class="col-md-6">
                                <input id="budget_max" type="number" class="form-control @error('budget_max') is-invalid @enderror" name="budget_max" required autocomplete="budget_max">

                                @error('budget_max')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection