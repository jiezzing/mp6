<?php
    include '../connection.php';
    include '../model/queries.php';

    $con = new connection();
    $db = $con->connect();

    $query = new Queries($db);
    $id = $_POST['id'];
    $talents = ["Dancing", "Reading", "Singing", "Coding", "Acting", "Praying"];

    $query->prof_id = $id;
    $data = $query->getSpecificProfile();
    while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $name = $row['prof_name'];
        $apartment = $row['prof_apartment'];
        $landlord = $row['prof_landlord'];
        $address = $row['prof_address'];
        $my_talents = $row['prof_talents'];
        $user_talents = explode(', ', $my_talents);
    }
?>

<?php
    echo'
        <form id="form"> 
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <label for="company" class=" form-control-label">Name</label>
                        <input type="text" class="form-control" placeholder="Name" id="upd-name" maxlength="30" value="'.$name.'">
                    </div>
                    <div class="col-md-6">
                        <label for="company" class=" form-control-label">Apartment</label>
                        <input type="text" class="form-control" placeholder="Apartment" id="upd-apartment" maxlength="30" value="'.$apartment.'">
                    </div>
                </div>
                </div>
                <br>
                <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <label for="company" class=" form-control-label">Landlord</label>
                        <input type="text" class="form-control" placeholder="Landlord" id="upd-landlord" maxlength="30" value="'.$landlord.'">
                    </div>
                    <div class="col-md-6">
                        <label for="company" class=" form-control-label">Address</label>
                        <input type="text" class="form-control" placeholder="Address" id="upd-address" maxlength="30" value="'.$address.'">
                    </div>
                </div>
                </div>
                <br>
                <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <label for="company" class=" form-control-label">Talents:  '.$my_talents.'</label>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <select class="selectpicker form-control" multiple="multiple" data-live-search="true" id="upd-talents">
        ';
    ?>

    <?php
        foreach ($talents as $key => $value) {
            if(in_array($value, $user_talents)){
                echo '<option selected>'.$value.'</option>';
            }else{
                echo '<option>'.$value.'</option>';
            }
        }
    ?>
    
    <?php
        echo '
                        </select>
                    </div>
                </div>
            </div>
        </form>
    ';
?>
<script>$('select').selectpicker()</script>
