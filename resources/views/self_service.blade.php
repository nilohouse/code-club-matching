@extends('layouts.master_self_service')

@section('subtitle', 'Eu quero')

@section('content')
    <div class="c-page-block">
      <div class="c-grid c-grid--h-center">
        <div class="c-col--8">
          <div class="c-content-panel">
            <h4>Uma rede mundial de clubes de programação para crianças</h4>

            <div class="c-col c-col--8 u-text--center">
                <form class="c-form" onsubmit="return false;">
                    <fieldset class="c-form__fieldset">
                        Eu quero

                        <select name="user-choice" id="user-choice" class="c-form__select c-form__select--inline c-form__select--width-l">
                            <option value="sign-up">ser um voluntário</option>
                            <option value="find-people">encontrar voluntários</option>
                            <option value="find-club">encontrar um clube</option>
                        </select>

                        próximo ao

                        <input type="text" name="zipcode" id="zipcode" class="c-form__input c-form__input--inline c-form__input--width-s" placeholder="CEP" maxlength="9" />

                        <button class="c-button c-button--small c-button--green">OK</button>
                    </fieldset>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('button').click(function(e) {
                var zipCode = $('#zipcode');
                var userChoice = $('#user-choice').val();

                if (cepUtils.isValid(zipCode.val())) {
                    zipCode.removeClass('c-form__input--error');
                    selfService.handle(userChoice, zipCode.val());
                } else {
                    zipCode.addClass('c-form__input--error');
                }
            });
        });
    </script>
@endsection