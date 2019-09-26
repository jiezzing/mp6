<!doctype html>
<html lang="en" class="fullscreen-bg">
<head>
	<title>MP6</title>
    <?php
        // All scripts for Front-End
        include 'header/header.php';
        // Calling the connection for database
        include 'connection.php';
        // Calling the model Query in object folder
        include 'model/queries.php';
        
        //Connecting project to database
        $con = new connection();
        $db = $con->connect();

        // Query Class
        $query = new Queries($db);
    ?>
</head>
<body>
<div class="container col-md-12">
    <div class="col-md-2">    
        <br>
        <button type="button" class="btn btn-success form-control" data-toggle="modal" data-target="#add-new-data"><i class="fa fa-plus"></i> Add New Data</button>
    </div>
    <div class="col-md-12">    
        <br>
        <table id="table" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Apartment</th>
                    <th>Landlord</th>
                    <th>Address</th>
                    <th>Talents</th>
                </tr>
            </thead>
            <tbody>
                <!-- Fetching all profile from database -->
                <?php
                    $talents = $query->getProfiles();
                    while ($row = $talents->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);
                        echo '
                            <tr>
                                <td>'.$row['prof_name'].'</td>
                                <td>'.$row['prof_apartment'].'</td>
                                <td>'.$row['prof_landlord'].'</td>
                                <td>'.$row['prof_address'].'</td>
                                <td>'.$row['prof_talents'].'</td>
                            </tr>
                        ';
                    }
                ?>
                <!-- End of fetching -->
            </tbody>
        </table>
    </div>
  </div>


  <div class="modal fade" id="add-new-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Add New Data</h4>
      </div>
      <div class="modal-body">
        <form id="form"> 
          <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <label for="company" class=" form-control-label">Name</label>
                    <input type="text" class="form-control" placeholder="Name" id="name" maxlength="30">
                </div>
                <div class="col-md-6">
                    <label for="company" class=" form-control-label">Apartment</label>
                    <input type="text" class="form-control" placeholder="Apartment" id="apartment" maxlength="30">
                </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <label for="company" class=" form-control-label">Landlord</label>
                    <input type="text" class="form-control" placeholder="Landlord" id="landlord" maxlength="30">
                </div>
                <div class="col-md-6">
                    <label for="company" class=" form-control-label">Address</label>
                    <input type="text" class="form-control" placeholder="Address" id="address" maxlength="30">
                </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <label for="company" class=" form-control-label">Talents:</label>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <select class="selectpicker form-control" multiple="multiple" data-live-search="true" id="talents">
                        <option>Dancing</option>
                        <option>Reading</option>
                        <option>Singing</option>
                        <option>Coding</option>
                        <option>Acting</option>
                        <option>Praying</option>
                    </select>
                </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="add-new-data-btn">Add New Data</button>
      </div>
    </div>
  </div>
</div>
<?php include 'scripts/js.php';?>
<script>
    // Initialize bootstrap data-tables or TABLE
    $(document).ready(function() {
        $('#table').DataTable();
    });

    // Add new data
    $('#add-new-data-btn').click(function(){
        let name = $('#name').val();
        let apartment = $('#apartment').val();
        let landlord = $('#landlord').val();
        let address = $('#address').val();
        let talents = $('#talents').val();

        if(name != "" && apartment != "" && landlord != "" && address != "" && talents != null){ // Validation
            // Sending data to the controller->insert_profile.php throught ajax request
            $.ajax({ 
                type: "POST",
                url: "controller/insert_profile.php",
                data: {
                    name: name, 
                    apartment: apartment, 
                    landlord: landlord,
                    address: address,
                    talents: talents
                },
                success: function(response){
                    alert("Successfully added");
                    location.reload();
                },
                error: function(xhr, ajaxOptions, thrownError){
                    alert(thrownError);
                }
            }); 
        }
        else{
            alert("Some fields are missing");
        }
    })
</script>
</body>
</html>