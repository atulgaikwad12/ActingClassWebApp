<?php
                    	require('admin/config/config.php');
                    	require('admin/config/db.php');
                    	
                        $batchquery = "SELECT * FROM batch";
                        $batch_array = array();
                        $result = $conn->query($batchquery);
                        while ($row = $result->fetch_assoc()) {
                        $batch_array[] = $row;
                        }

                    	
                        function unique_multidim_array($array, $key) { 
                        $temp_array = array(); 
                        $i = 0; 
                        $key_array = array(); 
                        
                        foreach($array as $val) { 
                        if (!in_array($val[$key], $key_array)) { 
                        $key_array[$i] = $val[$key]; 
                        $temp_array[$i] = $val; 
                        $i++; 
                        } 
                        
                        } 
                        
                        return $key_array;
                        } 
                	
                    	$bnamearray = array();
                    	$bnamearray = unique_multidim_array($batch_array,'b_name');
                    	
                    // 	sending data of inquiry form
                    	
                    	if(isset($_POST['inquirySend'])){
                    	    $fname=mysqli_real_escape_string($conn,$_POST['fname']);
                    	    $lname=mysqli_real_escape_string($conn,$_POST['lname']);
                    	    $sage=mysqli_real_escape_string($conn,$_POST['sage']);
                    	    $pcontact=mysqli_real_escape_string($conn,$_POST['pcontact']);
                    	    $pemail=mysqli_real_escape_string($conn,$_POST['pemail']);
                    	    $city=mysqli_real_escape_string($conn,$_POST['city']);
                    	    $inquirymsg=mysqli_real_escape_string($conn,$_POST['inquirymsg']);
                    	    
                    	    
                    	   
                    	    $year = date('Y');
                    	    $batch = "Diwali Vacation";
                    	    $parent_name = "Not Available";
                    	    $pnumber = 0000000000;
                    	    $adress ="Not Available";
                    	    $reference = mysqli_real_escape_string($conn,$_POST['reference']);
                    	    
                            $date = date('Y-m-d_H:i:s');
                            $trans_id = $date."_".$batch_code_result;
                            
                    	    $fullname = $fname." ".$lname;
                    	    
                            if($sage==" " || $sage=="" || $sage==NULL)
                            {
                            $sage=0;
                            }
                            
                       
                            if($pemail==" " || $pemail=="" || $pemail==NULL)
                            {
                            $pemail= "Not Available";
                            }
                        

                            if($inquirymsg==" " || $inquirymsg=="" || $inquirymsg==NULL)
                            {
                            $inquirymsg= "Not Available";
                            }
                    	    
                            // function to return batch code
                            function getbatchcode($array,$branch,$batch,$year) { 
                            $batchcode = " "; 
                            foreach($array as $val) { 
                            if ($val['b_name'] == $branch && $val['b_type'] == $batch && $val['byear'] == $year) { 
                            
                            $batchcode=$val['batch_code'];
                            return $batchcode;
                            
                            } 
                            
                            } 
                            return $batchcode;
                            } 
                            
            	            $batch_code_result = getbatchcode($batch_array,$city,$batch,$year);
            	            
                            $student_query = "INSERT INTO student(fname, lname, age, contact, parent_name, parent_contact, parent_email, adress, batch_code, reference, currenttype) 
                            VALUES('$fname', '$lname', '$sage', '$pcontact', '$parent_name', '$pnumber', '$pemail', '$adress', '$batch_code_result', '$reference','inquiry')";
                    	    
                            $pay_query = "INSERT INTO payment(trans_id, snumber, sname, type, tdate, batch_code, operation_by, remark, amount) 
                            VALUES('$trans_id', '$pcontact', '$fullname', 'inquiry', '$date', '$batch_code_result', 'SELF', '$inquirymsg', '0')";

                    	    if(mysqli_query($conn, $student_query) && mysqli_query($conn, $pay_query)){
                    	        $smsg ="Thank You! Your Inquiry Successfully Added.";
                    	        echo '<script>alert("'.$smsg.'");window.history.back();</script>';
                    	    }
                    	}
    
                       
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" 
         content="acting school kids children academy drama classes theater play rolepaly chotabheem nayanaapte pravinbharde mataanusya mataanusayaproduction dramaproduction movieproduction serialproduction theaterproduction natak balnatak monoacting monoactingcompetetion anusaya personalitydevelopement stage">

        <meta name="description" 
         content="Mata Anusya Production - the Acting academy and Production house">
        
        <link rel="icon" href="img/logo/MataNew.png" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>  माता अनुसया प्रॉडक्शन.  </title>
        
    


        <!-- Icon css link -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Rev slider css -->
        <link href="vendors/revolution/css/settings.css" rel="stylesheet">
        <link href="vendors/revolution/css/layers.css" rel="stylesheet">
        <link href="vendors/revolution/css/navigation.css" rel="stylesheet">
        
        <!-- Extra plugin css -->
        <link href="vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
        
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        
        <!-- Start WOW Slider.com HEAD section -->
           <!--<link rel="stylesheet" type="text/css" href="engine1/style.css" />-->
           <!--<script type="text/javascript" src="engine1/jquery.js"></script>-->
