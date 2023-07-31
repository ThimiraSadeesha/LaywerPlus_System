<div id="main-wrapper">
    <link href="../../vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">

<?php
    include "sidebar.php"
 ?>
    <!DOCTYPE html>
    <html lang="en">
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Client</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Submit New Case</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="smartwizard" class="form-wizard order-create">
                                <ul class="nav nav-wizard">
                                    <li><a class="nav-link" href="#wizard_Selection">
                                            <span>?</span>
                                        </a></li>
                                    <li><a class="nav-link" href="#wizard_Service">
                                            <span>1</span>
                                        </a></li>
                                    <li><a class="nav-link" href="#wizard_Time">
                                            <span>2</span>
                                        </a></li>
                                    <li><a class="nav-link" href="#wizard_Details">
                                            <span>3</span>
                                        </a></li>
                                </ul>
                                <div class="tab-content">
                                    
                                    <div id="wizard_Selection" class="tab-pane" role="tabpanel">
                                        <div class="row" align="center">
                                            <h3>Are you currently involved in a lawsuit? </h3>
                                        <form>
                                            <div class="mb-2 mb-0">
                                                <label class="radio-inline me-3"><input type="radio" name="optradio">  Yes, I have an ongoing lawsuit</label>
                                                <label class="radio-inline me-3"><input type="radio" name="optradio">  No, I'm looking for a lawyer</label>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                    <div id="wizard_Service" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-6 mb-2">
                                <div class="mb-3">
                                    <label class="text-label form-label">Case Category</label>
                                    <select name="Description" class="form-control" required="">
                                        <option value="" selected disabled>Select a case nature</option>
                                        <option value="nature1">Nature 1</option>
                                        <option value="nature2">Nature 2</option>
                                        <option value="nature3">Nature 3</option>
                                    </select>
                                </div> //ss
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="mb-3">
                                    <label class="text-label form-label">Description</label>
                                    <input type="text" name="lastName" class="form-control"
                                           placeholder="Briefly describe the case nature" required="">
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="mb-3">
                                    <label class="text-label form-label">Type of Court</label>
                                    <select name="Description" class="form-control" required="">
                                        <option value="" selected disabled>Select a District</option>
                                        <option value="nature1">Nature 1</option>
                                        <option value="nature2">Nature 2</option>
                                        <option value="nature3">Nature 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="mb-3">
                                    <label class="text-label form-label">District of Court</label>
                                    <select name="Description" class="form-control" required="">
                                        <option value="" selected disabled>Select a District</option>
                                        <option value="nature1">Nature 1</option>
                                        <option value="nature2">Nature 2</option>
                                        <option value="nature3">Nature 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="wizard_Time" class="tab-pane" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-6 mb-2">
                                <div class="mb-3">
                                    <label class="text-label form-label">Select Lawyer</label>
                                    <select name="Description" class="form-control" required="">
                                        <option value="" selected disabled>Select a lawyer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="mb-3">
                                    <label class="text-label form-label">Next Court date</label>
                                    <input type="date" class="form-control" id="date" required="">
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="mb-3">
                                    <label class="text-label form-label">Contact Number*</label>
                                    <input type="text" name="phoneNumber" class="form-control"
                                           placeholder="(+94)77 123 4567" required="">
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="mb-3">
                                    <label class="text-label form-label">Email*</label>
                                    <input type="text" name="place" class="form-control" required="">
                                </div>
                            </div>  </div>
                    </div>
                    <div id="wizard_Details" class="tab-pane" role="tabpanel">
                            <div class="row" align="center">
                            <h3>Are you sure all the detailed you submitted are correct? </h3>
                            <form>
                                <div class="mb-2 mb-0">
                                    <label class="checkbox-inline me-3"><input type="radio" name="optradio">  Yes, I am sure! </label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Include JS -->
<script src="../../vendor/global/global.min.js"></script>
<script src="../../vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="../../vendor/select2/js/select2.full.min.js"></script>
<script src="../../js/plugins-init/select2-init.js"></script>
<script src="../../js/custom.min.js"></script>
<script src="../../js/dlabnav-init.js"></script>
<script src="../../js/demo.js"></script>
<script src="../../js/styleSwitcher.js"></script>
<script src="../../vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js"></script>
<script src="../../vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="../../js/custom.min.js"></script>
<script src="../../js/dlabnav-init.js"></script>
<script src="../../js/styleSwitcher.js"></script>
                
  <script>
                    $(document).ready(function () {
                        $('#smartwizard').smartWizard();
                    });
                </script>
        