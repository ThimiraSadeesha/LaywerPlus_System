<div id="main-wrapper">
    <?php
    global $conn;

    include 'sidebar.php';
    require_once 'db_connection.php';

    // Check if the delete form is submitted
    if (isset($_POST['delete_lawyers'])) {
        $selectedLawyers = $_POST['lawyers'];
        $lawyerIds = implode(",", $selectedLawyers);
        $stmt = $conn->prepare("DELETE FROM lawyer WHERE lawyer_id IN ($lawyerIds)");

        if ($stmt->execute()) {
            echo json_encode(['message' => 'Selected lawyers deleted successfully!']);
        } else {
            echo json_encode(['error' => 'Error deleting lawyers: ' . $conn->error]);
        }
        exit;
    }

    // Check if the status update form is submitted
    if (isset($_POST['update_status'])) {
        $lawyerId = $_POST['lawyer_id'];
        $newStatus = $_POST['status'];
        $stmt = $conn->prepare("UPDATE lawyer SET status = ? WHERE lawyer_id = ?");
        $stmt->bind_param("si", $newStatus, $lawyerId);

        if ($stmt->execute()) {
            echo json_encode(['message' => 'Status updated successfully!']);
        } else {
            echo json_encode(['error' => 'Error updating status: ' . $conn->error]);
        }
        exit;
    }

    // Retrieve data for the first table
    $sql = "SELECT * FROM lawyer";
    $result = $conn->query($sql);
    ?>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <form method="post" action="">
                                    <table class="table table-sm mb-0">
                                        <thead>
                                        <tr>
                                            <th class="align-middle">
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
                                        <tbody>
                                        <?php
                                        while ($row = $result->fetch_assoc()) {
                                            // Access data from the row
                                            $lawyer_id = $row['lawyer_id'];
                                            $title = $row['title'];
                                            $name = $row['name'];
                                            $email = $row['email'];
                                            $category = $row['category'];
                                            $contact_number = $row['contact_number'];
                                            $status = $row['status'];

                                            // Define the icons based on the status
                                            $statusIcon = "";
                                            switch ($status) {
                                                case "Inactive":
                                                case "Hold":
                                                case "Block":
                                                case "Active":
                                                    break;
                                                default:
                                                    // Default case if status doesn't match any of the above
                                                    $statusIcon = "";
                                                    break;
                                            }
                                            // Display the row data for the first table
                                            echo '<tr class="btn-reveal-trigger">';
                                            echo '<td class="py-2">
                                                        <div class="form-check custom-checkbox checkbox-success">
                                                            <input type="checkbox" class="form-check-input delete-checkbox" data-lawyer-id="' . $lawyer_id . '">
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
                                            echo '<td class="py-2">';
                                            if ($status == "Active") {
                                                echo '<span class="badge badge-success">' . $status . $statusIcon . '</span></td>';
                                            } elseif ($status == "Inactive") {
                                                echo '<span class="badge badge-primary"> ' . $status . $statusIcon . '</span></td>';
                                            } elseif ($status == "Hold") {
                                                echo '<span class="badge badge-warning"> ' . $status . $statusIcon . '</span></td>';
                                            } elseif ($status == "Block") {
                                                echo '<span class="badge badge-danger">' . $status . $statusIcon . '</span></td>';
                                            }
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
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Deleted records Table -->
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-center">
                            <h1 class="card-title">Deleted Lawyer Records</h1>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form method="post" action="">
                                    <table class="table table-sm mb-0">
                                        <thead>
                                        <tr>
                                            <th class="align-middle"></th>
                                            <th class="align-middle">Lawyer ID</th>
                                            <th class="align-middle">Name</th>
                                            <th class="align-middle">Email</th>
                                            <th class="align-middle">Contact</th>
                                            <th class="align-middle">Status</th>
                                            <th class="align-middle">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
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
            // Check the first checkbox if it is the "Check All" checkbox or if it has the data-lawyer-id attribute set to "header"
            if (checkboxes[i] === checkAllCheckbox || checkboxes[i].dataset.lawyerId === "header") {
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

    $(document).ready(function () {
        // Attach a click event handler to the delete button
        $(".delete-link").on("click", function () {
            // Get the lawyer ID from the data attribute
            var lawyerId = $(this).closest("tr").find(".delete-checkbox").data("lawyer-id");

            // Send the delete request to the server using AJAX
            $.ajax({
                url: "",
                type: "POST",
                data: {lawyers: [lawyerId], delete_lawyers: true},
                success: function (response) {
                    console.log("Selected lawyer deleted successfully!");
                    location.reload(); // Reload the page after successful deletion
                },
                error: function (error) {
                    // Handle errors if the deletion fails
                    console.error("Error deleting lawyer:", error);
                }
            });
        });

        // Attach a click event handler to the status options
        $(".dropdown-item[href='javascript:void(0);']").on("click", function () {
            // Get the lawyer ID from the data attribute
            var lawyerId = $(this).closest("tr").find(".delete-checkbox").data("lawyer-id");

            // Get the selected status
            var newStatus = $(this).text();

            // Send the status update request to the server using AJAX
            $.ajax({
                url: "",
                type: "POST",
                data: {lawyer_id: lawyerId, status: newStatus, update_status: true},
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
    });
</script>