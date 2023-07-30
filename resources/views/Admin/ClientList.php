<div id="main-wrapper">
    <!-- Include the sidebar -->
    <?php include 'sidebar.php';
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'lawyerPlus';

    // Connect to database
    $conn = new mysqli($host, $user, $password, $dbname);
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Helper function to get count from query
    function getCount($conn, $query)
    {
        $result = $conn->query($query);
        if ($result && $result->num_rows === 1) {
            return $result->fetch_assoc()['completed_count'];
        }
        return 0;
    }
    // Check if the delete form is submitted for the first table
    if (isset($_POST['delete_clients'])) {
        $selectedClients = $_POST['clients'];
        $clientIds = implode(",", $selectedClients);
        $stmt = $conn->prepare("DELETE FROM client WHERE client_id IN ($clientIds)");

        if ($stmt->execute()) {
            echo json_encode(['message' => 'Selected clients deleted successfully!']);
        } else {
            echo json_encode(['error' => 'Error deleting clients: ' . $conn->error]);
        }
        exit;
    }

    // Check if the status update form is submitted for the first table
    if (isset($_POST['update_status'])) {
        $clientId = $_POST['client_id'];
        $newStatus = $_POST['status'];
        $stmt = $conn->prepare("UPDATE client SET status = ? WHERE client_id = ?");
        $stmt->bind_param("si", $newStatus, $clientId);

        if ($stmt->execute()) {
            echo json_encode(['message' => 'Status updated successfully!']);
        } else {
            echo json_encode(['error' => 'Error updating status: ' . $conn->error]);
        }
        exit;
    }
    // Check if the delete form is submitted for the second table
    if (isset($_POST['delete_deleted_client'])) {
        $deletedClientId = $_POST['deleted_client_id'];
        $stmt = $conn->prepare("DELETE FROM deleted_client WHERE client_id = ?");
        $stmt->bind_param("i", $deletedClientId);

        if ($stmt->execute()) {
            echo json_encode(['message' => 'Deleted client record successfully!']);
        } else {
            echo json_encode(['error' => 'Error deleting client record: ' . $conn->error]);
        }
        exit;
    }

    ?>

    <!-- Content body start -->
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a>Administrator</a></li>
                    <li class="breadcrumb-item"><a>Active Clients</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm mb-0">
                                    <thead>
                                    <tr>

                                        <th class="align-middle">Client ID</th>
                                        <th class="align-middle">Name</th>
                                        <th class="align-middle">NIC</th>
                                        <th class="align-middle">Email</th>
                                        <th class="align-middle">DOB</th>
                                        <th class="align-middle">Contact Number</th>
                                        <th class="align-middle">Address</th>
                                        <th class="align-middle">Password</th>
                                        <th class="align-middle">Registered Date</th>
                                        <th class="align-middle">Status</th>
                                        <th class="align-middle">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="orders">
                                    <?php
                                    $sql = "SELECT * FROM `client` ";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<tr>";

                                            echo "<td>" . $row['client_id'] . "</td>";
                                            echo "<td>" . $row['name'] . "</td>";
                                            echo "<td>" . $row['nic'] . "</td>";
                                            echo "<td>" . $row['email'] . "</td>";
                                            echo "<td>" . $row['DOB'] . "</td>";
                                            echo "<td>" . $row['contact_number'] . "</td>";
                                            echo "<td>" . $row['address'] . "</td>";
                                            echo "<td>" . $row['password'] . "</td>";
                                            echo "<td>" . $row['registerd_datte'] . "</td>";
                                            echo "<td>";
                                            if ($row['status'] == 'active') {
                                                echo "<span class='badge badge-success'>Active</span>";
                                            } elseif ($row['status'] == 'blocked') {
                                                echo "<span class='badge badge-danger'>Block</span>";
                                            }  else {
                                                echo $row['status']; // Fallback in case of unexpected status values
                                            }
                                            echo "</td>";
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
                                                                        <a class="dropdown-item" href="javascript:void(0);">Active</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item" href="javascript:void(0);">Inactive</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item text-warning" href="javascript:void(0);">Hold</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item text-danger" href="javascript:void(0);">Block</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item text-danger delete-link" href="javascript:void(0);">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>';
                                            echo '</tr>';


                                            echo "</tr>";

                                        }

                                    } else {
                                        echo "<tr><td colspan='7'>No data found</td></tr>";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a>Administrator</a></li>
                <li class="breadcrumb-item"><a>Active Lawyers</a></li>
            </ol>
        </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm mb-0">
                                    <thead>
                                    <tr>

                                        <th class="align-middle">Client ID</th>
                                        <th class="align-middle">Name</th>
                                        <th class="align-middle">NIC</th>
                                        <th class="align-middle">Email</th>
                                        <th class="align-middle">DOB</th>
                                        <th class="align-middle">Contact Number</th>
                                        <th class="align-middle">Address</th>
                                        <th class="align-middle">Password</th>
                                        <th class="align-middle">Registered Date</th>
                                        <th class="align-middle">Status</th>
                                        <th class="align-middle">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="orders">
                                    <?php
                                    $sql = "SELECT * FROM `deleted_client` ";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<tr>";

                                            echo "<td>" . $row['client_id'] . "</td>";
                                            echo "<td>" . $row['name'] . "</td>";
                                            echo "<td>" . $row['nic'] . "</td>";
                                            echo "<td>" . $row['email'] . "</td>";
                                            echo "<td>" . $row['DOB'] . "</td>";
                                            echo "<td>" . $row['contact_number'] . "</td>";
                                            echo "<td>" . $row['address'] . "</td>";
                                            echo "<td>" . $row['password'] . "</td>";
                                            echo "<td>" . $row['registerd_datte'] . "</td>";
                                            echo "<td>";
                                            if ($row['status'] == 'active') {
                                                echo "<span class='badge badge-success'>Active</span>";
                                            } elseif ($row['status'] == 'blocked') {
                                                echo "<span class='badge badge-danger'>Block</span>";
                                            }  else {
                                                echo $row['status']; // Fallback in case of unexpected status values
                                            }
                                            echo "</td>";
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
                                                                        <button type="button" class="btn light btn-success" data-client-id="' . $row['client_id'] . '">Restore</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>';
                                            echo '</tr>';


                                            echo "</tr>";

                                        }

                                    } else {
                                        echo "<tr><td colspan='7'>No data found</td></tr>";
                                    }


                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<script>
    function checkAllCheckboxes() {
        // Get the value of the "Check All" checkbox
        var checkAllCheckbox = document.getElementById("checkAll");
        var isChecked = checkAllCheckbox.checked;

        // Get all other checkboxes
        var checkboxes = document.getElementsByClassName("delete-checkbox");

        // Loop through all checkboxes and set their state based on the "Check All" checkbox
        for (var i = 0; i < checkboxes.length; i++) {
            // Check the first checkbox if it is the "Check All" checkbox or if it has the data-client-id attribute set to "header"
            if (checkboxes[i] === checkAllCheckbox || checkboxes[i].dataset.clientId === "header") {
                checkboxes[i].checked = isChecked;
            } else {
                // Check other checkboxes only if the "Check All" checkbox is checked
                if (isChecked) {
                    checkboxes[i].checked = true;
                } else {
                    checkboxes[i].checked = false;
                }
            }
        }
    }

    // Delete handler for first table
    $(".delete-link").click(function() {

        var clientId = $(this).closest("tr").find(".delete-checkbox").data("client-id");

        $.ajax({
            url: "",
            type: "POST",
            data: {clients: [clientId], delete_clients: true},
            success: function(response) {
                console.log(response);
                location.reload();
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });

    });

    // Delete handler for second table
    $(".btn-success").click(function() {

        var clientId = $(this).data("client-id");

        $.ajax({
            url: "",
            type: "POST",
            data: { deleted_client_id: clientId, delete_deleted_client: true },
            success: function(response) {
                console.log(response);
                location.reload();
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });

    });

    // Attach a click event handler to the status options
    $(".dropdown-item[href='javascript:void(0);']").on("click", function () {
        // Get the client ID from the data attribute
        var clientId = $(this).closest("tr").find(".delete-checkbox").data("client-id");

        // Get the selected status
        var newStatus = $(this).text();

        // Send the status update request to the server using AJAX
        $.ajax({
            url: "",
            type: "POST",
            data: {client_id: clientId, status: newStatus, update_status: true},
            success: function (response) {
                // Handle the response from the server if needed
                console.log("Status updated successfully!");
                location.reload();
            },
            error: function (error) {
                console.error("Error updating status:", error);
            }

        });
    });

</script>
