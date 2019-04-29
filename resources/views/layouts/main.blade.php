<html lang="en" style="height: 100%;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-commerce Site</title>
    <link rel="icon" href="/images/3669215-32.png">

    <!-- Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <link href="{{ asset('/css/menuNav.css') }}" rel="stylesheet">
    <!-- Page specific styles and scripts -->
    @yield('header')


    <!-- Custom Fonts -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    


            <!-- Html5 Shim and Respond.js IE8 support of Html5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body style="height: 100%;">
    <!-- Navigation and header -->
    <header >
        
        <div class="container">           
            <div class="row">
                <div class="col-12">
                    @include('partials.menu')
                    {{-- @include('partials.alertQuantity')   --}}
                </div>
            </div>
                               
        </div>
        
    </header>

    @include('layouts.errors')
    <!-- Content -->
    <div id="TheContentSection" class="container content">
        @yield('content') 
    </div>

    
<!-- Footer -->
<div class="container-fluid" style="margin-top: 10px;">
    <div id="rowFooter"class="row">
        <div id="footer" class="col-12 text-center col-sm-6 offset-sm-3" >
            <p>All content copyright CSC 364 Inc. 2019</p>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>

<!-- Datatables javascript library -->


<script>
    $(document).ready(function() {
        $("#msg").delay(5000).slideUp("slow");
    })
    $(document).ready(function() {
        $('input[name="action"]').val('It actually Works');
        $('#increaseButton').click(function(){
            $('input[name="action"]').val('0');
        });
        $('#decreaseButton').click(function(){
            $('input[name="action"]').val('1');
        });
        $('input[type=checkbox]').change(
            function(){
                if($(this).is(':checked')){
                    $('#billing_address').val($('#shipping_address').val());
                    $('#billing_city').val($('#shipping_city').val());
                    $('#billing_state').val($('#shipping_state').val());
                    $('#billing_zip').val($('#shipping_zip').val());                    
                }
                else {
                    $('#billing_address').val('');
                    $('#billing_city').val('');
                    $('#billing_state').val(-1);
                    $('#billing_zip').val('');
                }
            }
        )
        
    })
</script>

@yield('extraJS')

</body>
</html>

