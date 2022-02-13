                    <?php
                    
                    	require('admin/config/config.php');
                    	require('admin/config/db.php');
                    	
                    
                    ?>

                    <!DOCTYPE html>
                    <html lang="en">
                    
                    <head>

                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                    
                    <meta name="description" content="">
                    <meta name="author" content="">
                    
                    <title>Mata Anusaya Production</title>
                    
                    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                    
                    <link href="admin/assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                    <link href="admin/assets/css/admission.css" rel="stylesheet" id="bootstrap-css">
                    <script src="adminassets/js/bootstrap.min.js"></script>
                    <script src="admin/assets/jquery/jquery.min.js"></script>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
                    
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
                    <script src="js/bootbox.min.js"></script>
                    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>-->
                    
                    <style>
                    .form{
                    min-height:100% !important;
                    }
                    </style>
                    
                    <script type="text/javascript">
                     $(document).ready(function (){
                    $('form').each(function(){
                    $(this).data('serialized', $(this).serialize())
                    })
                    .on('change input', function(){
                    $(this)             
                    .find('input:submit, button:submit')
                    .prop('disabled', $(this).serialize() == $(this).data('serialized'))
                    ;
                    })
                    .find('input:submit, button:submit')
                    .prop('disabled', true);
                    });
                    
                    </script>

                    
                    <script>
                    $(function () {
                    
                    //-----------------------------
                    $('form').on('submit', function (e) {
                    
                    e.preventDefault();
                    
                    $.ajax({
                    type: 'post',
                    url: 'add_by_parentDB.php',
                    data: $('form').serialize(),
                    success: function (data) {
                    //   alert(data);
                    $("#formsuccessmsg").html(data);
                    
                    }
                    });
                    setTimeout(function(){
                    $('#formsuccessmsg').hide();
                    var searchedno=<?php echo $contact; ?>;
                    window.location = 'add_by_parent.php?contact='+searchedno;
                    }, 10000);
                    
                    });
                    
                    });
                    </script>

                    </head>
                   
                    <body>
                    
                    <?php
                    $contact = $_GET['contact'];
                    	
                        //fetching all batch record to fill the all dropdowns which are given in the form
                    	$studentReacord = array();
                    	$studentQuery = "SELECT * FROM student WHERE contact = '$contact'";
                    	$result = $conn->query($studentQuery);
                        while($row = $result->fetch_assoc()){
                            $studentReacord[] = $row;
                        }
                        
                        if(sizeof($studentReacord)==0){
                        echo '<script language="javascript">';
                        echo 'bootbox.alert("SORRY! Data For This Number Is Not Available You Need To Be Registered First, CONTACT US For More Details.");</script>';
                        echo '<script>window.history.back();</script>';
                        }
                        
                    require('nav.php');
                    
                    ?>
                    
                    <br>
                    
                    <div id="login" style="margin-top : 40px;">
                    
                    <div class="container">
                    <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                    <div id="login-form" class="form">
                    <form >
                    
                    <h3 class="text-center text-info">   माहिती अपडेट करा      </h3>
                    <hr>
                    <!--<h6><?php //echo $errormsg; ?></h6>-->
                    <div class="form-group">
                    <label for="student name" class="text-info" style="font-size: 20px">विद्यार्थी चे नाव</label><br>
                    <input type="text" name="sname" id="student_name" class="form-control" placeholder="<?php echo $studentReacord[0]['fname']; ?>" >
                    
                    <label for="student name" class="text-info" style="font-size: 20px">आडनाव</label><br>
                    <input type="text" name="slname" id="lstudent_name" class="form-control" placeholder="<?php echo $studentReacord[0]['lname']; ?>">

                    
                    <label for="student name" class="text-info" style="font-size: 20px">पालकांचे नाव</label><br>
                    <input type="text" name="pname" id="parent_name" class="form-control" placeholder="<?php echo $studentReacord[0]['parent_name']; ?>">
                    </div>
                    
                    <div class="form-group">
                    <label for="snumber" class="text-info" style="font-size: 20px">* नंबर</label><br>
                    <input type="hidden" name="searcheddata" value="<?php echo $contact; ?>" >
                    <input type="number" name="snumber" id="snumber" class="form-control" placeholder="<?php echo $studentReacord[0]['contact']; ?>" min="1000000000" max="9999999999" oninvalid="this.setCustomValidity('Invalid Mobile Number - Exact 10 digits number allowed  ')" oninput="setCustomValidity('')" disabled>
                    </div>
                    <div class="form-group">
                    <label for="student age" class="text-info" style="font-size: 20px">वय</label><br>
                    <input type="number" name="sage" id="age" class="form-control" placeholder="<?php echo $studentReacord[0]['age']; ?>" min="02" max="90"  oninvalid="this.setCustomValidity('Invalid Year - must be between 2-90 ')" oninput="setCustomValidity('')" >
                    </div>

                    <div class="form-group">
                    <label for="phone number" class="text-info" style="font-size: 20px"> पालकांचे नंबर </label><br>
                    <input type="number" name="pnumber" id="ph_number" class="form-control" placeholder="<?php echo $studentReacord[0]['parent_contact']; ?>" min="1000000000" max="9999999999" oninvalid="this.setCustomValidity('Invalid Mobile Number - Exact 10 digits number allowed  ')" oninput="setCustomValidity('')" >
                    </div>
                    <div class="form-group">
                    <label for="parent email" class="text-info" style="font-size: 20px">ईमेल पत्ता</label><br>
                    <input type="email" name="pemail" id="e_id"  placeholder="<?php echo $studentReacord[0]['parent_email']; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="address" class="text-info" style="font-size: 20px">पत्ता</label><br>
                    <textarea name="address" rows="3" cols="40"  placeholder="<?php echo $studentReacord[0]['adress']; ?>" name="address"></textarea>
                    </div>

                    
                    <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                    </div>
                    
                    <div id="formsuccessmsg" style="font-size: 15px;color: red;font-weight: bold;">
                    </div>
                    
                    <div>
                    <h6>@Quinteck Solutions</h6>
                    </div>
                    
                    </form>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </body>
                    </html>