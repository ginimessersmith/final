<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
                    <h3 class="font-semibold text-lg text-gray-900 dark:text-gray-100">Estadísticas</h3>
                    <div class="flex gap-2">
                        <div class="bg-green-200 dark:bg-green-700 mt-5 p-3 rounded-lg flex flex-col justify-center">
                            <p class="font-bold text-gray-900">Pizza mas vendida: <span class="font-normal">{{$pizzaMasVendida['pizza']->nombre ?? 'N/A'}}</span></p>
                            <p class="text-gray-900">Vendida: <span>{{$pizzaMasVendida['total_pedidos'] ?? '0'}}</span> veces</p>
                        </div>
                        <div class="bg-red-200 dark:bg-red-700 mt-5 p-3 rounded-lg flex flex-col justify-center">
                            <p class="font-bold text-gray-900">Pizza menos vendida: <span class="font-normal">{{$pizzaMenosVendida['pizza']->nombre ?? 'N/A'}}</span></p>
                            <p class="text-gray-900">Vendida: <span>{{$pizzaMenosVendida['total_pedidos'] ?? '0'}}</span> veces</p>
                        </div>
                        <div class="bg-blue-200 dark:bg-blue-700 mt-5 p-3 rounded-lg">
                            <p class="font-bold text-gray-900">Cantidad de usuarios: <span class="font-normal">{{$cantUser}}</span></p>
                            <p class="text-gray-900">Cantidad de clientes: <span>{{$cantClientes}}</span></p>
                            <p class="text-gray-900">Cantidad de administradores: <span>{{$cantAdmin}}</span></p>
                            <p class="text-gray-900">Cantidad de cajeros: <span>{{$cantCajeros}}</span></p>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="mt-5 p-3 rounded-lg">
                            <h3 class="font-semibold text-lg">
                                {{$user_month_chart->options['chart_title']}}
                            </h3>
                                {!! $user_month_chart->renderHtml() !!}
                        </div>
                        <div class="mt-5 p-3 rounded-lg">
                            <h3 class="font-semibold text-lg">
                                {{$pedidos_month_chart->options['chart_title']}}
                            </h3>
                                {!! $pedidos_month_chart->renderHtml() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-visits> {{$visits->cant}} </x-visits>
    @section('scripts')
    {!! $user_month_chart->renderChartJsLibrary() !!}
    {!! $user_month_chart->renderJs() !!}
    {!! $pedidos_month_chart->renderChartJsLibrary() !!}
    {!! $pedidos_month_chart->renderJs() !!}
    @endsection
</x-app-layout>
