            <?php

            require('admin/config/config.php');
            require('admin/config/db.php');
            
            $errormsg =" ";
            
            $numbertosearch=mysqli_real_escape_string($conn,$_POST['searcheddata']);
            
            $nochangeflag=1;
            
            $sname=mysqli_real_escape_string($conn,$_POST['sname']);
            $pname=mysqli_real_escape_string($conn,$_POST['pname']);
            $slname=mysqli_real_escape_string($conn,$_POST['slname']);
            $snumber=mysqli_real_escape_string($conn,$_POST['snumber']);
            $sage=mysqli_real_escape_string($conn,$_POST['sage']);
            $pnumber=mysqli_real_escape_string($conn,$_POST['pnumber']);
            $pemail=mysqli_real_escape_string($conn,$_POST['pemail']);
            $address=mysqli_real_escape_string($conn,$_POST['address']);

            if($numbertosearch=="" || $numbertosearch==" " ){
            //$error= "Not a Valid Number !!";
            echo "ERROR ".$numbertosearch;
            //echo'<script> var url= "'.ROOT_URL.'/main.php"; window.location = url; </script>';
            }
            else{
            
            
            
            
            // fetching all info from student
            
            $studentFetchQuery="SELECT * FROM student WHERE contact='".$numbertosearch."'";
            $studentFetchArray=array();
            $result = $conn->query($studentFetchQuery);
            while ($row = $result->fetch_assoc()) {
            $studentFetchArray[] = $row;
            }
            
            // echo $numbertosearch;
            // print_r($staffFetchArray);
            //------------------------------------------------------------------
            
            
            if($sname!="" && $sname!==" " && substr($sname, 0, 1)!=' ' && $sname!=$studentFetchArray[0]['fname']){
            $nochangeflag=0;
            $usql="UPDATE student SET fname = '".$sname."' WHERE contact='".$numbertosearch."'";     
            $uresult =$conn->query($usql);
            if($uresult==TRUE)
            echo " ".$studentFetchArray[0]['fname']." First Name Successfully Changed To ".$sname." <br>";   
            }
            
            if($pname!="" && $pname!==" " && substr($pname, 0, 1)!=' ' && $pname!=$studentFetchArray[0]['parent_name']){
            $nochangeflag=0;
            $usql="UPDATE student SET parent_name = '".$pname."' WHERE contact='".$numbertosearch."'";     
            $uresult =$conn->query($usql);
            if($uresult==TRUE)
            echo " ".$studentFetchArray[0]['parent_name']." Parent Name Successfully Changed To ".$pname." <br>";   
            }
            
            if($slname!="" && $slname!==" " && substr($slname, 0, 1)!=' ' && $slname!=$studentFetchArray[0]['lname']){
            $nochangeflag=0;
            $usql="UPDATE student SET lname = '".$slname."' WHERE contact='".$numbertosearch."'";     
            $uresult =$conn->query($usql);
            if($uresult==TRUE)
            echo " ".$studentFetchArray[0]['lname']." Last Name Successfully Changed To ".$slname." <br>";   
            }

            if($snumber!="" && $snumber!==" " && substr($snumber, 0, 1)!=' ' && $snumber!=$studentFetchArray[0]['contact']){
            $nochangeflag=0;
            $usql="UPDATE student SET contact = '".$snumber."' WHERE contact='$numbertosearch'";     
            $uresult =$conn->query($usql);
            if($uresult==TRUE)
            echo " ".$studentFetchArray[0]['contact']." Contact Successfully Changed To ".$$studentFetchArray." <br>";   
            }
            
            if($sage!="" && $sage!==" " && substr($sage, 0, 1)!=' ' && $sage!=$studentFetchArray[0]['age']){
            $nochangeflag=0;
            $usql="UPDATE student SET age = '".$sage."' WHERE contact='$numbertosearch'";     
            $uresult =$conn->query($usql);
            if($uresult==TRUE)
            echo " ".$studentFetchArray[0]['age']." Age Successfully Changed To ".$sage." <br>";   
            }

            if($pnumber!="" && $pnumber!==" " && substr($pnumber, 0, 1)!=' ' && $pnumber!=$studentFetchArray[0]['parent_contact']){
            $nochangeflag=0;
            $usql="UPDATE student SET parent_contact = '".$pnumber."' WHERE contact='$numbertosearch'";     
            $uresult =$conn->query($usql);
            if($uresult==TRUE)
            echo " ".$studentFetchArray[0]['parent_contact']." Parent's Contact Successfully Changed To ".$pnumber." <br>";   
            }

            if($pemail!="" && $pemail!==" " && substr($pemail, 0, 1)!=' ' && $pemail!=$studentFetchArray[0]['parent_email']){
            $nochangeflag=0;
            $usql="UPDATE student SET parent_email = '".$pemail."' WHERE contact='".$numbertosearch."'";     
            $uresult =$conn->query($usql);
            if($uresult==TRUE)
            echo " ".$studentFetchArray[0]['parent_email']." Parent's Email Successfully Changed To ".$pemail." <br>";   
            }

            if($address!="" && $address!==" " && substr($address, 0, 1)!=' ' && $address!=$studentFetchArray[0]['adress']){
            $nochangeflag=0;
            $usql="UPDATE student SET adress = '".$address."' WHERE contact='".$numbertosearch."'";     
            $uresult =$conn->query($usql);
            if($uresult==TRUE)
            echo " ".$studentFetchArray[0]['adress']." Address Successfully Changed To ".$address." <br>";   
            }

            //------
            
            if($nochangeflag==1)
            echo "No Update For ".$studentFetchArray[0]['contact'];  
            
            }       
            
            ?>