<!-- End WOW Slider.com HEAD section -->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- animated modal -->
        <link rel="stylesheet" href="css/frontPage.css">
        <!-- custom css file -->
        <link rel="stylesheet" href="css/custom.css">
        <style>
            .main_menu_area .navbar .navbar-toggler span {
  height: 3px;
  width: 25px;
  display: block;
  background: #fff !important;
  margin-bottom: 3px;
}
        </style>
           
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            
            <script>
            $(document).ready(function(){
            $('#contactForm').hide();
            $("#newuser").click(function(){
            $("#formExpand").hide();
            $("#contactForm").show();
            $("#sendButton").show();
            });
            $("#olduser").click(function(){
            $("#formExpand").show();
            $("#contactForm").hide();
            $("#sendButton").hide();
            });
            });
            </script>
      <style>
            #overlay{
                 background-color:rgba(0,0,0,0.4);
                 position:fixed;
                 
                 width:100%;
                 height:100%;
                 top:0;
                 z-index:2;
                 left:0;
                 right:0;
                 bottom:0;
            }
            
      </style>     
    </head>
    <body>
         
        <!--================Header Menu Area =================-->
        <header class="main_menu_area">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#"><img height="100px" widht="120px" src="img/logo/XXX.png" alt="Mata Anusaya Production"></a> 
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="index.php"><font style="color:#fff">Home</font></a></li>
                        <li class="nav-item"><a class="nav-link" href="about-us.php"><font style="color:#fff">   आमच्या बद्दल   </font></a></li>
                        <li class="nav-item"><a class="nav-link" href="batches.php"><font style="color:#fff">Batches </font></a></li>
                       
                        <li class="nav-item dropdown submenu">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <font style="color:#fff"> 
