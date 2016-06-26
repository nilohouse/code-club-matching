@extends('layouts.master_self_service')

@section('subtitle', 'Clubes próximos')

@section('content')
    <div class="c-page-block">
      <div class="c-grid c-grid--h-center">
        <div class="c-col--8">
          <div class="c-content-panel">
            <h4>Clubes próximos ao CEP {{$zipCode}}</h4>

            <ul class="c-icon-list">
              @forelse ($clubsNearby as $club)
                <li class="c-icon-list__item">
                    <span class="c-icon c-icon--large c-icon--archive"></span>
                    <span class="c-icon-list__text">
                    {{ $club->name }}
                    </span>
                </li>
              @empty
                <li class="c-icon-list__item">
                  Nenhum club encontrado
                </li>
              @endforelse
            </ul>
          </div>
        </div>
      </div>
    </div>
@endsection