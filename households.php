<?php
require 'check_login.php';

require 'dbclass.php';

if (isset($_GET['get_houses'])){
    $sql = "SELECT * FROM households ;";
    echo json_encode(get_data($sql));
    exit(0);

}

 
if(isset($_GET['show_children'])){
    $house = $_GET['id'];
    $sql = "SELECT * FROM children WHERE house = '$house';";
    $rows = get_data($sql);
    echo json_encode($rows);
    exit(0); 
}

if (isset($_POST['add_edit'])) {
    $house_name = $_POST['house_name'];
    $father = $_POST['father'];
    $mother = $_POST['mother'];
    $is_new = $_POST['is_new'];
    $alt_phone_no = $_POST['alt_phone_no'];
    $phone_no = $_POST['phone_no'];
    $date_time = date('Y-m-d H:i:s');
   
    if($is_new == 1){
        $sql = "INSERT INTO `households` (`house_name`, `mother`, `father`, `phone_no`, `alt_phone_no`, `date_created`) 
        VALUES ('$house_name', '$mother', '$father', '$phone_no', '$alt_phone_no', '$date_time');";        
        
    }else { 
        $id = $_POST["id"];
        $sql = "UPDATE households SET house_name = '$house_name', mother = '$mother', father = '$father',alt_phone_no = '$alt_phone_no', phone_no = '$phone_no' WHERE id = '$id';";
      
        
    }
 

    $res= execute($sql);
    if($res){
        echo json_encode(['success' => true , 'message' => $is_new  == 1? 'Household Succesfully Registered' : 'Household Updated Succesfully' ,'id' =>  $GLOBALS['last_id']]);
    }else{
        echo json_encode(['success' => false , 'message' => 'Error ! '.$res]);
    }
    
    exit(0);
}


