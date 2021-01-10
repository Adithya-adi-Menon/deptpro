<?php 
include("includes/header.php");
?>
<link rel="stylesheet" href="assets/css/custom.css">
<?php 
include("includes/navbar.php");
?>


<div class="content">
            <!-- Animated -->
        <div class="animated fadeIn">

                                <ul>
                                    <li class="booking-card" style="background-image: url(https://i.pinimg.com/736x/e7/5a/cb/e75acbfa18e5439190ad06736da0f375.jpg)">
                                    <?php
                                        $branch = $_GET['branches'];
                                        $room = $_GET['room'];
                                        $brch_string = str_replace("-"," ",$branch);
                                        $brch_string1 = str_replace("-"," ",$room);
                                        date_default_timezone_set('Asia/Kolkata');
                                        $datetime = date('y-m-dCH:i+05:30');
                                       //  echo $datetime;
                                        $query = "SELECT patients.name,graph.* FROM patients INNER JOIN graph ON patients.id = graph.patient_id WHERE patients.name='$brch_string' AND graph.datetimesql='$datetime'";
                                        $query_run = mysqli_query($con,$query);
                                        if(mysqli_num_rows($query_run)>0)
                                        {
                                            while($row = mysqli_fetch_assoc($query_run))
                                            {
                                    ?>
                                    
                                    <div class="book-container">
                                            <div class="content">
                                            <button class="btn"><?php echo $row["room"]; ?></button>
                                        </div>
                                        </div>
                                        <div class="informations-container" href="https://images.homify.com/c_fill,f_auto,h_700,q_auto/v1518367533/p/photo/image/2432235/1.jpg">
                                        <h2 class="title"><?php echo $row["name"];?></h2>
                                        <!-- <p class="sub-title">Et moi un je suis sous-titre</p> -->
                                        <p class="price"><svg class="icon" style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M3,6H21V18H3V6M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M7,8A2,2 0 0,1 5,10V14A2,2 0 0,1 7,16H17A2,2 0 0,1 19,14V10A2,2 0 0,1 17,8H7Z" />
                                        </svg><?php echo $row["posture"];?></p>
                                        <div class="more-information">
                                            <div class="info-and-date-container" >
                                            <div class="box info">
                                                <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgMzY3LjIgMzY3LjIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDM2Ny4yIDM2Ny4yOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+DQo8cGF0aCBzdHlsZT0iZmlsbDojRjU1NTU3OyIgZD0iTTE4NS42LDMxMi40YzAsMC04Mi00OC44LTEyNC44LTExMC44Yy0yNC44LTM2LTI4LjQtNjcuMi0yMS4yLTkxLjZjMTAuNC0zNS4yLDUwLTcwLDEwNS4yLTQ5LjYNCgljMjYuOCwxMCw0MC44LDIxLjIsNDAuOCwyMS4yczE0LTExLjIsNDAuOC0yMS4yQzI4MS42LDQwLDMyMS4yLDc0LjgsMzMxLjYsMTEwYzcuMiwyNCwzLjYsNTUuMi0yMS4yLDkxLjYNCglDMjY3LjYsMjYzLjYsMTg1LjYsMzEyLjQsMTg1LjYsMzEyLjR6Ii8+DQo8cGF0aCBzdHlsZT0iZmlsbDojMzAzMjNBOyIgZD0iTTM2MS42LDE3OGgtMzEuMmMxMy4yLTI5LjYsMTEuNi01My4yLDYuOC02OS4yYy04LjQtMjguOC0zNi40LTU5LjYtNzguNC01OS42Yy0xMS4yLDAtMjIuNCwyLTM0LDYuNA0KCWMtMjAsNy42LTMzLjIsMTUuNi0zOC44LDE5LjZjLTYtNC0xOC44LTEyLTM4LjgtMTkuNmMtMTEuNi00LjQtMjIuOC02LjQtMzQtNi40Yy00MiwwLTcwLDMwLjgtNzguNCw1OS42DQoJYy01LjYsMTYuOC03LjIsNDIuOCw4LjgsNzUuMmgtMzhjLTMuMiwwLTUuNiwyLjQtNS42LDUuNnMyLjQsNS42LDUuNiw1LjZINTBjMiwzLjIsNCw2LjQsNiw5LjZDOTIuNCwyNTcuMiwxNzEuMiwzMTQsMTg1LjYsMzE3LjYNCgl2MC40YzAsMCwwLjQsMCwwLjgtMC40YzAuNCwwLDAuOCwwLDAuOCwwdi0wLjRjMTIuNC02LDg4LTU0LjgsMTI4LTExMi44YzMuNi01LjIsNi44LTEwLjgsOS42LTE1LjZoMzYuOGMzLjIsMCw1LjYtMi40LDUuNi01LjYNCglDMzY3LjIsMTgwLjQsMzY0LjgsMTc4LDM2MS42LDE3OHogTTQ1LjIsMTEyYzcuMi0yNC44LDMxLjYtNTEuNiw2Ny42LTUxLjZjOS42LDAsMTkuNiwyLDMwLDUuNmMyNS42LDkuNiwzOS4yLDIwLjQsMzkuMiwyMC40DQoJYzIsMS42LDUuMiwxLjYsNy4yLDBjMCwwLDEzLjYtMTAuOCwzOS4yLTIwLjRjMTAuNC0zLjYsMjAuNC01LjYsMzAtNS42YzM2LDAsNjAuNCwyNi44LDY3LjYsNTEuNmM2LDIwLjQsMi44LDQyLjgtOC40LDY2aC0zNA0KCWwtMTQuNC0yNC40Yy0wLjgtMS42LTIuOC0yLjgtNC44LTIuOHMtNCwwLjgtNC44LDIuNGwtMTIsMTcuNmwtMTkuMi02Mi40Yy0wLjgtMi40LTMuMi00LTUuNi00cy00LjgsMS42LTUuNiw0bC0zMi40LDExMi40DQoJbC0zNS4yLTkwYy0wLjgtMi0yLjgtMy42LTUuMi0zLjZzLTQuNCwxLjItNS4yLDMuMkwxMTEuNiwxODRINTYuOEM0Mi44LDE1OC40LDM4LjQsMTM0LDQ1LjIsMTEyeiBNMzA1LjYsMTk4LjQNCgljLTM3LjIsNTQtMTA1LjIsOTgtMTIwLDEwNy4yYy0xNC44LTkuMi04Mi44LTUzLjYtMTIwLTEwNy4yYy0wLjgtMS4yLTEuMi0yLTItMy4yaDUxLjZjMiwwLDQtMS4yLDUuMi0zLjJsMjMuMi00NS42bDM2LjgsOTQNCgljMC44LDIuNCwyLjgsMy42LDUuMiwzLjZjMCwwLDAsMCwwLjQsMGMyLjQsMCw0LjQtMS42LDUuMi00bDMyLTExMGwxNy4yLDU1LjZjMC44LDIsMi40LDMuNiw0LjgsNGMyLDAuNCw0LjQtMC44LDUuNi0yLjRsMTMuNi0xOS42DQoJbDExLjYsMTkuNmMxLjIsMS42LDIuOCwyLjgsNC44LDIuOGgzMC44QzMwOS42LDE5Mi40LDMwNy42LDE5NS42LDMwNS42LDE5OC40eiIvPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPC9zdmc+DQo=" />
                                        <path fill="currentColor" d="M11,9H13V7H11M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M11,17H13V11H11V17Z" />
                                        </svg>
                                                <p><?php echo $row["heartbeat"];?></p>
                                            </div>
                                            <div class="box date">
                                                <img src="data:image/svg+xml;base64,PHN2ZyBpZD0iTGF5ZXJfMSIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgNTExLjk4IDUxMS45OCIgaGVpZ2h0PSI1MTIiIHZpZXdCb3g9IjAgMCA1MTEuOTggNTExLjk4IiB3aWR0aD0iNTEyIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxnPjxnIGZpbGw9IiM0ZjY2N2EiPjxwYXRoIGQ9Im0zMTUuNDk0IDYxLjA2aDc1Ljc3NGM0LjE0MyAwIDcuNS0zLjM1OCA3LjUtNy41cy0zLjM1Ny03LjUtNy41LTcuNWgtNzUuNzc0Yy00LjE0MyAwLTcuNSAzLjM1OC03LjUgNy41czMuMzU4IDcuNSA3LjUgNy41eiIvPjxwYXRoIGQ9Im0zMTUuNDk0IDk1LjY4OWgzNy44ODdjNC4xNDMgMCA3LjUtMy4zNTggNy41LTcuNXMtMy4zNTctNy41LTcuNS03LjVoLTM3Ljg4N2MtNC4xNDMgMC03LjUgMy4zNTgtNy41IDcuNXMzLjM1OCA3LjUgNy41IDcuNXoiLz48cGF0aCBkPSJtMzkxLjI2OSAxMTUuNjg5aC03NS43NzRjLTQuMTQzIDAtNy41IDMuMzU4LTcuNSA3LjVzMy4zNTcgNy41IDcuNSA3LjVoNzUuNzc0YzQuMTQzIDAgNy41LTMuMzU4IDcuNS03LjVzLTMuMzU4LTcuNS03LjUtNy41eiIvPjxwYXRoIGQ9Im0zMTUuNDk0IDE2NS4zMThoMzcuODg3YzQuMTQzIDAgNy41LTMuMzU4IDcuNS03LjVzLTMuMzU3LTcuNS03LjUtNy41aC0zNy44ODdjLTQuMTQzIDAtNy41IDMuMzU4LTcuNSA3LjVzMy4zNTggNy41IDcuNSA3LjV6Ii8+PHBhdGggZD0ibTM5MS4yNjkgMTg0LjgwM2gtNzUuNzc0Yy00LjE0MyAwLTcuNSAzLjM1OC03LjUgNy41czMuMzU3IDcuNSA3LjUgNy41aDc1Ljc3NGM0LjE0MyAwIDcuNS0zLjM1OCA3LjUtNy41cy0zLjM1OC03LjUtNy41LTcuNXoiLz48cGF0aCBkPSJtMzE1LjQ5NCAyMzQuNDMyaDM3Ljg4N2M0LjE0MyAwIDcuNS0zLjM1OCA3LjUtNy41cy0zLjM1Ny03LjUtNy41LTcuNWgtMzcuODg3Yy00LjE0MyAwLTcuNSAzLjM1OC03LjUgNy41czMuMzU4IDcuNSA3LjUgNy41eiIvPjxwYXRoIGQ9Im0zOTEuMjY5IDI1NC41NjloLTc1Ljc3NGMtNC4xNDMgMC03LjUgMy4zNTgtNy41IDcuNXMzLjM1NyA3LjUgNy41IDcuNWg3NS43NzRjNC4xNDMgMCA3LjUtMy4zNTggNy41LTcuNXMtMy4zNTgtNy41LTcuNS03LjV6Ii8+PHBhdGggZD0ibTM1My4zODEgMjg5LjE5OGgtMzcuODg3Yy00LjE0MyAwLTcuNSAzLjM1OC03LjUgNy41czMuMzU3IDcuNSA3LjUgNy41aDM3Ljg4N2M0LjE0MyAwIDcuNS0zLjM1OCA3LjUtNy41cy0zLjM1Ny03LjUtNy41LTcuNXoiLz48L2c+PHBhdGggZD0ibTMyNi43NDEgNDA1LjIyYzAgMjguOC0xMS4zIDU1Ljc5LTMxLjggNzYuMDItMjAuMTQgMTkuODYtNDYuNyAzMC43NC03NC45NSAzMC43NC0uNTEgMC0xLjAyIDAtMS41My0uMDEtNC41Mi0uMDctOC45OS0uNDEtMTMuNDEtMS4wNC0yMi41OC0zLjE4LTQzLjU2LTEzLjU0LTYwLjExLTI5LjkzLTE5Ljc4LTE5LjU4LTMxLjA0LTQ1LjU4LTMxLjctNzMuMTktLjg5LTM3LjQyIDE3Ljg4LTcyLjQ5IDQ5LjI0LTkyLjU2di0yNTcuNzVjMC0yNi41MiAxOC4wNC00OC45IDQyLjUtNTUuNTEgNC43OC0xLjMgOS44MS0xLjk5IDE1LTEuOTkgMzEuNyAwIDU3LjUgMjUuNzkgNTcuNSA1Ny41djI1Ny43NWMzMC40OSAxOS41NCA0OS4yNiA1My42MSA0OS4yNiA4OS45N3oiIGZpbGw9IiNlOWY1ZmYiLz48cGF0aCBkPSJtMzI2Ljc0MSA0MDUuMjJjMCAyOC44LTExLjMgNTUuNzktMzEuOCA3Ni4wMi0yMC4xNCAxOS44Ni00Ni43IDMwLjc0LTc0Ljk1IDMwLjc0LTE4LjY5IDAtMzAgMC0zMCAwIDUuMDggMCAxMC4xMS0uMzUgMTUuMDYtMS4wNSAyMi41NC0zLjE2IDQzLjM4LTEzLjQgNTkuODktMjkuNjkgMjAuNTEtMjAuMjMgMzEuOC00Ny4yMiAzMS44LTc2LjAyIDAtMzYuMzYtMTguNzctNDAuMjUtNDkuMjYtNTkuNzl2LTI4Ny45M2MwLTI2LjUyLTE4LjA1LTQ4LjktNDIuNS01NS41MSA0Ljc4LTEuMyA5LjgxLTEuOTkgMTUtMS45OSAzMS43IDAgNTcuNSAyNS43OSA1Ny41IDU3LjV2MjU3Ljc1YzMwLjQ5IDE5LjU0IDQ5LjI2IDUzLjYxIDQ5LjI2IDg5Ljk3eiIgZmlsbD0iI2NkZWFmNyIvPjxnPjxwYXRoIGQ9Im0yOTYuNzQxIDQwNS4zN2MwIDIwLjctOC4xMiA0MC4xMS0yMi44NyA1NC42NS0xNC40NyAxNC4yOC0zMy42MSAyMi4xMS01My45NiAyMi4xMS0uMzUgMC0uNjkgMC0xLjAzLS4wMS0zLjg0LS4wNS03LjY0LS40LTExLjM4LTEuMDEtMTUuNTUtMi41Ny0yOS45Ny05LjkxLTQxLjQ1LTIxLjI4LTE0LjI0LTE0LjA5LTIyLjM1LTMyLjc3LTIyLjgyLTUyLjU4LS42Ni0yNy45NyAxMy45NC01NC4xMSAzOC4xLTY4LjIzIDYuODctNC4wMSAxMS4xNS0xMS40NiAxMS4xNS0xOS40MnYtMjYxLjk1YzAtMTAuNjYgNi4xLTE5LjkzIDE1LTI0LjQ5IDMuNzUtMS45MyA4LTMuMDEgMTIuNS0zLjAxIDE1LjE2IDAgMjcuNDkgMTIuMzQgMjcuNDkgMjcuNXYyNjEuOTVjMCA3Ljk2IDQuMjggMTUuNDEgMTEuMTUgMTkuNDIgMjMuNTEgMTMuNzQgMzguMTIgMzkuMTYgMzguMTIgNjYuMzV6IiBmaWxsPSIjZmY2ZTZlIi8+PHBhdGggZD0ibTI5Ni43NDEgNDA1LjM3YzAgMjAuNy04LjEyIDQwLjExLTIyLjg3IDU0LjY1LTE0LjQ3IDE0LjI4LTMzLjYxIDIyLjExLTUzLjk2IDIyLjExLS4zNSAwLS42OSAwLTEuMDMtLjAxLTMuODQtLjA1LTcuNjQtLjQtMTEuMzgtMS4wMSAxNS41Ny0yLjU0IDI5LjkzLTkuOCA0MS4zNy0yMS4wOSAxNC43NS0xNC41NCAyMi44Ny0zMy45NSAyMi44Ny01NC42NSAwLTI3LjE5LTE0LjYxLTUyLjYxLTM4LjEyLTY2LjM1LTYuODctNC4wMS0xMS4xNS0xMS40Ni0xMS4xNS0xOS40MnYtMjYxLjk1YzAtMTAuNjYtNi4xLTE5LjkyLTE0Ljk5LTI0LjQ5IDMuNzUtMS45MyA4LTMuMDEgMTIuNS0zLjAxIDE1LjE2IDAgMjcuNDkgMTIuMzQgMjcuNDkgMjcuNXYyNjEuOTVjMCA3Ljk2IDQuMjggMTUuNDEgMTEuMTUgMTkuNDIgMjMuNTEgMTMuNzQgMzguMTIgMzkuMTYgMzguMTIgNjYuMzV6IiBmaWxsPSIjZjQ0ZTkyIi8+PC9nPjxwYXRoIGQ9Im0yNDcuNDcxIDU3LjY1djY1LjU0aC01NC45OXYtNjUuNTRjMC0xMC42NiA2LjEtMTkuOTMgMTUtMjQuNDkgMy43NS0xLjkzIDgtMy4wMSAxMi41LTMuMDEgMTUuMTYgMCAyNy40OSAxMi4zNCAyNy40OSAyNy41eiIgZmlsbD0iIzRmNjY3YSIvPjxwYXRoIGQ9Im0yNDcuNDcxIDU3LjY1djY1LjU0aC0yNXYtNjUuNTRjMC0xMC42Ni02LjEtMTkuOTItMTQuOTktMjQuNDkgMy43NS0xLjkzIDgtMy4wMSAxMi41LTMuMDEgMTUuMTYgMCAyNy40OSAxMi4zNCAyNy40OSAyNy41eiIgZmlsbD0iIzNhNTM2NiIvPjwvZz48L3N2Zz4=" />
                                        <path fill="currentColor" d="M19,19H5V8H19M16,1V3H8V1H6V3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3H18V1M17,12H12V17H17V12Z" />
                                        </svg>
                                                <p><?php echo $row["temperature"];?></p>
                                            </div>
                                            </div>
                                        
                                            </div>
                                        </div>
                                        <?php }
                                        }?>
                                    </li>
                                    <div class="col-lg-3 col-md-6">
                                        <a class="btn btn-red">
                        
                        <?php
									
											echo '
											<a class="dropdown-item" href= chart.php?branches='.$branch.'&datetime='.$datetime.'>
                                            <div class="card">
                                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">Generate Statistics</div>

                                        </div>
                                    </div>
                                </div>
                            </div>
											</a>
												';
									
 							?>
                            
                        </div>
                                    
                    </div>
                                 </ul>
                           

            </div>
            <!-- .animated -->
        </div>
<div class="clearfix"></div>
<!-- Footer -->
<footer class="site-footer">
    <div class="footer-inner bg-white">
        <div class="row">
            <div class="col-sm-6">
                Copyright &copy; 
            </div>
            <div class="col-sm-6 text-right">
               
            </div>
        </div>
    </div>
</footer>
<!-- /.site-footer -->
</div>
<!-- /#right-panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>


