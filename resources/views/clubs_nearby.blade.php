@extends('layouts.master_self_service')

@section('subtitle', 'Clubes próximos')

@section('content')
    <div class="c-page-block">
      <div class="c-grid c-grid--h-center">
        <div class="c-col--8">
          <div class="c-content-panel">
            <h4>Clubes próximos ao CEP {{$zipCode}}</h4>

            <ul class="c-icon-list">
                <li class="c-icon-list__item">
                    <span class="c-icon c-icon--large c-icon--archive"></span>
                    <span class="c-icon-list__text">Clube XPTO - Endereço aqui - Responsável aqui</span>
                </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
@endsection