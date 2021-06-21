<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{ asset('/') }}/admin/css/styles.css" rel="stylesheet" />
        <!-- <link href="{{ asset('/') }}/admin/css/bootstrap.min.css" rel="stylesheet" /> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

        <script src="{{ asset('/') }}/admin/ckeditor/ckeditor.js"></script>
        <script src="{{ asset('/') }}/admin/ckeditor/samples/js/sample.js"></script>
        <link rel="stylesheet" href="{{ asset('/') }}/admin/ckeditor/samples/css/samples.css">
        <link rel="stylesheet" href="{{ asset('/') }}/admin/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">

    </head>
    <body class="sb-nav-fixed">
        
        @include('admin.include.header')

        <div id="layoutSidenav">

        @include('admin.include.menu')
            
            <div id="layoutSidenav_content">
                <main>
                    
                    @yield('content')

                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="{{ asset('/') }}/admin/js/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('/') }}/admin/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('/') }}/admin/assets/demo/chart-area-demo.js"></script>
        <script src="{{ asset('/') }}/admin/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{ asset('/') }}/admin/js/datatables-simple-demo.js"></script>
        <script>
            $(document).ready(function(){
                $('#deleteMassage').click(function(){
                    $(this).text(' ');
                });
            });
        </script>
        <script>
            initSample();
        </script>
    </body>
</html>
