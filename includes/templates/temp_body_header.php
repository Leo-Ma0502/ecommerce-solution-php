<body>
    <!--header-->
    <div class="header">
        <div class="header-top">
            <div class="container">
                <div class="col-sm-5 col-md-offset-2  header-login">
                    <ul >
                        <?php 
                        if(!isset($_SESSION['user'])){
                            $auth_bar = "<li><a href='user_auth.php?section=login'>Login</a></li>";
                            $auth_bar .= "<li><a href='user_auth.php?section=register'>Signup</a></li>";
                        }
                        else{
                            $user = $_SESSION['user'];
                            $auth_bar = "<li><a href='profile.php?section=account'>$user</a></li>";
                            $auth_bar .= "<li><a href='user_auth.php?section=logout'>exit account</a></li>";
                        }
                        echo "$auth_bar";
                        ?>
                        
                    </ul>
                    
                    
                </div>
                
            </div>
        </div>
            
        <div class="container">
        
            <div class="head-top">
                <div class="col-sm-8 col-md-offset-2 h_menu4">
                    <nav class="navbar nav_bottom" role="navigation">
                        <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                            <ul class="nav navbar-nav nav_1">
                                <!-- navigation_bar -->
                                <?php echo "$navigation_bar"?> 
                                <!-- //navigation_bar -->
                            </ul>
                        </div>

                    </nav>
                </div> 
            </div>

            <div class="clearfix">
                <!---pop-up-box---->					  
                <link href="common/css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
                <script src="common/js/jquery.magnific-popup.js" type="text/javascript"></script>
                <!---//pop-up-box---->
                <div id="small-dialog" class="mfp-hide">
                    <div class="search-top">
                        <div class="login-search">
                            <input type="submit" value="">
                            <input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}">		
                        </div>
                        <p>Shopin</p>
                    </div>				
                </div>	
            </div>
	
        </div>	
    </div>
    <!--//header-->