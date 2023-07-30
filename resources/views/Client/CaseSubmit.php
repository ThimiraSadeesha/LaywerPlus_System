<div id="main-wrapper">
    <link href="../../vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">

    <?php
include "sidebar.php"
    ?>
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
                                <div id="wizard_Service" class="tab-pane" role="tabpanel">
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
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-lg-6 mb-2">
                                            <div class="mb-3">
                                                <label class="text-label form-label">Description</label>
                                                <input type="text" name="lastName" class="form-control" placeholder="Briefly describe the case nature" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <div class="mb-3">
                                                <label class="text-label form-label">Additional Information</label>
                                                <input type="text" name="place" class="form-control" required="">
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
                                                <input type="text" name="phoneNumber" class="form-control" placeholder="(+94)77 123 4567" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="mb-3">
                                                <label class="text-label form-label">Email*</label>
                                                <input type="text" name="place" class="form-control" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="wizard_Details" class="tab-pane" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm-4 mb-2">
                                            <h4>Monday *</h4>
                                        </div>
                                        <div class="col-6 col-sm-4 mb-2">
                                            <div class="mb-3">
                                                <input class="form-control" value="9.00" type="number" name="input1" id="input1">
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-4 mb-2">
                                            <div class="mb-3">
                                                <input class="form-control" value="6.00" type="number" name="input2" id="input2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 mb-2">
                                            <h4>Tuesday *</h4>
                                        </div>
                                        <div class="col-6 col-sm-4 mb-2">
                                            <div class="mb-3">
                                                <input class="form-control" value="9.00" type="number" name="input3" id="input3">
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-4 mb-2">
                                            <div class="mb-3">
                                                <input class="form-control" value="6.00" type="number" name="input4" id="input4">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 mb-2">
                                            <h4>Wednesday *</h4>
                                        </div>
                                        <div class="col-6 col-sm-4 mb-2">
                                            <div class="mb-3">
                                                <input class="form-control" value="9.00" type="number" name="input5" id="input5">
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-4 mb-2">
                                            <div class="mb-3">
                                                <input class="form-control" value="6.00" type="number" name="input6" id="input6">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 mb-2">
                                            <h4>Thrusday *</h4>
                                        </div>
                                        <div class="col-6 col-sm-4 mb-2">
                                            <div class="mb-3">
                                                <input class="form-control" value="9.00" type="number" name="input7" id="input7">
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-4 mb-2">
                                            <div class="mb-3">
                                                <input class="form-control" value="6.00" type="number" name="input8" id="input8">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 mb-2">
                                            <h4>Friday *</h4>
                                        </div>
                                        <div class="col-6 col-sm-4 mb-2">
                                            <div class="mb-3">
                                                <input class="form-control" value="9.00" type="number" name="input9" id="input9">
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-4 mb-2">
                                            <div class="mb-3">
                                                <input class="form-control" value="6.00" type="number" name="input10" id="input10">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="wizard_Payment" class="tab-pane" role="tabpanel">
                                    <div class="row emial-setup">
                                        <div class="col-lg-3 col-sm-6 col-6">
                                            <div class="mb-3">
                                                <label for="mailclient11" class="mailclinet mailclinet-gmail">
                                                    <input type="radio" name="emailclient" id="mailclient11">
                                                    <span class="mail-icon">
																<i class="mdi mdi-google-plus" aria-hidden="true"></i>
															</span>
                                                    <span class="mail-text">I'm using Gmail</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-6">
                                            <div class="mb-3">
                                                <label for="mailclient12" class="mailclinet mailclinet-office">
                                                    <input type="radio" name="emailclient" id="mailclient12">
                                                    <span class="mail-icon">
																<i class="mdi mdi-office" aria-hidden="true"></i>
															</span>
                                                    <span class="mail-text">I'm using Office</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-6">
                                            <div class="mb-3">
                                                <label for="mailclient13" class="mailclinet mailclinet-drive">
                                                    <input type="radio" name="emailclient" id="mailclient13">
                                                    <span class="mail-icon">
																<i class="mdi mdi-google-drive" aria-hidden="true"></i>
															</span>
                                                    <span class="mail-text">I'm using Drive</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-6">
                                            <div class="mb-3">
                                                <label for="mailclient14" class="mailclinet mailclinet-another">
                                                    <input type="radio" name="emailclient" id="mailclient14">
                                                    <span class="mail-icon">
																<i class="fa fa-question-circle-o" aria-hidden="true"></i>
															</span>
                                                    <span class="mail-text">Another Service</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="skip-email text-center">
                                                <p>Or if want skip this step entirely and setup it later</p>
                                                <a href="javascript:void(0)">Skip step</a>
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
</div>
</div>
    
    

<!-- Form Steps -->
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
<script src="../../js/demo.js"></script>
<script src="../../js/styleSwitcher.js"></script>
    <script>
    $(document).ready(function(){
        // SmartWizard initialize
        $('#smartwizard').smartWizard();
    });
</script>

