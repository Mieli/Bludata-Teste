<!-- Small boxes (Stat box) -->

  <div class="col-lg-3 col-6 pull-left">
    <!-- small box -->
    <div class="small-box {{ $color ?? 'bg-info' }}">
        <div class="inner">

          <h4>{{ $titulo ?? ''}}</h4>

          <p>{{ $texto ?? ''}}</p>

        </div>
        <div class="icon">

          <i class="{{ $icone ?? 'ion ion-bag'}}"></i>

        </div>
        <a href="{{ url( $rota ) }}" class="small-box-footer"> {{ $acao ?? '' }} <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
