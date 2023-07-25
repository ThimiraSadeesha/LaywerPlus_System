<div id="main-wrapper">
    
       
<?php
global $conn;

include 'sidebar.php';
require_once 'db_connection.php';

$sql = "SELECT * FROM lawyer";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '
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
                                                <th class="align-middle">Lawyer ID</th>
                                                <th class="align-middle">Lawyer Name</th>
                                                <th class="align-middle">Title</th>
                                                <th class="align-middle">Email</th>
                                                <th class="align-middle">Category</th>
                                                <th class="align-middle">Contact</th>
                                                <th class="align-middle">Status</th>
                                                <th class="align-middle">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="orders">';

    // Loop through each row and display the data
    while ($row = $result->fetch_assoc()) {
        // Access data from the row
        $lawyer_id = $row['lawyer_id'];
        $title = $row['title'];
        $name = $row['name'];
        $email = $row['email'];
        $category = $row['category'];
        $contact_number = $row['contact_number'];
        $status = $row['status'];

        // Display the row data
        echo '<tr class="btn-reveal-trigger">';
        echo '<td class="py-2">
                    <div class="form-check custom-checkbox checkbox-success">
                        <input type="checkbox" class="form-check-input" id="checkbox">
                        <label class="form-check-label" for="checkbox"></label>
                    </div>
                </td>';
        echo '<td class="py-2">
                    <a href="#">
                        <strong>' . $lawyer_id . '</strong>
                    </a>
                </td>';
        echo '<td class="py-2">' . $name . '</td>';
        echo '<td class="py-2">' . $title . '</td>';
        echo '<td class="py-2">' . $email . '</td>';
        echo '<td class="py-2">' . $category . '</td>';
        echo '<td class="py-2">' . $contact_number . '</td>';
        echo '<td class="py-2"><span class="badge badge-success">Active<span class="ms-1 fa fa-check"></span></span></td>';
        echo '<td class="py-2">
                    <div class="dropdown text-sans-serif">
                        <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-0" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                        <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                        <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                    </g>
                                </svg>
                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-0">
                            <div class="py-2">
                                <a class="dropdown-item" href="javascript:void(0);">Inactive</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-warning" href="javascript:void(0);">Hold</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="javascript:void(0);">Block</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                            </div>
                        </div>
                    </div>
                </td>';
        echo '</tr>';
    }

    // Close the table
    echo '</tbody>
        </table>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>';

}
?>
