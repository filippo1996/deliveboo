@extends('layouts.app')

@section('content')
  <div class="container">

    <div class="row pt-5">

      {{-- col 1 --}}
      <div class="col-lg-4">
        {{-- Card 1 --}}
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card text_color background_color_y mb-5 box_shadows p-0">
              <div class="card-header text-center fw-bold">{{ __('Dashboard') }}</div>
                <div class="card-body text-center">
                  @if (session('status'))
                    <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                    </div>
                  @endif

                  {{ __('Login effetuato!') }}
                </div>
              </div>
            </div> 
        </div>
      </div>

      {{-- col 2 --}}
      <div class="col-lg-4">
        {{-- Card 2 --}}
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card text_color background_color_y mb-5 box_shadows p-0">
              <div class="card-header text-center fw-bold">{{ __('Elenco prodotti') }}</div>
              <div class="card-body text-center"><a href="{{ route('products.index') }}">{{ __('Visualizza prodotti') }}</a></div>
            </div>
          </div>
        </div>
      </div>

      {{-- col 3 --}}
      <div class="col-lg-4">
        {{-- Card 3 --}}
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card text_color background_color_y mb-5 box_shadows p-0">
              <div class="card-header text-center fw-bold">{{ __('Riepilogo ordini') }}</div>
              <div class="card-body text-center"><a href="{{ route('orders.index') }}">{{ __('Visualizza Ordini') }}</a></div>
            </div>
          </div>
        </div>
      </div>
     {{-- End Row  --}}
    </div>

  {{-- container --}}
  </div>
  <!-- Chart -->
  <div>
    <canvas id="chart" class="background_color_y text_color box_shadows p-0 mb-5 mx-0 mx-md-4 mx-lg-5 "></canvas>
  </div>
@endsection

@section('script-footer')
@parent
{{-- CDN Chart --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- Chart Utils --}}
<script src="./js/chart_utils.js"></script>
{{-- Chart --}}
<script>

let date, orders;
fetch('restaurant/char/orders')
    .then(response => response.json())
    .then(data => {
      orders = data.orders;
      //function char
      char();
    })
    .catch(function (error) {
      // handle error
      console.log(error);
    });   

function char() {

  const DATA_COUNT = 12;
  const NUMBER_CFG = { count: DATA_COUNT, min: 0, max: 20, from: orders };
  const date = new Date();

  const labels = Samples.utils.months({ count: 12, current: date.getMonth() });

  const data = {
    labels: labels,
    datasets: [
      {
        label: 'Ordini',
        data: Samples.utils.numbers(NUMBER_CFG),
        borderColor: chartColors.red,
        backgroundColor: Samples.utils.transparentize(chartColors.red, 0.5),
      },
      /*
      {
        label: 'Dataset 2',
        data: Samples.utils.numbers(NUMBER_CFG),
        borderColor: chartColors.blue,
        backgroundColor: Samples.utils.transparentize(chartColors.blue, 0.5),
      }
      */
    ]
  };

  const config = {
    type: 'line',
    data: data,
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        },
        title: {
          display: true,
          text: 'Grafico ordini annuale'
        }
      }
    },
  };

  const ctx = document.getElementById('chart');
  const chart = new Chart(ctx, config);

}
</script>
    
@endsection
