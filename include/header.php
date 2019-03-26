<div class="wrapper">         
            <div class="container-fluid   top-main-section">
                  <div class="container">
                        <div class="row top-menu">
                              <div class="col-md-4 col-sm-12 md-op1" style="padding: 0px;">
                                          <ul  class="top-bar">
                                                <li><a href="tel:+18002665090"><i class="fa fa-phone"></i>+1800 266 5090</a></li>
                                                <li><a href="mailto:india.perfect.ride786@gmail.com"><i class="fa fa-envelope"></i>india.perfect.ride786@gmail.com</a></li>                                     
                                          </ul>
                              </div>
                              <div class="col-md-4 logo col-sm-6 md-op">
                                    <a href="index.php">
                                          <h2>
                                                India Perfect Ride
                                          </h2>
                                    </a>
                              </div>
                              <div class="col-md-4 contact-list col-sm-6 md-op">
                                          <?php if(!isset($_SESSION['login']) && $_SESSION['Login'] != 'login'){ ?>
                                                <a data-fancybox data-type="iframe" data-src="login.php" href="javascript:;">
                                                      <i class="fa fa-user" aria-hidden="true"></i>Login
                                                </a>
                                          <?php }else{ ?>
                                                <a href="video.php">
                                                <i class="fa fa-video-camera" aria-hidden="true"></i>Video
                                                </a>
                                         <?php } ?>  
                              </div>
                        </div>
                  </div>                              
            </div>    