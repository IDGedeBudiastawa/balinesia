<?php
    include("../connect.php");
    $key = $_POST['keywords'];
?>

<html>
<head>
    <title>Product result</title>
    <link rel="stylesheet" type="text/css" href=".././css/search.css">
    <script type="text/javascript" src="../jquery-ui.min.js" ></script>
	<link rel="stylesheet" type="text/css" href="../jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="../asets/css/bootstrap.min.css">
    <script src="../asets/js/bootstrap.min.js" type="text/javascript"></script>
    <style>
        html,body{
            margin:0;padding:0;height:100%;
        }
        #wrapper{
            min-height:100%;position:relative;
        }
        #body{
            padding-bottom:100px;
        }
        .footer{
            position: relative;
            margin-top: 200px; 
            bottom: 0;
            width: 100%;
            text-align: center;
            z-index: 0;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <div id="header" style="margin-top: -20px;">
                <div id="logo">
                    <a href="../"><img style="margin-top: -10px; margin-left : 10px; width: 140px"; height="90px;" src="../img/logo.png"></a>
                </div>
                <div id="kop">
                    
                </div>
                <div id="login">
                    <!-- <a href="../" id="tomreg">Home</a> -->
                    <input type="hidden" name="key" id="key" value="<?php echo $key ?>">

                    <form method="post" action="../searchresult/">    
                        <input id="keywords" style="height: 38px; width: 300px; border-width: 0px; border-radius: 4px; margin-top: -20px" type="text" name="keywords" placeholder="     Banten, upacara" required autocomplete="off">
                        <button style="margin-top: -5px; height: 36px;" type="submit" class="btn btn-info">search</button>
                    </form>
                </div>
        </div>
        <div id="body">
            <div id="isi">
                <h1 style="text-align: center; color: #487eb0;">Semua Pencarian</h1><br><br>
                <input type="hidden" name="key" id="key" value="<?php echo $key ?>">
                <div id="search1">
                    <!-- <h3 style="color: #487eb0; text-align: center;">Upacara terkait</h3> -->
                    <div id="upacara"></div>
                </div><br>
                <div id="search2">
                    <!-- <h3 style="color: #487eb0;">Banten terkait</h3> -->
                    <div id="banten"></div>
                </div>
                
            </div>            
        </div>

        <div class="footer" style="top: 100px">
            <div id="bawah">
                <div id="imfot">
                    <img style="margin-left: 80%; margin-top: 30px; width: 160px; float: left;"; height="140px;" src="../img/logo.png">
                </div>
                <div id="fotnu">
                    <p style="text-align: left;"><a href="">Privacy Policy</a></p>
                    <p style="text-align: left;"><a href="">Terms and Conditions</a></p>
                    <p style="text-align: left;"><a href="">Cooperation</a></p>
                </div>
                <div id="fotnu2">
                    <p style="text-align: left;"><a href="">Balinesia Guide</a></p>
                    <p style="text-align: left;"><a href="">News</a></p>
                    <p style="text-align: left;"><a href="">Tips Join</a></p>
                </div>
                <div id="sosmed">
                    <p>Find us at</p>
                </div>
            </div>
            <div id="foot">
                <p style="color: #57606f;">Copyright &copy; 2018 - All Rights Reserved</p>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="../asets/jquery-1.7.1.min.js" ></script>
</html>


<script type="text/javascript">
    $(document).ready(function(){
        $('#alert').hide()
        // alert('tes2');
        load_table_upacara();
        load_table_banten();
    });

    function load_table_upacara(){
        //console.log('masuk');
        // $('#modal-loading').modal('show');
        var key = $('#key').val();
        // offset = (offset-1) * 50
        // console.log(key);
        $.ajax({
            url: '../searchresult/search1.php',
            type: 'get',
            data: 'key=' +key,
            success: function(data){
                $('#upacara').html(data);
                // $('#page').on('click', function(){
                //     var offset = $('#page').val();
                //     load_table(offset);
                // });
            },

            error: function(XMLHttpRequest){
                alert(XMLHttpRequest.responseText);
            }
        });
    }

    function load_table_banten(){
        //console.log('masuk');
        // $('#modal-loading').modal('show');
        var key = $('#key').val();
        // offset = (offset-1) * 50
        // console.log(key);
        $.ajax({
            url: '../searchresult/search2.php',
            type: 'get',
            data: 'key=' +key,
            success: function(data){
                $('#banten').html(data);
                // $('#page').on('click', function(){
                //     var offset = $('#page').val();
                //     load_table(offset);
                // });
            },

            error: function(XMLHttpRequest){
                alert(XMLHttpRequest.responseText);
            }
        });
    }

</script>