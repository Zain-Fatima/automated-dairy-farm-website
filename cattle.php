<?php
// Array to store cow data (for testing purposes)
$cows = [];

// Add Cow
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add') {
    // Retrieve cow data from the form
    $controlNumber = $_POST['controlNumber'];
    $gender = $_POST['gender'];
    $cowType = $_POST['cowType'];
    $dateOfBirth = $_POST['dateOfBirth'];

    // Process the uploaded cow image and store it in a desired location
    $cowImage = $_FILES['cowImage']['name'];
    $cowImageTemp = $_FILES['cowImage']['tmp_name'];
    move_uploaded_file($cowImageTemp, "path/to/your/image/folder/" . $cowImage);
    
    // Add the cow data to the database or your preferred storage system
    // For simplicity, we will store the cow data in an array
    $cow = [
        'controlNumber' => $controlNumber,
        'gender' => $gender,
        'cowType' => $cowType,
        'dateOfBirth' => $dateOfBirth,
        'cowImage' => $cowImage
    ];
    // Add the cow to the cows array
    $cows[] = $cow;
    
    // Redirect back to the cow information page or display a success message
    header('Location: cow_information.php');
    exit();
}
// Update Cow
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update') {
    // Retrieve cow data from the form
    $controlNumber = $_POST['controlNumber'];
    $gender = $_POST['gender'];
    $cowType = $_POST['cowType'];
    $dateOfBirth = $_POST['dateOfBirth'];

    // Process the uploaded cow image and store it in a desired location
    $cowImage = $_FILES['cowImage']['name'];
    $cowImageTemp = $_FILES['cowImage']['tmp_name'];
    move_uploaded_file($cowImageTemp, "path/to/your/image/folder/" . $cowImage);
    
    // Update the cow data in the database or your preferred storage system
    // For simplicity, we will update the cow data in the cows array
    $cowIndex = $_POST['cowIndex']; // Index of the cow in the array
    $cows[$cowIndex]['controlNumber'] = $controlNumber;
    $cows[$cowIndex]['gender'] = $gender;
    $cows[$cowIndex]['cowType'] = $cowType;
    $cows[$cowIndex]['dateOfBirth'] = $dateOfBirth;
    $cows[$cowIndex]['cowImage'] = $cowImage;
    
    // Redirect back to the cow information page or display a success message
    header('Location: cow_information.php');
    exit();
}
// Delete Cow
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete') {
    $cowIndex = $_POST['cowIndex']; // Index of the cow in the array
    
    // Delete the cow from the database or your preferred storage system
    // For simplicity, we will remove the cow data from the cows array
    if (isset($cows[$cowIndex])) {
        unset($cows[$cowIndex]);
    }
    
    // Re-index the array to maintain continuity
    $cows = array_values($cows);
    
    // Redirect back to the cow information page or display a success message
    header('Location: cattle.php');
    exit();
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile OF Cattle</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
    <style>
        .custom-file-input::-webkit-file-upload-button {
            visibility: hidden;
        }
        .custom-file-input::before {
            content: 'Choose Cow Image';
            display: inline-block;
            background: linear-gradient(top, #f9f9f9, #e3e3e3);
            border: 1px solid #999;
            border-radius: 3px;
            padding: 5px 8px;
            outline: none;
            white-space: nowrap;
            -webkit-user-select: none;
            cursor: pointer;
            text-shadow: 1px 1px #fff;
            font-weight: 700;
            font-size: 10pt;
        }
        .custom-file-input:hover::before {
            border-color: black;
        }
        .custom-file-input:active::before {
            background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
        }
        .custom-file-input:after {
            content: 'No file chosen';
        }
        .custom-file-input[aria-describedby].valid + label::after {
            content: 'File selected';
        }
    </style>
</head>
<body>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Cow Information <small>Table</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target=".add"> Add </button>
                            <div class="modal fade add" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-md">
                                    <form class="form-label-left input_mask" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                        <input type="hidden" name="action" value="add">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Add Cow</h4>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="x_content">
                                                    <br/>
                                                    <div class="form-group">
                                                        <label for="controlNumber">Control Number</label>
                                                        <input type="text" class="form-control" id="controlNumber" name="controlNumber" placeholder="Control Number">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="gender">Gender</label>
                                                        <select class="form-control" id="gender" name="gender">
                                                            <option>Select Gender</option>
                                                            <option>Option one</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cowType">Cow Type</label>
                                                        <input type="text" class="form-control" id="cowType" name="cowType" placeholder="Cow Type">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="status">Status</label>
                                                        <select class="form-control" id="status" name="status">
                                                            <option>Select Status</option>
                                                            <option>Option one</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="dateOfBirth">Date of Birth</label>
                                                        <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" placeholder="Date of Birth">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cowImage">Choose Cow Image</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="cowImage" name="cowImage">
                                                            <label class="custom-file-label" for="cowImage">Choose Cow Image</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" style="margin-right: 69%">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="cardbox table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="width: 10%">Image</th>
                                                <th>Control Number</th>
                                                <th>Gender</th>
                                                <th>Cow Type</th>
                                                <th>Date of Birth</th>
                                                <th>Status</th>
                                                <th style="width: 10%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><center><img src="images/2.jpg" width="40" alt="Avatar" align="center"></center></td>
                                                <td><b style="color: brown">11234-1111</b></td>
                                                <td>Female</td>
                                                <td>American Cow</td>
                                                <td>10/10/20</td>
                                                <td><span class="btn btn-warning btn-sm">Sold!</span></td>
                                                <td><button class="btn btn-info btn-sm" data-toggle="modal" data-target=".edit"><i class="fa fa-pencil"></i></button> <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td><center><img src="images/1.jpg" width="40" alt="Avatar" align="center"></center></td>
                                                <td><b style="color: brown">11234-1111</b></td>
                                                <td>Female</td>
                                                <td>American Cow</td>
                                                <td>10/10/20</td>
                                                <td><span class="btn btn-success btn-sm">Available!</span></td>
                                                <td><button class="btn btn-info btn-sm" data-toggle="modal" data-target=".edit"><i class="fa fa-pencil"></i></button> <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="modal fade edit" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <form class="form-label-left input_mask" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                                <input type="hidden" name="action" value="update">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Edit Cow</h4>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="x_content">
                                                            <br/>
                                                            <div class="form-group">
                                                                <label for="editControlNumber">Control Number</label>
                                                                <input type="text" class="form-control" id="editControlNumber" name="controlNumber" placeholder="Control Number">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="editGender">Gender</label>
                                                                <select class="form-control" id="editGender" name="gender">
                                                                    <option>Select Gender</option>
                                                                    <option>Option one</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="editCowType">Cow Type</label>
                                                                <input type="text" class="form-control" id="editCowType" name="cowType" placeholder="Cow Type">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="editStatus">Status</label>
                                                                <select class="form-control" id="editStatus" name="status">
                                                                    <option>Select Status</option>
                                                                    <option>Option one</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="editDateOfBirth">Date of Birth</label>
                                                                <input type="date" class="form-control" id="editDateOfBirth" name="dateOfBirth" placeholder="Date of Birth">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="editCowImage">Choose Cow Image</label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" id="editCowImage" name="cowImage">
                                                                    <label class="custom-file-label" for="editCowImage">Choose Cow Image</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- Datatables -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    // Add the following code if you want the name of the file to appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    // Initialize the datatable
    $('#datatable').DataTable();
});
</script>
</body>
</html>


