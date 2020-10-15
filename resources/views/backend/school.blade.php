@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')

<div class="col-md-12 col-sm-12 mb-3">
    <div class="card level-card level-critical level-empty">
        <div class="card-header">
            <span class="level-icon"><i class="fa fa-fw fa-heartbeat"></i></span> Added School List
            <span class=" float-sm-right"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                    data-target="#modelId">
                    Add School
                </button></span>

        </div>
        <div class="card-body">

            <table id="table" class="table font-weight-normal pb-0 fade-in" style="width:100%">
                <thead>
                    <tr>

                        <th>no</th>
                        <th>School Name</th>
                        <th>School Address</th>
                        <th>School Region</th>
                        <th>School Phone</th>
                        <th>School Id</th>

                    </tr>
                </thead>

                </tbody>

            </table>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add School </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ html()->form('POST', route('admin.ministry.store'))->class('form-contact contact_form')->open() }}

                <div class="modal-body">
                    <div class="container-fluid">

                        <div class="col-lg-12">

                            <div class="col col-sm-12 align-self-center">

                                <!--card-header-->

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            {{ html()->label("School Name")->for('school_name') }}

                                            {{ html()->text('school_name')
                                                                                        ->class('form-control')
                                                                                        ->placeholder("School Name")
                                                                                        ->attribute('maxlength', 191)
                                                                                        ->required()}}
                                        </div>
                                        <!--col-->
                                    </div>
                                    <!--row-->

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            {{ html()->label("School Address")->for('school_address') }}

                                            {{ html()->text('school_address')
                                                                                                    ->class('form-control')
                                                                                                    ->placeholder('School Address')
                                                                                                    ->attribute('maxlength', 191)
                                                                                                    ->required() }}
                                        </div>
                                        <!--form-group-->
                                    </div>
                                    <!--col-->
                                </div>
                                <!--row-->

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            {{ html()->label("School Rigion")->for('school_region') }}

                                            {{ html()->text('school_region')
                                                                                                    ->class('form-control')
                                                                                                    ->placeholder("school_region")
                                                                                                    ->attribute('maxlength', 191)
                                                                                                    ->required() }}
                                        </div>
                                        <!--form-group-->
                                    </div>
                                    <!--col-->
                                </div>
                                <!--row-->

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            {{ html()->label("School Phone")->for('school_phone') }}

                                            {{ html()->text('school_phone')
                                                                                                    ->class('form-control')
                                                                                                    ->placeholder("school_phone")
                                                                                                    ->required() }}
                                        </div>
                                        <!--form-group-->
                                    </div>
                                    <!--col-->
                                </div>
                                <!--row-->

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            {{ html()->label("School Identification Id")->for('school_identification_id') }}

                                            {{ html()->text('school_identification_id')
                                                                                                                ->class('form-control')
                                                                                                                ->placeholder("School Identification Id")
                                                                                                                ->required() }}
                                        </div>
                                        <!--form-group-->
                                    </div>
                                    <!--col-->
                                </div>
                                <!--row-->

                            </div><!-- col-md-12 -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                {{ html()->form()->close() }}

            </div>

        </div>
    </div>


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
                    {
                        extend: 'selected', // Bind to Selected row
                        text: 'Delete',
                        name: 'delete' // do not change name
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
                    },
                     onDeleteRow: function(datatable, rowdata, success, error) {
            $.ajax({
                // a tipycal url would be /{id} with type='DELETE'
                url: '/admin/ministry/'  + rowdata.id ,
                type: 'DELETE',
                data: rowdata,
                success: success,
                error: error
            });
        },

                    });

        }



</script>
@endpush