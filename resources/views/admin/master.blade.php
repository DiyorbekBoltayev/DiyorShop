<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="{{asset('adminassets') }}"
    data-template="vertical-menu-template-free"
>
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>DiyorShop | Admin panel</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('adminassets/img/favicon/favicon.ico')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('adminassets/vendor/fonts/boxicons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('adminassets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('adminassets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('adminassets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('adminassets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <link rel="stylesheet" href="{{asset('adminassets/vendor/libs/apex-charts/apex-charts.css')}}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{asset('adminassets/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('adminassets/js/config.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.2/datatables.min.css"/>

    <style>
        table tr:hover {
            background-color: #696cff29;
        }

        .table td, .table th {
            padding: .75rem;
            vertical-align: top;
            border-top: 2px solid #dee2e6;
        }
    </style>
</head>

<body>
@yield('content')



<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{asset('adminassets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{asset('adminassets/vendor/libs/popper/popper.js')}}"></script>
<script src="{{asset('adminassets/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('adminassets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

<script src="{{asset('adminassets/vendor/js/menu.js')}}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{asset('adminassets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('adminassets/js/main.js')}}"></script>

<!-- Page JS -->
<script src="{{asset('adminassets/js/dashboards-analytics.js')}}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{--//toastr cdn--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.2/datatables.min.js"></script>


<script>
    $(document).ready( function () {
        $('#categoryTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.category-table') }}",
                type: 'GET',
            },
            columns: [

                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, width: '5%' },
                { data: 'name', name: 'name' },
                { data: 'parent_id', name: 'parent_id' },
                { data: 'action', name: 'action' },
            ],
        });
    } );
    $(document).on('click', '.show_confirm', function (event) {
        var form = $(this).closest("form");
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-danger m-2',
                cancelButton: 'btn btn-success m-2'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Ishonchongiz komilmi?',
            text: "Bunda ushbu ma\'lumotga tegishli barcha ma\'lumotlar o\'chib ketadi!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: ' Ha, o\'chirilsin! ',
            cancelButtonText: ' Yo\'q, bekor qilinsin! ',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }

        })
    });

    function toasterOptions() {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "3000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    };


    toasterOptions();


    @if (session('success'))
        toastr.success('{{session('success')}}','Muaffaqiyatli');
    @endif
    @if (session('error'))
        toastr.error('{{session('error')}}','Xatolik');
    @endif
    @if (session('warning'))
        toastr.warning('{{session('warning')}}','Diqqat');
    @endif
    @if (session('info'))
        toastr.info('{{session('info')}}','Ma`lumot');
    @endif


</script>
</body>
</html>

