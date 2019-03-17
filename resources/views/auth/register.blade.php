@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register-extended') }}">
                            @csrf

                            @php
                                $skip = array(
                                    'email_verified_at',
                                    'remember_token',
                                    'created_at',
                                    'updated_at',
                                    'id'
                                );

                                $columnListings = Schema::getColumnListing('users');
                                $autofocus = true;
                                foreach($columnListings as $listing)
                                {
                                    if(array_search($listing, $skip) > -1)
                                        continue;

                                    $attributes = DB::connection()->getDoctrineColumn('users', $listing);
                                    $attributes = $attributes->toArray();

                                    if($attributes['name'] === 'email')
                                        $attributes['type'] = 'email';
                                    else if($attributes['name'] === 'password')
                                        $attributes['type'] = 'password';
                                    else
                                        $attributes['type'] = 'text';

                                    $attributes['text'] = $attributes['name'];
                                    $attributes['text'] = preg_replace('/[^a-zA-Z]/', ' ', $attributes['text']);
                                    $attributes['text'] = ucfirst($attributes['text']);
                                    $attributes['required'] = $attributes['notnull'];

                                    $autofocus = false;

                            @endphp
                            @include('auth.register.form-group', [
                                'args' => $attributes
                            ])
                            @php
                                }

                            @endphp

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
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