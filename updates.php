
        <!--================Header Menu Area =================-->
<?php include 'nav.php';?>
        <!--================End Header Menu Area =================-->
        
        <!--================Banner Area =================-->
        <section class="banner_area">
            <div class="container">
                <div class="banner_inner_text">
                    <h2>Connect with us Socially ...</h2>
                    <p>See our recent & upcoming events !!</p>
                </div>
            </div>
        </section>
        <!--================End Banner Area =================-->
        
        <!--================Blog Main Area =================-->
        <section class="blog_main_area p_100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                         
                            <div class="c_video">
                            <a  href="https://www.youtube.com/playlist?list=UUgE3QLgvvekEFtPUpRCiEQw" target="_blank"><img src="img/icon/video-icon.png" alt="">&nbsp;&nbsp;Watch All Youtube Videos </a>
                            </div><br>
                        
                                      <?php 
                        $API_key    = 'AddGoogleAPIKeyHere';
                        $channelID  = 'UCgE3QLgvvekEFtPUpRCiEQw';
                        $maxResults = 10;
                        $counter=0;
                        
                        $videoList = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$channelID.'&maxResults='.$maxResults.'&key='.$API_key.''));
                         foreach($videoList->items as $item){
                            //Embed video
                            if(isset($item->id->videoId)){
                                $counter++;
                                if($counter>5){
                                  break;
                                }
                                else{
                                  echo '<div class="youtube-video">
                                        <iframe width="80%" height="280px" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="0" allowfullscreen></iframe>
                                        <h5>'. $item->snippet->title .'</h5>
                                    </div>';  
                                }
                                
                            }
                        }
                         
                         ?>
                        
                            
                         
                        <!--<div class="blog_main_inner">-->
                             
                        <!--    <div class="blog_main_item"> -->
                        <!--        <div class="blog_img">-->
                        <!--            <img class="img-fluid" src="img/blog/blog-1.jpg" alt="">-->
                        <!--            <div class="blog_date">-->
                        <!--                <h4>29</h4>-->
                        <!--                <h5>October, 2017</h5>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--        <div class="blog_text">-->
                        <!--            <a href="#"><h4>Let us introduce you the best apps</h4></a>-->
                        <!--            <div class="blog_author">-->
                        <!--                <a href="#">By Lore Papp-Dinea</a>-->
                        <!--                <a href="#">Design</a>-->
                        <!--            </div>-->
                        <!--            <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. </p>-->
                        <!--            <a class="more_btn" href="#">Read More</a>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--    <div class="blog_main_item">-->
                        <!--        <div class="blog_img">-->
                        <!--            <img class="img-fluid" src="img/blog/blog-2.jpg" alt="">-->
                        <!--            <div class="blog_date">-->
                        <!--                <h4>29</h4>-->
                        <!--                <h5>October, 2017</h5>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--        <div class="blog_text">-->
                        <!--            <a href="#"><h4>Let us introduce you the best apps</h4></a>-->
                        <!--            <div class="blog_author">-->
                        <!--                <a href="#">By Lore Papp-Dinea</a>-->
                        <!--                <a href="#">Design</a>-->
                        <!--            </div>-->
                        <!--            <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. </p>-->
                        <!--            <a class="more_btn" href="#">Read More</a>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--    <div class="blog_main_item">-->
                        <!--        <div class="blog_img">-->
                        <!--            <img class="img-fluid" src="img/blog/blog-3.jpg" alt="">-->
                        <!--            <div class="blog_date">-->
                        <!--                <h4>29</h4>-->
                        <!--                <h5>October, 2017</h5>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--        <div class="blog_text">-->
                        <!--            <a href="#"><h4>Let us introduce you the best apps</h4></a>-->
                        <!--            <div class="blog_author">-->
                        <!--                <a href="#">By Lore Papp-Dinea</a>-->
                        <!--                <a href="#">Design</a>-->
                        <!--            </div>-->
                        <!--            <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. </p>-->
                        <!--            <a class="more_btn" href="#">Read More</a>-->
                            
                        <!--        </div>-->
                                
                        <!--    </div>-->
                            
                            
                        <!--</div>-->
                    </div>
                    <div class="col-lg-6">
                        <div class="blog_right_sidebar">
                             <aside>
                                   <div id="fb-root"></div>
        <div class="fb-like" data-href="https://www.facebook.com/MATA-Anusaya-Production-617212445121471/" data-width="200px" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div><br><br>
                                <a target="_blank" href="https://twitter.com/MataAnusayaProd?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-size="large" data-show-count="false">Follow @MataAnusayaProd</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                                <br>
                                <a target="_blank" href="https://twitter.com/intent/tweet?screen_name=MataAnusayaProd&ref_src=twsrc%5Etfw" class="twitter-mention-button" data-size="large" data-show-count="false">Tweet to @MataAnusayaProd</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                                &nbsp;OR &nbsp;
                                <a  target="_blank" href="https://twitter.com/messages/compose?recipient_id=&ref_src=twsrc%5Etfw" class="twitter-dm-button" data-screen-name="@MataAnusayaProd" data-show-count="false">Message @@MataAnusayaProd</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                            </aside>
                            
                                <div class="r_w_title">
                                   <br> <h3>Social Posts</h3>
                                </div>
                             <!--<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FMATA-Anusaya-Production-617212445121471%2F&tabs=timeline&width=700px&height=1000px&small_header=false&adapt_container_width=false&hide_cover=false&show_facepile=true&appId" width="100%" height="100%" style="border:none;" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe> -->
                         <aside>
                             <a class="twitter-timeline" href="https://twitter.com/MataAnusayaProd?ref_src=twsrc%5Etfw">Tweets by MataAnusayaProd</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                         </aside>
                                 <aside class="r_widget tag_widget">
                         
                      <?php
                    //       $lcounter=0;
                    //         foreach($videoList->items as $item){
                    //         //Embed video
                    //         if(isset($item->id->videoId)){
                    //             if($counter<=5){
                    //               break;
                    //             }
                    //             else{
                    //               $lcounter++;
                    //               if($lcounter>$counter && $lcounter<8)
                    //               echo '<div class="youtube-video">
                    //                     <iframe width="80%" height="280px" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="0" allowfullscreen></iframe>
                    //                     <h5>'. $item->snippet->title .'</h5>
                    //                 </div>';  
                    //             }
                                
                    //         }
                    //     }
                    //          ?>
                             
                         
                        </aside>
                    
                         
                          <!-- -->
                           
                            
                 
                            
                           
                        </div>
                        
                        
                            
                </div>
                <!--<nav aria-label="Page navigation example" class="pagination_area">-->
                <!--    <ul class="pagination">-->
                <!--        <li class="page-item active"><a class="page-link" href="#">01.</a></li>-->
                <!--        <li class="page-item"><a class="page-link" href="#">02.</a></li>-->
                <!--        <li class="page-item"><a class="page-link" href="#">03.</a></li>-->
                <!--        <li class="page-item"><a class="page-link" href="#">04.</a></li>-->
                <!--    </ul>-->
                <!--</nav>-->
            </div>
            </div>
        </section>
        <!--================End Blog Main Area =================-->
        
         <!--================Footer Area =================-->
          <?php include 'footer.php';?>
        <!--================End Footer Area =================-->
      
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
        
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
        
        <script src="js/circle-active.js"></script>
        <script src="js/theme.js"></script>
    </body>
</html>
