<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <title>
    	Dashboard | 
    	@stack('title')
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('links/backend/01')}}/assets/images/favicon.ico">

    <!-- DataTables -->
    <link href="{{asset('links/backend/01')}}/{{asset('links/backend/01')}}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('links/backend/01')}}/{{asset('links/backend/01')}}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Select datatable -->
    <link href="{{asset('links/backend/01')}}/{{asset('links/backend/01')}}/assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable -->
    <link href="{{asset('links/backend/01')}}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{asset('links/backend/01')}}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('links/backend/01')}}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('links/backend/01')}}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    @stack('css')
</head>



<body data-sidebar="light">

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


		<!-----------------------Header section---------------------------------->
			@include('backend.manpower.layouts.partials.header')
		<!-----------------------Header section---------------------------------->



        <!-- ========== Left Sidebar Start ========== -->
	        <!-----------------------Header section---------------------------------->
			    @include('backend.manpower.layouts.partials.sidebar')
			<!-----------------------Header section---------------------------------->
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">


                	<!-- start only class = row --->
                	<!------------------- Page content ------------------>
                	@yield('content')
                	<!------------------- Page content ------------------>
                	<!-- start only class = row --->
                   

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->



	        <!-----------------------Header section---------------------------------->
			    @include('backend.manpower.layouts.partials.footer')
			<!-----------------------Header section---------------------------------->
            

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

   
 

    <!-- JAVASCRIPT -->
    <script src="{{asset('links/backend/01')}}/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{asset('links/backend/01')}}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('links/backend/01')}}/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{asset('links/backend/01')}}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{asset('links/backend/01')}}/assets/libs/node-waves/waves.min.js"></script>
    <script src="{{asset('links/backend/01')}}/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="{{asset('links/backend/01')}}/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="{{asset('links/backend/01')}}/assets/libs/feather-icons/feather.min.js"></script>

    <!-- Required datatable js -->
    <script src="{{asset('links/backend/01')}}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('links/backend/01')}}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

    <!-- Buttons examples -->
    <script src="{{asset('links/backend/01')}}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('links/backend/01')}}/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{asset('links/backend/01')}}/assets/libs/jszip/jszip.min.js"></script>
    <script src="{{asset('links/backend/01')}}/assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{asset('links/backend/01')}}/assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="{{asset('links/backend/01')}}/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{asset('links/backend/01')}}/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{asset('links/backend/01')}}/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="{{asset('links/backend/01')}}/assets/libs/datatables.net-keyTable/js/dataTables.keyTable.min.html"></script>
    <script src="{{asset('links/backend/01')}}/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>

    <!-- Responsive examples -->
    <script src="{{asset('links/backend/01')}}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('links/backend/01')}}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="{{asset('links/backend/01')}}/assets/js/pages/datatables.init.js"></script>


    <script src="{{asset('links/backend/01')}}/assets/js/app.js"></script>
            <!-----for Ajax handeling----->
    <script type="text/javascript">
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
    </script>
    <!-----for Ajax handeling----->
    @stack('js')
</body>
</html>