if(isset($_POST['del_h'])){

    $id = $_POST['id'];
    $sql = "DELETE FROM `households` WHERE `id` = $id ;";
    $res= execute($sql);
    echo  json_encode(['success' => true, 'message' => 'Deleted Successfully']);
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
    <title>Community | Households</title>
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
                                            <h3 class="nk-block-title page-title">Households</h3>
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
                                                        <h6 class="title">Households</h6>
                                                    </div>

                                                    <button href="javascript:void(0)" onclick="load_house_modal(false)"
                                                        class="btn btn-success pull-right float-right"><em
                                                            class="icon ni ni-plus "></em> &nbsp; Register</button>
                                                </div>
                                            </div>

                                            <div class="card card-preview">

                                                <div class="card-inner">
                                                    <table class="datatable-init table ">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>House Name</th>
                                                                <th>Mother</th>
                                                                <th>Father</th>
                                                                <th>Primary Phone No.</th>
                                                                <th>Alternate Phone No.</th>
                                                                <th>Date Registered</th>
                                                                <th>Children</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="households">
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

    <div class="modal fade" tabindex="-1" id="edit_add_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title mdl_title">Register House</h5>
                </div>
                <div class="modal-body">
                    <form method="post" id="aeh">
                        <div class="form-group">
                            <label class="form-label" for="default-01">House Name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="house_name" placeholder="Enter House Name"
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-01">Father</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="father" placeholder="Enter Father's Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-01">Mother</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="mother" placeholder="Enter Mother's Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-01">Primary Phone No.</label>
                            <div class="form-control-wrap">
                                <input type="number" class="form-control" id="primary_phone" placeholder="Enter primary phone number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-01">Alternative Phone No.</label>
                            <div class="form-control-wrap">
                                <input type="number" class="form-control" id="alt_phone_no" placeholder="Enter Alternative Phone No">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-01">Date Registered</label>
                            <div class="form-control-wrap">

                                <input type="text" class="form-control" id="mother" placeholder="Enter Mother's Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-01">Primary Phone No.</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="phone_no" max="10" min="10"
                                    placeholder="Enter Mother's Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="default-01">Secondary Phone No.</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="alt_phone_no" min="10" max="10"
                                    placeholder="Enter Mother's Name">
 
                            </div>
                        </div>

                        <button class="btn btn-outline-success float-right save_btn" type="submit">Register</button>
                    </form>

                </div>
                <div class="modal-footer bg-light">
                    <!-- <span class="sub-text">Modal Footer Text</span> -->
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" tabindex="-1" id="children_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Children</h5>
                </div>
                <div class="modal-body">
                    <table class="datatable-init2 table  ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Ed. Level</th>

                            </tr>
                        </thead>
                        <tbody id="children">
                        </tbody>
                    </table>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"
        integrity="sha512-WFN04846sdKMIP5LKNphMaWzU7YpMyCU245etK3g/2ARYbPK9Ub18eG+ljU96qKRCWh+quCY7yefSmlkQw1ANQ=="
        crossorigin="anonymous"></script>


    <script>
    var households = []
    var selected = ''

    var Obj = {
        "house_name": $('#house_name'),
        "father": $('#father'),
        "mother": $('#mother'),
        "alt_phone_no": $('#alt_phone_no'),
        "phone_no": $('#phone_no')

    }
    var is_new = 0
    loadHouses = async function(fetch = true) {
        if (fetch) {
            let resp = await axios.get('households.php?get_houses');
            households = resp.data;
        }


        let rows = ''
        let i = 1


        households.forEach(h => {
            rows +=
                `<tr>  
                            <td> ${i++}</td>
                            <td> ${h.house_name}</td>
                            <td> ${h.father}</td>
                            <td> ${h.mother}</td>
                            <td> ${h.phone_no}</td>
                            <td> ${h.alt_phone_no}</td>
                            <td> ${moment(h.date_created).format('MMMM Do YYYY, h:mm:ss') }</td>
                            <td class="text-center"><em class="btn icon ni ni-eye-fill " onclick="show_children(${h.id})"></em></td>
                            <td class="text-center"> <em class="icon ni ni-pen " onclick="load_house_modal(true, ${h.id})" role="button"></em>  <em class="p-3 icon ni ni-trash text-danger " onclick="deleteh(${h.id})" role="button"></em></td>`
        })
      
        document.getElementById('households').innerHTML = rows      


    }

    load = async function() {
        await loadHouses()
    }

    load()

    load_house_modal = (edit = false, id = 0) => {
        if (edit) {
            is_new = 0
            selected = households.find(r => r.id == id);

            $('.save_btn').html('Update')
            $('.mdl_title').html(selected.house_name)

            //
            Object.keys(selected).forEach(key => {
                $('#' + key).val(selected[key])

            })

            $('#edit_add_modal').modal('show');


        } else {
            $('.save_btn').html('Register')
            $('.mdl_title').html('New House Registration')
            is_new = 1
            $('#aeh')[0].reset();
            $('#edit_add_modal').modal('show');

        }
    }



    $("#aeh").on('submit', async function(e) {
        e.preventDefault();
        let fd = new FormData();
        let new_val = {}
        Object.keys(Obj).forEach(el => {
            fd.append(el, Obj[el].val());
            new_val[el] = Obj[el].val();

        })

        fd.append("is_new", is_new)
        fd.append("id", selected.id)
        fd.append("add_edit", 1)

        let resp = await axios.post('households.php', fd);


        NioApp.Toast(resp.data.message, resp.data.success ? 'success' : 'error', {
            position: 'top-right'
        });

        if (resp.data.success) {

            if (is_new == 0) {

                households = households.filter(h => h.id != selected.id);
                new_val.id = selected.id
                new_val.date_created = selected.date_created


            } else {
                new_val.date_created = new Date()
                new_val.id = resp.data.id;

            }

            households.push(new_val)
            households = _.sortBy(households, ['id']);
            loadHouses(false)

            $('#edit_add_modal').modal('hide');

        }


    });

    deleteh = async (id) => {

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
                let fd = new FormData();
                fd.append('del_h', 1);
                fd.append('id', id);
                let resp = await axios.post('households.php', fd)
                $('#edit_add_modal').modal('hide');
                households = households.filter(h => h.id != id);
                loadHouses(false)
            } 
        })

     

    }

    show_children = async (house_id) => {

        let resp = await axios.get('households.php?show_children&id=' + house_id)
        if (resp.data.length < 1) {
            NioApp.Toast('Selected Home has no Children', 'error', {
                position: 'top-right'
            });

        } else {

            let rows = ''
            let i = 1
            resp.data.forEach(c => {
                rows += `<tr>
                            <td> ${i++}</td>
                            <td>${c.full_name} </td>
                            <td>${c.gender} </td>
                            <td>${moment().diff(moment(c.dob, "DD-MM-YYYY"), 'years')} </td>
                            <td> ${c.education}</td>
                        </tr>`
            })

             
            $('#children').html(rows)          
            $('#children_modal').modal('show');
        }
    }
    </script>
</body>

</html>