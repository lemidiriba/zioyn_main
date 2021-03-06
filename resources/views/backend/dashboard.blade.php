@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="content-header">
        </div>
        <!--content-header-->
        
        <div class="row">
            <div class="col-md-12">
                 <section class="contact-section">
                <div class="container">
                    <div class="d-none d-sm-block mb-5 pb-4">
                        <div id="map" style="height: 480px; position: relative; overflow: hidden;">
                            
                        </div>
                        <script>
                            mapboxgl.accessToken = 'pk.eyJ1IjoibGVtaWRpcmliYTUiLCJhIjoiY2tldzRsbDh5MGNnNjMzbjRxcXpoOTlrMiJ9.BqwKg3xJ-37JsFO8RI-hWw';
                            var map = new mapboxgl.Map({
container: 'map',
style: 'mapbox://styles/mapbox/streets-v11',
zoom: 13,
center: [4.899, 52.372]
});
</script>

Copy

                    </div>
                    </div>
                    </section>
            </div>
            <div class="col-md-3">
                {{-- <canvas id="stats-doughnut-chart" height="300"></canvas> --}}
                <!-- Button trigger modal -->



            </div>

            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-4 col-sm-6 mb-3">
                        <div class="card level-card level-all ">
                            <div class="card-header">
                                <span class="level-icon"><i class="fa fa-fw fa-list"></i></span> All School
                            </div>
                            <div class="card-body" googl="true">
                                {{ $total_school }} entries - 100%
                                <div class="progress">
                                    <div class="progress-bar" style="width: {{ $total_school }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-3">
                        <div class="card level-card level-emergency level-empty">
                            <div class="card-header">
                                <span class="level-icon"><i class="fa fa-fw fa-bug"></i></span> Activated School
                            </div>
                            <div class="card-body">
                                {{ $active_school }} entries - 0%
                                <div class="progress">
                                    <div class="progress-bar" style="width: {{ $active_school }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-3">
                        <div class="card level-card level-alert level-empty">
                            <div class="card-header">
                                <span class="level-icon"><i class="fa fa-fw fa-bullhorn"></i></span> Pending School
                            </div>
                            <div class="card-body">
                                0 entries - 0%
                                <div class="progress">
                                    <div class="progress-bar" style="width: 0%"></div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!--animated-->
</div>
@endsection

@push('after-scripts')
<script>
    window.onload = function () {
        $.ajaxSetup({

        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

                    $('#table').DataTable({
                    serverSide: true,
                    ordering: true,
                    processing: true,
                   "lengthMenu": [10, 20, 50, 100, 200, 5000,1000000],
                    ajax: '{{ route("admin.schoolData") }}',
                    columns: [{
                            data: 'id',
                            name: 'id',
                            type: "readonly"

                            // "render": function (data, type, row, meta) {
                            //     if (type === 'display') {
                            //         data = '<a href="/' +
                            //             row.id + '">' + data + '</a>';
                            //     }
                            //     return data;
                            // }
                        },
                       {
                            data: 'schoolname',
                            name: 'schoolname'
                        },{
                            data: 'schooladdress',
                            name: 'schooladdress'
                        },
                        {
                            data: 'schoolregion',
                            name: 'schoolregion'
                        },
                       {
                            data: 'schoolphone',
                            name: 'schoolphone'
                        },{
                            data: 'schoolidentificationid',
                            name: 'schoolidentificationid',
                            type: "readonly"

                        },



                    ],
                    dom: 'Bfrtip', // Needs button container
                    select: 'single',
                    responsive: true,
                    altEditor: true, // Enable altEditor
                    buttons: [
                    {
                        extend: 'selected', // Bind to Selected row
                        text: 'Edit',
                        name: 'edit' // do not change name
                    },

                    ],
                    onEditRow: function(datatable, rowdata, success, error) {
                        $.ajax({
                        // a tipycal url would be /{id} with type='POST'
                            url: '/admin/ministry/'  + rowdata.id ,
                            type: 'PATCH',
                            // dataType: 'json',
                            data: rowdata,
                            success: success,
                            error: error
                        });
                    }

                    });

        }



</script>
@endpush
{{-- <script>

</script> --}}