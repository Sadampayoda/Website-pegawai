<!doctype html>
<html lang="en">

<head>
    <title>{{ $title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        .modal-dialog {
            max-width: 100%;
            margin: 1.75rem auto;
        }

        @media (max-width: 767px) {
            .modal-dialog {
                max-width: 90%;

            }
        }


        .btn {
            width: 100%;
            padding: 10px;
        }

        @media (min-width: 768px) {
            .btn {
                width: auto;

            }
        }


        .modal-body p {
            margin-bottom: 1rem;
        }
    </style>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('sidebar-07/css/style.css') }}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>


</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        @include('component.sidebar')
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">
            @include('component.nav')
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('sidebar-07/js/popper.js') }}"></script>
    <script src="{{ asset('sidebar-07/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('sidebar-07/js/main.js') }}"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


</body>

</html>
