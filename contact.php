        <?php include 'nav.php';
        $officeaddress = " शॉप नं : ५,  गणेशकृपा , ओल्ड कोपरी पोलीस स्टेशन समोर , ठाणे पूर्व.  ";
        ?>
        <!--================End Header Menu Area =================-->
        
        <!--================Banner Area =================-->
       <!-- <section class="banner_area">
            <div class="container">
                <div class="banner_inner_text">
                    <h2>Contact us</h2>
                </div>
            </div>
        </section> -->
        <!--================End Banner Area =================-->
        
        <!--================Get in Touch Area =================-->
        <section class="get_in_touch_area p_100">
            <div class="container">
                <div class="row get_touch_inner">
                    <div class="col-lg-6">
                        <form class="contact_us_form row" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            </div>
                             <div class="form-group col-lg-6">
                                <input type="numbar" class="form-control" id="number" name="number" placeholder="Contact Number">
                            </div>
                            <div class="form-group col-lg-12">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject*">
                            </div>
                            <div class="form-group col-lg-12">
                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Message" required></textarea>
                            </div>
                            <div class="form-group col-lg-12">
                                <button type="submit" value="submit" class="btn submit_btn form-control">Send</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <div class="touch_details">
                            <div class="l_title">
                              <!--  <img src="img/icon/title-icon.png" alt=""> -->
                                <h6> माता अनुसया प्रॉडक्शन </h6>
                              <h5><?php echo $officeaddress; ?> </h5>
                            </div>
                            <p>शाखा : मुंबईत दादर , पार्ले , बोरीवली , विरार , मुलूंड , वाशी , कल्याण
ठाणेे , डोंबिवली , बदलापूर , घाटकोपर , भांडूप , पनवेल तसेच पुणे , चिंचवड , नाशिक , कोल्हापूर , नांदेड , औरंगाबाद , नगर , कोकण , मराठवाडा व विदर्भातसूध्दा </p>
                            <a href="tel:+9769852812"><h5>Call us now</h5></a>
                            <a href="tel:+02225328919"><h4>ऑफिस नं : ०२२-२५३२८९१९</h4></a><a href="tel:9323183472"><h4> ९३२३१८३४७२ </h4></a> <a href="tel:9769852812"><h4>९७६९८५२८१२ </h4></a><a href="tel:9769852813"><h4> ९७६९८५२८१३/१४
                                 </h4></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Get in Touch Area =================-->
        
        <!--================Map Area =================-->
        <section class="contact_map_area">
           <!-- <div id="mapBox1" class="mapBox1 row m0" 
                data-lat="40.701083" 
                data-lon="-74.1522848" 
                data-zoom="15" 
                data-marker="" 
                data-info=""
                data-mlat=""
                data-mlon="">
            </div>
            <div class="map_location_box">
                <div class="container">
                    <div class="map_l_box_inner">
                        <div class="bd-callout">
                            <h3>Gibraltar Office</h3>
                            <p>Casemates Square, no253 <br /> United kingdom</p>
                            <h4><a href="#">+453678 9283 559</a> <a href="#">contact@template.com</a></h4>
                        </div>
                    </div>
                </div>
            </div> -->
<div style="width: 100%"><iframe width="100%" height="400" src="https://maps.google.com/maps?width=100%&amp;height=400&amp;hl=en&amp;q=lokmanya%20tilak%20path%2Cthane%20east+(Mata%20Anusya%20Production)&amp;ie=UTF8&amp;t=&amp;z=17&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/create-google-map/">Google Maps iframe generator</a></iframe></div><br />
   
   
   <br />
        </section>
        <!--================End Map Area =================-->
        
        <!--================Footer Area =================-->
          <?php include 'footer.php';?>
        <!--================End Footer Area =================-->
        
        
        <!--================Contact Success and Error message Area =================-->
        <div id="success" class="modal modal-message fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-close"></i>
                        </button>
                        <h2>Thank you</h2>
                        <p>Your message is successfully sent...</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modals error -->

        <div id="error" class="modal modal-message fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-close"></i>
                        </button>
                        <h2>Sorry !</h2>
                        <p> Something went wrong </p>
                    </div>
                </div>
            </div>
        </div>
        <!--================End Contact Success and Error message Area =================-->
        
        
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Rev slider js -->
        <script src="vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <!-- Extra plugin css -->
        <script src="vendors/counterup/jquery.waypoints.min.js"></script>
        <script src="vendors/counterup/jquery.counterup.min.js"></script> 
        <script src="vendors/counterup/apear.js"></script>
        <script src="vendors/counterup/countto.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="vendors/magnify-popup/jquery.magnific-popup.min.js"></script>
        <script src="js/smoothscroll.js"></script>
        <script src="vendors/circle-bar/circle-progress.min.js"></script>
        <script src="vendors/circle-bar/plugins.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope.pkgd.min.js"></script>
        
        <!--gmaps Js-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="js/gmaps.min.js"></script>
        
        <!-- contact js -->
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/contact.js"></script>
        
        <script src="js/circle-active.js"></script>
        <script src="js/theme.js"></script>
    </body>
</html>