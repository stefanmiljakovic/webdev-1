@php

$bladeArguments = new \App\Helper\BladeArguments([
    'name' => 'name',
    'text' => 'Name',
    'required' => true,
    'type' => 'text',
    'autofocus' => false
]);

$arguments = $bladeArguments->purgeArguments($args)->getArguments();

if($arguments['required'])
    $arguments['required'] = 'required';
else
    $arguments['required'] = '';

if($arguments['autofocus'])
    $arguments['autofocus'] = 'autofocus';
else
    $arguments['autofocus'] = '';

@endphp


<div class="form-group row @if($arguments['required']) required @endif ">
    <label for="{{$arguments['name']}}" class="col-md-4 col-form-label text-md-right">
        {{ __($arguments['text']) }}
    </label>
    <div class="col-md-6">
        <input id="{{$arguments['name']}}"
               type="{{$arguments['type']}}"
               class="form-control{{ $errors->has($arguments['name']) ? ' is-invalid' : '' }}"
               name="{{$arguments['name']}}"
               value="{{ old($arguments['name']) }}"
               {{$arguments['required']}} {{$arguments['autofocus']}} />

        @if ($errors->has($arguments['name']))
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first($arguments['name']) }}</strong>
            </span>
        @endif
    </div>
</div>

@if($arguments['name'] === 'password')
    <div class="form-group row required">
        <label for="password-confirm"
               class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }} </label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control"
                   name="password_confirmation" required>
        </div>
    </div>
@endif