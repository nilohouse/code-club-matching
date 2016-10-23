@extends('layouts.master_form')

@section('subtitle', 'Seja um voluntário')

@section('content')
    <form class="c-form" action="/registrar-voluntario" method="POST">
    {{ csrf_field() }}
        <fieldset class="c-form__fieldset">
            <input class="c-form__input c-form__input--width-xl" name="name" placeholder="Seu nome" type="text">
            <input class="c-form__input c-form__input--width-xl" name="email" placeholder="Seu e-mail" type="text">
            <input class="c-form__input c-form__input--width-xl" name="birth" placeholder="Data de nascimento" type="text">
            <input class="c-form__input c-form__input--width-xl" name="zipcode" placeholder="CEP" type="text">
            <button type="submit" class="c-button c-button--green">Enviar</button>
        </fieldset>
    </form>
@endsection