<?php

use App\Models\Client;
use App\Models\ClientSubscription;
use App\Models\Staff;

$clientCount = Client::count();
$subscriptionCount = ClientSubscription::count();
$staffCount = Staff::count();
$clienti = ClientSubscription::select('start_subscription')->get();
$arrayMesi = [];

foreach ($clienti as $cliente) {
    $mese = date("m", strtotime($cliente['start_subscription']));
    $anno = date("Y", strtotime($cliente['start_subscription']));
    $arrayMesi[] = $mese . '-' . $anno;
}

$mesiAnno = ['Gen', 'Feb', 'Mar', 'Apr', 'Mag', 'Giu', 'Lug', 'Ago', 'Set', 'Ott', 'Nov', 'Dic'];
$abbonamentiEffettuatiPerMese = array_fill(0, 12, 0);

foreach ($arrayMesi as $meseAnno) {
    list($mese, $anno) = explode('-', $meseAnno);
    if ($anno == date("Y")) {
        $index = (int)$mese - 1;
        $abbonamentiEffettuatiPerMese[$index]++;
    }
}

?>
@extends('layouts.app')
@section('content')

    <div class="p-4 sm:ml-64">
        <div class="mt-16 p-4 rounded-lg dark:border-gray-700">
            <div class="grid grid-cols-3 gap-4 mb-4">
                <a href="{{ route('clients.index') }}">
                    <div class="items-start justify-start h-48 rounded bg-gray-50 bg-gray-800">
                        <p class="text-7xl text-white pt-10 pl-10 text-red-400">{{ $clientCount }}</p>
                        <p class="text-sm text-white uppercase py-8 pl-8">Clienti totali</p>
                    </div>
                </a>
                <a href="{{ route('clientSubscriptions.index') }}">
                    <div class=" items-center justify-center h-48 rounded bg-gray-50 bg-gray-800">
                        <p class="text-7xl text-white pt-10 pl-10 text-red-400">{{$subscriptionCount}}</p>
                        <p class="text-sm text-white uppercase py-8 pl-8">Abbonamenti totali</p>
                    </div>
                </a>
                <a href="{{ route('staff.index') }}">
                    <div class=" items-center justify-center h-48 rounded bg-gray-50 bg-gray-800">
                        <p class="text-7xl text-white pt-10 pl-10 text-red-400">{{$staffCount}}</p>
                        <p class="text-sm text-white uppercase py-8 pl-8">Personale attivo</p>
                    </div>
            </div>
            </a>
            <div class="flex items-center justify-center h-96 mb-4 rounded bg-gray-50 dark:bg-gray-800">
                <canvas id="myChart"></canvas>

                <script>
                    var mesiAnno = <?php echo json_encode($mesiAnno); ?>;
                    var abbonamentiEffettuati = <?php echo json_encode($abbonamentiEffettuatiPerMese); ?>;

                    var ctx = document.getElementById('myChart').getContext('2d');

                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: mesiAnno,
                            datasets: [{
                                label: 'Abbonamenti effettuati per mese',
                                data: abbonamentiEffettuati,
                                backgroundColor: 'rgba(245, 101, 101, 0.5)',
                                borderColor: 'rgba(245, 101, 101, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                x: {
                                    ticks: {
                                        color: 'white'
                                    }
                                },
                                y: {

                                    beginAtZero: true,
                                    ticks: {
                                        precision: 0,
                                        color: 'white',
                                        callback: function (value, index, values) {
                                            if (Math.floor(value) === value) {
                                                return value;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    });
                </script>
            </div>
        </div>
    </div>
@endsection('content')


