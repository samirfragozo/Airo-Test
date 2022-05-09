<x-app-layout>
    <x-slot name="scripts">
        <script type="text/javascript">
            $(function () {
                $.fn.datepicker.defaults.format = 'yyyy/mm/dd';

                $('#start_date').datepicker({
                    startDate: 'today',
                });

                $('#end_date').datepicker({
                    startDate: '+1',
                });
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            });

            $(document).ready(function () {
                let form = '#quotation';

                $(form).on('submit', function (event) {
                    event.preventDefault();

                    let url = $(this).attr('data-action');

                    $.ajax({
                        url:         url,
                        method:      'POST',
                        data:        new FormData(this),
                        dataType:    'JSON',
                        contentType: false,
                        cache:       false,
                        processData: false,
                        success:     function (response) {
                            $(form).trigger('reset');
                            alert(response.success);
                        },
                        error:       function (response) {
                            alert(response.message);
                        },
                    });
                });

            });
        </script>
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form
                        data-action="{{route(App\Constants\RouteNames::API_V1_QUOTATION_POST)}}"
                        id="quotation"
                        method="POST"
                    >
                        @csrf
                        <label for="ages" class="form-label">Ages (separated by comma. Ex.: 28,35)</label>
                        <div class="input-group mb-3">
                            <input
                                aria-label="Ages"
                                class="form-control"
                                id="ages"
                                name="age"
                                placeholder="Ages"
                                type="text"
                                autofocus
                                required
                            >
                        </div>

                        <label for="currency_id" class="form-label">Currency</label>
                        <div class="input-group mb-3">
                            <select class="form-select" name="currency_id" id="currency_id">
                                <option value="EUR" selected>Euro</option>
                                <option value="GBP">Pound sterling</option>
                                <option value="USD">United States Dollar</option>
                            </select>
                        </div>

                        <label for="start_date" class="form-label">Dates</label>
                        <div class="input-group mb-3">
                            <input
                                aria-label="Start date"
                                class="form-control"
                                id="start_date"
                                name="start_date"
                                placeholder="Start Date"
                                type="text"
                                required
                            >
                            <span class="input-group-text">-</span>
                            <input
                                aria-label="End date"
                                class="form-control"
                                id="end_date"
                                name="end_date"
                                placeholder="End Date"
                                type="text"
                                required
                            >
                        </div>

                        <button type="submit" class="btn btn-primary">Calculate</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
