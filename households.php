<?php
require 'check_login.php';

require 'dbclass.php';

if (isset($_GET['get_houses'])){
    $sql = "SELECT * FROM households ;";
    echo json_encode(get_data($sql));
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
    <title>Default Dashboard | DashLite Admin Template</title>
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


        <!-- Modal Trigger Code -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDefault">Modal Default</button> -->

    <!-- Modal Content Code -->
    <div class="modal fade" tabindex="-1" id="modalDefault">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Register House</h5>
                </div>
                <div class="modal-body">
                <div class="form-group">
                    <label class="form-label" for="default-01">Input text label</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="default-01" placeholder="Input placeholder">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="default-02">Textarea label</label>
                    <div class="form-control-wrap">
                        <textarea class="form-control" id="default-textarea">Large text area content</textarea>
                    </div>
                </div>
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

    <script>

        loadHouses = async function() {
            let resp = await axios.get('households.php?get_houses');

            let rows = ''
            let i = 1
            resp.data.forEach(h => {
                rows +=`<tr>  
                            <td> ${i++}</td>
                            <td> ${h.house_name}</td>
                            <td> ${h.father}</td>
                            <td> ${h.mother}</td>
                            <td> ${h.phone_no}</td>
                            <td> ${h.alt_phone_no}</td>
                            <td> ${h.date_created}</td>
                            <td class="text-center"><em class="btn icon ni ni-eye-fill show_children" id="${h.id}"></em></td>
                            <td class="text-center"> <em class="icon ni ni-pen" role="button"></em>  <em class="p-3 icon ni ni-trash text-danger"></em></td>`
            })

            document.getElementById('households').innerHTML = rows

        }

        load = async function() {
            await loadHouses()

        }

        load()


    </script>
</body>

</html>