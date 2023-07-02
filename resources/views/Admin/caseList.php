
<div id="main-wrapper">
    <!-- Include the sidebar -->
    <?php include 'sidebar.php'; ?>
    <!-- Content body start -->
    <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm mb-0">
                                        <thead>
                                        <tr>
                                            <th class="align-middle">
                                                <div class="form-check custom-checkbox">
                                                    <input type="checkbox" class="form-check-input" id="checkAll">
                                                    <label class="form-check-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th class="align-middle">Case ID</th>
                                            <th class="align-middle">Lawyer ID</th>
                                            <th class="align-middle">Client ID</th>
                                            <th class="align-middle ">Date</th>
                                            <th class="align-middle">Category</th>
                                            <th class="align-middle">Status</th>
                                            <th class="align-middle">Amount</th>
                                            <th class="align-middle">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="orders">
                                        <tr class="btn-reveal-trigger">
                                            <td class="py-2">
                                                <div class="form-check custom-checkbox checkbox-success">
                                                    <input type="checkbox" class="form-check-input" id="checkbox">
                                                    <label class="form-check-label" for="checkbox"></label>
                                                </div>
                                            </td>
                                            <td class="py-2">
                                                <a href="#">
                                                    <strong>#181</strong></a> 
                                                <br><a href="mailto:ricky@example.com">ricky@example.com</a></td>
                                            <td class="py-2" >$99</td>
                                            <td class="py-2">$99</td>
                                            <td class="py-2">20/04/2020</td>
                                            <td class="py-2">Traffic Case
                                            </td>
                                            <td class="py-2"><span class="badge badge-success">Completed<span class="ms-1 fa fa-check"></span></span>
                                            </td>
                                            <td class="py-2">$99</td>
                                            <td class="py-2">
                                                <div class="dropdown text-sans-serif"><button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-0" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></span></button>
                                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-0">
                                                        <div class="py-2"><a class="dropdown-item" href="javascript:void(0);">Completed</a><a class="dropdown-item" href="javascript:void(0);">Processing</a><a class="dropdown-item" href="javascript:void(0);">On Hold</a><a class="dropdown-item" href="javascript:void(0);">Pending</a>
                                                            <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="btn-reveal-trigger">
                                            <td class="py-2">
                                                <div class="form-check custom-checkbox ">
                                                    <input type="checkbox" class="form-check-input" id="checkbox1">
                                                    <label class="form-check-label" for="checkbox1"></label>
                                                </div>
                                            </td>
                                            <td class="py-2">
                                                <a href="#">
                                                    <strong>#182</strong></a> <br><a href="mailto:kin@example.com">kin@example.com</a></td>
                                            <td class="py-2">$99</td>
                                            <td class="py-2">$99</td>
                                            <td class="py-2">20/04/2020</td>
                                            <td class="py-2">Criminal Case

                                            <td class="py-2"><span class="badge badge-primary">Processing<span class="ms-1 fa fa-redo"></span></span>
                                            </td>
                                            <td class="py-2">$120
                                            </td>
                                            <td class="py-2">
                                                <div class="dropdown text-sans-serif"><button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-1" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></span></button>
                                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-1">
                                                        <div class="py-2"><a class="dropdown-item" href="javascript:void(0);">Completed</a><a class="dropdown-item" href="javascript:void(0);">Processing</a><a class="dropdown-item" href="javascript:void(0);">On Hold</a><a class="dropdown-item" href="javascript:void(0);">Pending</a>
                                                            <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Content body end -->

    <?php
            header('Cache-Control: no cache');
            session_cache_limiter('private_no_expire');
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $dbname = 'lawyerPlus';

       $conn = new mysqli($host, $user, $password, $dbname);

        if ($conn->connect_error) {
             die('Connection failed: ' . $conn->connect_error);
        }
        $sql ="SELECT `case_id`, `client_id`, `description`, `type`, `date`, `satuts` FROM `case` WHERE 1";
        $result = $conn->query($sql);

    ?>

</div>
