@extends('layouts.master_self_service')

@section('subtitle', 'Clubes próximos')

@section('content')
    <div class="c-page-block">
      <div class="c-grid c-grid--h-center">
        <div class="c-col--8">
          <div class="c-content-panel">
            <h4>Clubes próximos ao CEP {{$zipCode}}</h4>

            <div class="c-grid">
              @forelse ($clubsNearby as $club)
              <div class="c-card c-col c-col--6">
                <div class="c-card__body">
                  <h4>{{ $club->name }}</h4>
                  <p class="c-meta">a {{ $club->distance }}km</p>
                </div>

                <div class="c-card__footer">
                  <a class="c-card__link" href="#">Fale com o responsável</a>
                </div>
                @empty
                  <h4>Nenhum club encontrado</h4>
                @endforelse
              </div>            
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection