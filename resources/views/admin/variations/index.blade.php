@extends('admin.master')
@section('content')
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            @include('admin.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                @include('admin.navbar')

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="card">
                                <div class="card-header">

                                    <div class="d-flex justify-content-between">
                                        <div class="">
                                            <h2 class="text text-dark">Variatsiyalar ro'yhati</h2>
                                        </div>
                                        <div class="">
                                            <a href="{{route('admin.variations.create')}}" class="btn btn-primary">Yangi variatsiya qo'shish</a>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="variationTable" data-order='[[ 1, "asc" ]]' class="table table-bordered table-striped table-hover hover">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nomi</th>
                                            <th scope="col">Parent</th>
                                            <th scope="col">Amallar</th>
                                        </tr>
                                        </thead>
                                        <tbody>


                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
@endsection
