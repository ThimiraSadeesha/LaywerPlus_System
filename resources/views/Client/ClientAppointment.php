
<body>
<div id="main-wrapper">
    <?php
    global $conn, $lawyerCount;
    include 'Sidebar.php';
    ?>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a>Appointment</a></li>
                    <li class="breadcrumb-item"><a>New Appointment</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="dropdown custom-dropdown">
                                        <button type="button" class="btn btn-sm btn-primary"
                                                data-bs-toggle="dropdown">Select Lawyer
                                            <i class="fa fa-angle-down ms-3"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Lawyer name with id</a>
                                            <a class="dropdown-item" href="#">Lawyer name with id</a>
                                            <a class="dropdown-item" href="#">Lawyer name with id</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="dropdown custom-dropdown">
                                        <button type="button" class="btn btn-sm btn-primary"
                                                data-bs-toggle="dropdown">Select Case
                                            <i class="fa fa-angle-down ms-3"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Case ID1</a>
                                            <a class="dropdown-item" href="#">Case ID2</a>
                                            <a class="dropdown-item" href="#">Case ID3</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="dropdown custom-dropdown">
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="dropdown">
                                            <i class="ti-calendar m-r-5"></i> &nbsp;&nbsp;&nbsp; Select Date & Time
                                            <i class="fa fa-angle-down ms-3"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">May 20, 2018 &nbsp; &nbsp; 10.30 AM</a>
                                            <a class="dropdown-item" href="#">July 20, 2018 &nbsp; &nbsp; 10.30 AM</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="basic-form">
                                    <form method="post">
                                    <textarea name="message" class="form-control input-default fixed-textarea"
                                              placeholder="Type your notice here."></textarea>
                                        <br>
                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">Send
                                            Statement
                                        </button>
                                    </form>
                                </div>
                                <style>
                                    .fixed-textarea {
                                        resize: none;
                                        height: 120px;
                                        border: 1px solid #6c4bae;
                                    }
                                </style>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <!-- Duplicated card content here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
