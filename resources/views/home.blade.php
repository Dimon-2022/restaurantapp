<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <a href="/management">
                            <h4>Management</h4>
                            <img width="50" alt="Management" src="{{ asset('images/monitor.png') }}">
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a href="/cashier">
                            <h4>Cashier</h4>
                            <img width="50" alt="Management" src="{{ asset('images/clerk.png') }}">
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a href="/report">
                            <h4>Report</h4>
                            <img width="50" alt="Management" src="{{ asset('images/aggregate.png') }}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