आमचे वैशिष्टय   </font>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="nav-item"><a class="nav-link" href="balnatya.php"><font style="color:#fff">  बाळनाट्य  </font></a></li>
                                 <!--<li class="nav-item"><a class="nav-link" href="balnatya.php"><font style="color:#fff">व्यावसायिक  नाटक  </font></a></li>-->
                                <!--<li class="nav-item"><a class="nav-link" href="balnatya.php"><font style="color:#fff">  मालीका </font> </a></li>-->
                                <li class="nav-item"><a class="nav-link" href="chitrapat.php"><font style="color:#fff">  चित्रपट  </font>  </a></li>
                                <!--<li class="nav-item"><a class="nav-link" href="balnatya.php"><font style="color:#fff">Album</font></a></li>-->
                                <!--<li class="nav-item"><a class="nav-link" href="balnatya.php"><font style="color:#fff">  स्पर्धा  </font></a></li>-->
                            </ul>
                        </li>
                         <li class="nav-item"><a class="nav-link" href="updates.php"><font style="color:#fff">Updates</font></a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php"><font style="color:#fff">  संपर्क साधा  </font></a></li>
                    </ul>
                </div>
            </nav>
        </header>
        
        <!--================End Header Menu Area =================-->
  
     <style>
         .tp-leftarrow{
             display:none !important;
         }
         .tp-rightarrow{
             display:none !important;
         }
         .tp-bullet{
             display:none !important;
         }
         .slidertext{
             position: absolute;
             bottom:80px !important;
             margin-left:60% !important;
             max-width:400px;
         }
         @media only screen and (max-width: 700px) {
                   .slidertext{
             position: absolute;
             bottom:5px !important;
             margin-left:2% !important;
             max-width:400px;
         }
        
                }
        @media only screen and (max-width: 700px) and (min-width:500px) {
         .resback{
             width: 100% !important;
             height: 100% !important;
             min-height: 100% !important;
             margin-bottom:80% !important;
             /*background-size: cover!important;*/
              /*height: auto !important;*/
         }
        }
         @media only screen and (max-width: 499px) and (min-width:200px) {
         .resback{
             width: 100% !important;
             height: 100% !important;
             margin-bottom:120% !important;
             background-size: cover!important;
              /*height: auto !important;*/
         }
        }
     </style>
        <!--================Slider Area ================= -->
        <section class="main_slider_area" >
            <div id="overlay"> </div>
                 <font style="color:white;">
                  <div id="main_slider" class="rev_slider" data-version="5.3.1.6">
                <ul>
                   <li data-index="rs-1587" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300" data-rotate="0"  data-saveperformance="off"  data-title="Creative" data-param1="01" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                     
                    
                        <div class="slider_text_box">
                            <div class="tp-caption tp-resizeme first_text" 
                            data-x="['left','left','left','left','15','center']" 
                            data-hoffset="['0','80','80','0']" 
                            data-y="['top','top','top','top']" 
                            data-voffset="['170','170','170','170','70','70']" 
                            data-fontsize="['40','40','40','40','40','30']"
                            data-lineheight="['62','62','62','62','62','42']"
                            data-width="['none']"
                            data-height="none"
                            data-whitespace="nowrape"
                            data-type="text" 
                            data-responsive_offset="on" 
                            data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                            data-textAlign="['left','left','left','left','left','center']">
                                <font style="color:#fff">
                                Welcome To <br>
                            
                            माता अनुसया प्रॉडक्शन.
                            
                            </font></div>
                            
                            <div class="tp-caption tp-resizeme secand_text" 
                                data-x="['left','left','left','left','15','center']" 
                                data-hoffset="['0','80','80','0']" 
                                data-y="['top','top','top','top']" 
                                data-voffset="['320','320','320',320','160','160']"  
                                data-fontsize="['20','20','20','18','16','16']"
                                data-lineheight="['36','36','36','26','26','26']"
                                data-width="['none','none','none','none','none']"
                                data-height="none"
                                data-whitespace="nowrape"
                                data-type="text" 
                                data-responsive_offset="on"
                                data-transform_idle="o:1;"
                                data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                data-textAlign="['left','left','left','left','left','center']">
                                 <font style="color:#fff">
                                &nbsp;&nbsp;
                                मुलांसाठी बालनाटय शिबिरे / कार्यशाळा
                                <br>&nbsp;&nbsp;
                                बालनाटयांची निर्मिती
                                <br>&nbsp;&nbsp;
                                वेगवेगळया स्पर्धांचे  आयोजन
                                <br>
                                 &nbsp;&nbsp;
                                मोठयांसाठी / पालकांसाठी अभिनय प्रशिक्षणयशाळा
                                <br>&nbsp;&nbsp;
                                व्यावसायिक नाटकांची निर्मितीमिती
                                <br>&nbsp;&nbsp;
                                नाटक - सिनेमा साप्ताहिकाची निर्मिती
                                <br>&nbsp;&nbsp;
                                टि. व्ही . मालीका व चित्रपट निर्मिती
                                <br>
                                
                                </font>
                            </div>
                            
                            <div class="tp-caption tp-resizeme" 
                                data-x="['left','left','left','left','15','center']" data-hoffset="['0','80','80','0']" 
                                data-y="['top','top','top','top']" 
                                data-voffset="['590','590','590','520','380','350']"
                                data-fontsize="['14','14','14','14']"
                                data-lineheight="['46','46','46','46']"
                                data-width="none"
                                data-height="none"
                                data-whitespace="nowrap"
                                data-type="text" 
                                data-responsive_offset="on" 
                                data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">
                                <a class="more_btn" data-toggle="modal" data-target="#modalInquiryForm"  >
                                    
                                    Inquiry करा !!
                                    
                                    </a>
                            </div>



                            <!--<div class="tp-caption tp-resizeme single_img" -->
                            <!--data-x="['right','right','right','right','right','right']" -->
                            <!--data-hoffset="['0','0','0','0']" -->
                            <!--data-y="['top','top','top','top']" -->
                            <!--data-voffset="['180','180','180','180','0']" -->
                            <!--data-fontsize="['20','20','20','20','20']"-->
                            <!--data-lineheight="['75','75','75','50','35']"-->
                            <!--data-width="['550','550','550','550','550']"-->
                            <!--data-height="['500','500','500','500','500']"-->
                            <!--data-whitespace="normal"-->
                            <!--data-type="text" -->
                            <!--data-responsive_offset="on" -->
                            <!--data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"-->
                            <!--data-textAlign="['left','left','left','left','left','center']">-->
                            <!--    <h7>  राष्ट्रीय पुरस्कार विजेत्या अभिनेती  नयना आपटे बाळ कलाकारानं सोबत.    </h7>-->
                            <!--    <img src="img/home-slider/homeslider1.jpg" alt="" style="border-radius: 8px;" >-->
                               
                            <!--</div> -->
                        </div>
                    </li>
                 
                   <!--<li data-index="rs-1588" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300" data-rotate="0"  data-saveperformance="off"  data-title="Creative" data-param1="01" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">-->
                     
                    
                   <!--     <div class="slider_text_box">-->
                   <!--         <div class="tp-caption tp-resizeme first_text" -->
                   <!--         data-x="['left','left','left','left','15','center']" -->
                   <!--         data-hoffset="['0','80','80','0']" -->
                   <!--         data-y="['top','top','top','top']" -->
                   <!--         data-voffset="['170','170','170','170','120','120']" -->
                   <!--         data-fontsize="['40','40','40','40','40','30']"-->
                   <!--         data-lineheight="['62','62','62','62','62','42']"-->
                   <!--         data-width="['none']"-->
                   <!--         data-height="none"-->
                   <!--         data-whitespace="nowrape"-->
                   <!--         data-type="text" -->
                   <!--         data-responsive_offset="on" -->
                   <!--         data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"-->
                   <!--         data-textAlign="['left','left','left','left','left','center']">-->
                   <!--             <font style="color:#fff">-->
                   <!--             Welcome To <br>-->
                            
                   <!--         माता अनुसया प्रॉडक्शन.-->
                            
                   <!--         </font></div>-->
                            
                   <!--         <div class="tp-caption tp-resizeme secand_text" -->
                   <!--             data-x="['right','right','right','right','15','center']" -->
                   <!--             data-hoffset="['0','80','80','0']" -->
                   <!--             data-y="['top','top','top','top']" -->
                   <!--             data-voffset="['320','320','320',320','210','210']"  -->
                   <!--             data-fontsize="['20','20','20','18','16','16']"-->
                   <!--             data-lineheight="['36','36','36','26','26','26']"-->
                   <!--             data-width="['none','none','none','none','none']"-->
                   <!--             data-height="none"-->
                   <!--             data-whitespace="nowrape"-->
                   <!--             data-type="text" -->
                   <!--             data-responsive_offset="on"-->
                   <!--             data-transform_idle="o:1;"-->
                   <!--             data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"-->
                   <!--             data-textAlign="['left','left','left','left','left','center']">-->
                   <!--              <font style="color:#fff">-->
                   <!--             &nbsp;&nbsp;-->
                   <!--             मुलांसाठी बालनाटय शिबिरे / कार्यशाळा-->
                   <!--             <br>&nbsp;&nbsp;-->
                   <!--             बालनाटयांची निर्मिती-->
                   <!--             <br>&nbsp;&nbsp;-->
                   <!--             वेगवेगळया स्पर्धांचे  आयोजन-->
                   <!--             <br>-->
                   <!--              &nbsp;&nbsp;-->
                   <!--             मोठयांसाठी / पालकांसाठी अभिनय प्रशिक्षणयशाळा-->
                   <!--             <br>&nbsp;&nbsp;-->
                   <!--             व्यावसायिक नाटकांची निर्मितीमिती-->
                   <!--             <br>&nbsp;&nbsp;-->
                   <!--             नाटक - सिनेमा साप्ताहिकाची निर्मिती-->
                   <!--             <br>&nbsp;&nbsp;-->
                   <!--             टि. व्ही . मालीका व चित्रपट निर्मिती-->
                   <!--             <br>-->
                                
                   <!--             </font>-->
                   <!--         </div>-->
                            
                   <!--         <div class="tp-caption tp-resizeme" -->
                   <!--             data-x="['left','left','left','left','15','center']" data-hoffset="['0','80','80','0']" -->
                   <!--             data-y="['top','top','top','top']" -->
                   <!--             data-voffset="['590','590','590','520','450','420']" -->
                   <!--             data-fontsize="['14','14','14','14']"-->
                   <!--             data-lineheight="['46','46','46','46']"-->
                   <!--             data-width="none"-->
                   <!--             data-height="none"-->
                   <!--             data-whitespace="nowrap"-->
                   <!--             data-type="text" -->
                   <!--             data-responsive_offset="on" -->
                   <!--             data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">-->
                   <!--             <a class="more_btn" data-toggle="modal" data-target="#modalInquiryForm"  >-->
                                    
                   <!--                 Inquiry करा !!-->
                                    
                   <!--                 </a>-->
                   <!--         </div>-->



                            <!--<div class="tp-caption tp-resizeme single_img" -->
                            <!--data-x="['right','right','right','right','right','right']" -->
                            <!--data-hoffset="['0','0','0','0']" -->
                            <!--data-y="['top','top','top','top']" -->
                            <!--data-voffset="['180','180','180','180','0']" -->
                            <!--data-fontsize="['20','20','20','20','20']"-->
                            <!--data-lineheight="['75','75','75','50','35']"-->
                            <!--data-width="['550','550','550','550','550']"-->
                            <!--data-height="['500','500','500','500','500']"-->
                            <!--data-whitespace="normal"-->
                            <!--data-type="text" -->
                            <!--data-responsive_offset="on" -->
                            <!--data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"-->
                            <!--data-textAlign="['left','left','left','left','left','center']">-->
                            <!--    <h7>  राष्ट्रीय पुरस्कार विजेत्या अभिनेती  नयना आपटे बाळ कलाकारानं सोबत.    </h7>-->
                            <!--    <img src="img/home-slider/homeslider1.jpg" alt="" style="border-radius: 8px;" >-->
                               
                            <!--</div> -->
                   <!--     </div>-->
                   <!-- </li>-->
                 
                   
                </ul>
            </div> 
                  
              </font>
                
        
           
        </section>  
        <!--================End Slider Area =================-->
        <div class="slideshow" >
             
        	<ul>
        	 
              <li><span>Image 01</span><div><img src="img/banner/12.jpg" style="margin-bottom:5%" class="resback" ></div>
             <div class="slidertext" ><font style="color:white;font-size: 25px;background-color:rgba(1,1,1,0.4);">  <i class="fa fa-quote-left" style="color:purple;"></i>
            राष्ट्रीय पुरस्कार विजेत्या अभिनेती  नयना आपटे बाळ कलाकारानं सोबत.      
           <i class="fa fa-quote-right" style="color:purple;"></i>   </font></div>
            </li>
               <li><span>Image 02</span><div>
                   <img src="img/banner/chalahawayevudya.JPG" style="min-width:100%;min-height:100%;margin-bottom:20%" class="resback"></div>
                   <div class="slidertext" ><font style="color:white;font-size: 25px;background-color:rgba(1,1,1,0.4);">  <i class="fa fa-quote-left" style="color:purple;"></i>
                    चला हवा येऊ द्या च्या स्टेजवर माता अनुसया प्रॉडकशन चा विद्यार्थी अर्णव कालकुंद्री  
               <i class="fa fa-quote-right" style="color:purple;"></i>    </font></div>
                   </li>
                    <li><span>Image 03</span><div>
                   <img src="img/banner/hrithikroshanKalyan.jpg" style="min-width:100%;min-height:100%;margin-bottom:20%" class="resback"></div>
                   <div class="slidertext" ><font style="color:white;font-size: 25px;background-color:rgba(1,1,1,0.4);"><i class="fa fa-quote-left" style="color:purple;"></i>
                          माता अनुसया प्रॉडकशन चा कल्याण बॅचचा विद्यार्थी प्रॉडक्ट ऍड मधे     
                        <i class="fa fa-quote-right" style="color:purple;"></i>      </font></div>
                   </li>
            <li><span>Image 04</span><div><img src="img/banner/anishrailkar.jpg" style="min-width:100%;min-height:100%;margin-bottom:20%" class="resback">    </div>
                <div class="slidertext" ><font style="color:white;font-size: 25px;background-color:rgba(1,1,1,0.4);">  <i class="fa fa-quote-left" style="color:purple;"></i>
            Rality Show मधे माता अनुसया प्रॉडकशन चा विद्यार्थी  अनिश राइलकर 
          <i class="fa fa-quote-right" style="color:purple;"></i>     </font></div>
        </li>
         <li><span>Image 05</span><div>
                   <img src="img/banner/HrudayantarTrushikashinde.jpg" style="min-width:100%;height:100%;min-height:100%;max-height:1000px;margin-bottom:25%" class="resback"></div>
                   <div class="slidertext" ><font style="color:white;font-size: 25px;background-color:rgba(1,1,1,0.4);"><i class="fa fa-quote-left" style="color:purple;"></i>
                         तृषिक शिंदे माता अनुसया प्रॉडकशन ची विद्यार्थी  हृदयानंतर चित्रपटात      
                       <i class="fa fa-quote-right" style="color:purple;"></i>       </font></div>
                   </li>
         <li><span>Image 06</span><div>
                   <img src="img/banner/ratnashinde.JPG" style="min-width:100%;height:100%;max-height:1000px;" class="resback"></div>
                   <div class="slidertext" ><font style="color:white;font-size: 25px;background-color:rgba(1,1,1,0.4);"><i class="fa fa-quote-left" style="color:purple;"></i>
                          माता अनुसया प्रॉडकशन चा विद्यार्थी रतन शिंदे सोनी टीव्ही च्या मालिकेत      
                       <i class="fa fa-quote-right" style="color:purple;"></i>       </font></div>
                   </li>
            
           
            <li><span>Image 07</span><div> <img src="img/banner/vijumane.jpg" class="resback"></div>
            <div class="slidertext"  ><font style="color:white;font-size: 25px;background-color:rgba(1,1,1,0.4);"> <i class="fa fa-quote-left" style="color:purple;"></i>
            सुप्रसिध्द अभिनेता विजू माने विद्यार्थींचे  कौतुक करताना.   
          <i class="fa fa-quote-right" style="color:purple;"></i>      </font></div>
            </li>
           <!--   <li><span>Image 08</span><div><img src="img/banner/12.jpg" style="margin-bottom:5%" ></div>-->
           <!--  <div style="position: absolute; bottom: 80px; left:60%; max-width:400px;"><font style="color:white;font-size: 25px;background-color:rgba(1,1,1,0.4);">  <i class="fa fa-quote-left" style="color:purple;"></i>-->
           <!-- राष्ट्रीय पुरस्कार विजेत्या अभिनेती  नयना आपटे बाळ कलाकारानं सोबत.      -->
           <!--<i class="fa fa-quote-right" style="color:purple;"></i>   </font></div>-->
           <!-- </li>-->
           </ul>
        </div>
        <!--================Feature Area =================-->
      <!--  <section class="feature_area">
            <div class="container">
                <div class="c_title">
                    <img src="img/icon/title-icon.png" alt="">
                    <h6>Discover the features</h6>
                    <h2>We are young but bold</h2>
                </div>
                <div class="row feature_inner">
                    <div class="col-lg-4 col-sm-6">
                        <div class="feature_item">
                            <div class="f_icon">
                                <img src="img/icon/f-icon-1.png" alt="">
                            </div>
                            <h4>Brand Identity</h4>
                            <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. </p>
                            <a class="more_btn" href="#">Read More</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="feature_item">
                            <div class="f_icon">
                                <img src="img/icon/f-icon-2.png" alt="">
                            </div>
                            <h4>Online Marketing</h4>
                            <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. </p>
                            <a class="more_btn" href="#">Read More</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="feature_item">
                            <div class="f_icon">
                                <img src="img/icon/f-icon-3.png" alt="">
                            </div>
                            <h4>Social Media</h4>
                            <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. </p>
                            <a class="more_btn" href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!--================End Feature Area =================-->
        
        <!--================The best slider Area =================-->
        
        <!--================End The best slider Area =================-->
        
       
        
      
        
          <!--================Footer Area =================-->
          <?php include 'footer.php';?>
        <!--================End Footer Area =================-->
        
        <div class="modal fade" id="modalInquiryForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Inquiry Form </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body mx-3">
                <!--<div class="md-form mb-5">-->
                <!--    <i class="fa fa-envelope prefix grey-text"></i>-->
                <!--    <input type="email" id="defaultForm-email" class="form-control validate">-->
                <!--    <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>-->
                <!--</div>-->

                <!--<div class="md-form mb-4">-->
                <!--    <i class="fa fa-lock prefix grey-text"></i>-->
                <!--    <input type="password" id="defaultForm-pass" class="form-control validate">-->
                <!--    <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>-->
                <!--</div>-->
                
                <form class="row" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="contactForm" >

                                    <div class="form-group col-sm-6">
                                        <input type="text" class="form-control" id="name" name="fname" placeholder="First Name" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <input type="text" class="form-control" id="name" name="lname" placeholder="Last Name" required>
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <input type="number" class="form-control" id="age" name="sage" placeholder="Student Age">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <input type="number" class="form-control" id="pcontact" name="pcontact" placeholder="Contact No" min-length=10
                                        max-length=10>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <input type="email" class="form-control" id="email" name="pemail" placeholder="Parent's E-mail" >
                                    </div>
                                      <div class="form-group col-sm-12">
                                    <label for="reference" class="text-info" style="font-size: 16px">संदर्भ </label><br></div>
                                    <div class="form-group col-sm-2">
                                
                                    <input type="radio"  class="form-control" name="reference" value="mata"> मटा 
                                    </div>
                                     <div class="form-group col-sm-2">
                                      <input type="radio"  class="form-control" name="reference" value="lokmat"> लोकमत  
                                      </div>
                                         
                                    <div class="form-group col-sm-2"><input type="radio"  class="form-control" name="reference"  value="facebook"> फेसबुक </div>
                                  <div class="form-group col-sm-2"><input type="radio"  class="form-control"  name="reference"  value="loksata"> लोकसत्ता   </div>
                                    <div class="form-group col-sm-2"> <input type="radio"  class="form-control"  name="reference"  value="sakal"> सकाळ  </div>                                      
                                     <div class="form-group col-sm-2"><input type="radio"  class="form-control" name="reference"   value="other" checked> इतर 
                                              </div>                
                                  
                              
                                    <div class="form-group col-sm-12">
                                        <!--<select class="form-control" id="city" name="city">-->
                                        
                                        <!--  <option value="mumbai">Mumbai</option>-->
                                        <!--  <option value="navimumbai">Navi Mumbai</option>-->
                                        <!--  <option value="thane">Thane</option>-->
                                        <!--  <option value="pune">Pune</option>-->
                                        <!--  <option value="nashik">Nashik</option>-->
                                        <!--  <option value="other">Other</option>-->
                                        <!--</select>-->
                                        
                                        <select class="form-control" id="city" name="city" required>
                                        <option value=" ">Select Branch </option>
                                        <?php 
                                        foreach ($bnamearray as $value) {
                                        echo"<option value='".$value."' >".$value."</option>";
                                        }
                                        ?>
                                        </select>

                                    </div>
                                    <div class="form-group col-sm-12">
                                        <textarea class="form-control" name="inquirymsg" id="inquirymsg" rows="4"
                                        placeholder="Write Your Inquiry"></textarea>
                                    </div>
                                    
                                    
                                   
            
            <!--<div class="modal-footer d-flex justify-content-center">-->
            <!--    <button class="more_btn">Login</button></div>-->
             <div class="form-group col-sm-12">
                <button type="submit" value="submit" class="btn more_btn form-control" id="sendButton" name="inquirySend">Submit Inquiry</button>
                <button  class="btn more_btn form-control text-center" id="olduser">Registered User ?</button>
            </div>
            

            </form>
            
           
            <!--<div class="form-group col-sm-12" id="updateDiv">-->
            <!--    <h5 style="margin-bottom:10px;">Already DONE With Inquiry and Want To UPDATE Profile? Click Here</h5>-->
            <!--    <button type="submit" value="submit" class="btn submit_btn form-control" id="show">Update</button>-->
            <!--</div>-->
            
            <form class="row" id="formExpand" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
           
            <!--<div class="modal-header text-center col-sm-12">-->
            <!--<h4 class="modal-title w-100 font-weight-bold">Update Your Information</h4>-->
            <!--</div>-->

            
            <div class="form-group col-sm-12">
            <input type="number" class="form-control" id="name" name="updateNum" placeholder="Enter Your Registerd Number To Update Info" style="width:100%;" required>
            </div>
           
            <div class="form-group col-sm-12">
           
            <button type="submit" name="submitUpd" value="submitUpd" class="btn more_btn form-control text-center">Proceed </button>
             <button  class="btn more_btn form-control text-center" id="newuser">New User ?</button>
            </div>

            </form>            
        </div>
    </div>
</div></div>
        <script>
             //   $("#demo01").animatedModal();
             
        </script>
     
        
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
        


        <script src="js/theme.js"></script>
        <script src="js/bootbox.min.js"></script>
    </body>
</html>
<?php
 if(isset($_POST['submitUpd'])){
                        $updateNum=mysqli_real_escape_string($conn,$_POST['updateNum']);
                         //fetching all batch record to fill the all dropdowns which are given in the form
                    	$studentReacord = array();
                    	$studentQuery = "SELECT * FROM student WHERE contact = '$updateNum'";
                    	$result = $conn->query($studentQuery);
                        while($row = $result->fetch_assoc()){
                            $studentReacord[] = $row;
                        }
                        
                        if(sizeof($studentReacord)==0){
                                echo '<script language="javascript">';
                                echo 'bootbox.alert("हा नंबर रजिस्टर्ड नाही कृपया  रेजिस्ट्रेशन साठी New User वर क्लिक करा  ");</script>';
                        // echo '<script language="javascript">window.history.back();</script>';
                        }
                        else{
                                echo '<script type="text/javascript">
                                window.location="/add_by_parent.php?contact='.$updateNum.'";
                                </script>';
                        }
                        
                        }
?>