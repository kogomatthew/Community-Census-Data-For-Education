<?php
require 'check_login.php';

require 'dbclass.php';

if (isset($_GET['get_children'])){
    $sql = "SELECT children.* ,households.house_name AS house_name FROM children INNER JOIN households ON households.id=house";
    echo json_encode(get_data($sql));
    exit(0);

}
if (isset($_POST['register'])){
     
    require 'conn.php';
    $house_name = $_POST['house_name'];
    $full_name = $_POST['full_name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $education = $_POST['education'];
    $sql = "INSERT INTO `children`(`house`, `full_name`, `gender`, `dob`, `education`) VALUES ('$house_name','$full_name','$gender','$dob','$education') ;";

    if ($conn->query($sql)===TRUE){

        echo  json_encode(['success' => true , 'message' => 'Registered Successfully']);       
    } else{

        echo  json_encode(['success' => false , 'message' => 'Not Successful']);
    }
    exit(0);
    
}
if(isset($_POST['update'])){
    require 'conn.php';
    $id = $_POST['id'];
    $house_name = $_POST['house'];
    $full_name = $_POST['full'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $education = $_POST['education'];
    $sql = "UPDATE `children` SET `house`='$house_name', `full_name`='$full_name', `gender`='$gender', `dob`='$dob',`education`='$education' WHERE id='$id;";
   echo $sql;
    if ($conn->query($sql)===TRUE){
 
        echo  json_encode(['success' => true , 'message' => 'Updated Successfully']);       
    } else{
        echo  json_encode(['success' => false , 'message' => 'Not Updated']);
    }
    exit(0);
}

?>


<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Children Records</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="./assets/css/dashlite.css?ver=2.2.0">
    <link id="skin-default" rel="stylesheet" href="./assets/css/theme.css?ver=2.2.0">
</head>

<body class="nk-body bg-lighter npc-default has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <?php require 'sidebar.php' ;?>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <?php require 'topbar.php' ;?>

                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Children</h3>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                                    data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>

                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">


                                    <div class="col-xxl-12">
                                        <div class="card card-full">
                                            <div class="card-inner">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title">Children</h6>
                                                    </div>
                                                    <a href="javascript:void(0)" onclick="register()"
                                                        class="btn btn-success   pull-right float-right"><em
                                                            class="icon ni ni-plus "></em> &nbsp; Register</a>
                                                </div>
                                            </div>

                                            <div class="card card-preview">

                                                <div class="card-inner">
                                                    <table class="datatable-init table ">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>House </th>
                                                                <th>Name</th>
                                                                <th>Gender</th>
                                                                <th>DoB</th>
                                                                <th>Education</th>

                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="children">


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div><!-- .card-preview -->

                                        </div><!-- .card -->
                                    </div>

                                </div><!-- .row -->
                            </div><!-- .nk-block -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- content @e -->
            <!-- footer @s -->
            <div class="nk-footer">
                <div class="container-fluid">
                    <div class="nk-footer-wrap">
                        <div class="nk-footer-copyright"> &copy; <?php echo date('Y') ?> Software By <a
                                href="tel:+254 797 635 841" target="_blank">PrimeTech</a>
                        </div>
                        <div class="nk-footer-links">
                            <ul class="nav nav-sm">
                                <li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Privacy</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer @e -->
        </div>
        <!-- wrap @e -->
    </div>
    <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->


    <!-- Modal Trigger Code -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDefault">Modal Default</button> -->

    <!-- Modal Content Code -->
    <div class="modal fade" tabindex="-1" id="edit_add_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title mdl_title">Register Children</h5>
                </div>
                <div class="modal-body">
                    <form method="post" id="children_form">
                        <div class="form-group">

                            <div class="form-group">
                                <label class="form-label" for="default-01">House </label>
                                <div class="form-control-wrap">

                                    <select class="form-control form-select" name="house_name" id="house_name"
                                        data-search="on" required>
                                        <option selected disabled>Select Household</option>
                                        <?php
                                    include "conn.php"; 

                                    $sql="SELECT id,house_name FROM households order by house_name "; 
                                    
                                    foreach ($conn->query($sql) as $row){
                                    echo "<option value=$row[id]>$row[house_name]</option>"; 


                                    }

                                    ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-01">Full Name</label>
                            <div class="form-control-wrap">
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="full_name" placeholder="Enter Full Name"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-01">Gender</label>

                            <div class="form-control-wrap">
                                <select class="form-control" name="gender" id="gender" required>
                                    <option selected disabled value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-01">Date of Birth</label>
                            <div class="form-control-wrap">
                                <div class="form-control-wrap">
                                    <input type="date" class="form-control" id="dob"
                                        value="max=<?php echo date('Y-m-d'); ?>" placeholder="Enter Date of Birth"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-01">Level of Education</label>
                            <div class="form-control-wrap">
                                <select class="form-control " name="education" id="education" required>
                                    <option selected disabled value="">Select Level of Education</option>
                                    <option value="Daycare">Daycare</option>
                                    <option value="Primary">Primary</option>
                                    <option value="Secondary">Secondary</option>
                                    <option value="College">College</option>
                                    <option value="University">University</option>

                                </select>
                            </div>
                        </div>
                        <button class="btn btn-outline-success float-right save_btn" id="submit_children"
                            type="submit">Register</button>
                    </form>

                </div>
                <div class="modal-footer bg-light">
                    <!-- <span class="sub-text">Modal Footer Text</span> -->
                </div>
            </div>
        </div>
    </div>

    <script src="./assets/js/bundle.js?ver=2.2.0"></script>
    <script src="./assets/js/scripts.js?ver=2.2.0"></script>
    <script src="./assets/js/charts/chart-ecommerce.js?ver=2.2.0"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"
        integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ=="
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
        integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
        crossorigin="anonymous"></script>

    <script>
    var children = []
    var selected = ''
    loadChildren = async function() {
        let resp = await axios.get('children.php?get_children');

        let rows = ''
        let i = 1
        resp.data.forEach(h => {
            rows +=
                `<tr>  
                            <td> ${i++}</td>
                            <td> ${h.house_name}</td>
                            <td> ${h.full_name}</td>
                            <td> ${h.gender}</td>
                            <td> ${h.dob}</td>
                            <td> ${h.education}</td>
                            <td class="text-center"> <em class="icon ni ni-pen edit" id="edit_btn" onclick="update(${h.id})" role="button"></em> 
                             <em class="p-3 icon ni ni-trash text-danger"  onclick="deletep(${h.id})" role="button"></em></td>`
        })

        document.getElementById('children').innerHTML = rows
        children = resp.data;

    }

    load = async function() {
        await loadChildren()
    }

    load()

    register = async () => {
        $('#children_form')[0].reset();
        $('#edit_add_modal').modal('show');
        $('.save_btn').html('Register')
        $('.mdl_title').html("New Child Registration")

        $('.save_btn').click(async function(e) {
            var house_name = document.getElementById("house_name").value;
            var full_name = document.getElementById("full_name").value;
            var gender = document.getElementById("gender").value;
            var dob = document.getElementById("dob").value;
            var education = document.getElementById("education").value;
            let fd = new FormData();
            fd.append("house_name", house_name)
            fd.append("full_name", full_name)
            fd.append("gender", gender)
            fd.append("dob", dob)
            fd.append("education", education)
            fd.append("register", 1)
            e.preventDefault();
            let resp = await axios.post('children.php', fd);

            NioApp.Toast(resp.data.message, resp.data.success ? 'success' : 'error', {
                position: 'top-right'
            });
            if (resp.data.success) {
                $('#children_form')[0].reset();
                load()
            }
        })




    }

    update = async (id) => {
        var child = children.find(r => r.id == id);
        selected = id
        
        $('.save_btn').html('Update');
        $('.mdl_title').html(child.full_name);
        $('#edit_add_modal').modal('show');
var house= child.house ;
        var full = child.full_name;
        var gender = child.gender;
        var education = child.education;
        var dob = child.dob;
        $("#house_name").val(house);
        $("#full_name").val(full);
        $("#gender").val(gender)
        $("#education").val(education);
        $("#dob").val(dob)
        $('.save_btn').click(async function(e) {
            e.preventDefault();
            var child = children.find(r => r.id == id);
            selected = id
            var fd = new FormData();
            fd.append("id", id)
            fd.append("update", 1)
            let resp = await axios.post('children.php', fd);
            console.log(resp.data);
            NioApp.Toast(resp.data.message, resp.data.success ? 'success' : 'error', {
                position: 'top-right'
            });
            if (resp.data.success) {
                load()
            }
        })

    }

    deletep = async (id) => {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(async (result) => {
            if (result.isConfirmed) {
                var fd = new FormData();
                fd.append("id", id)
                let resp = await axios.post('delete_child.php', fd);

                NioApp.Toast(resp.data.message, resp.data.success ? 'success' : 'error', {
                    position: 'top-right'
                });

                loadChildren()

            }
        })


    }
    </script>
</body>

</html>