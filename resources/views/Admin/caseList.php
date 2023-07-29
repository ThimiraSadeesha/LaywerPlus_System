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

    ?>

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

                                        <th class="align-middle">Case ID</th>
                                        <th class="align-middle">Lawyer ID</th>
                                        <th class="align-middle">Client ID</th>
                                        <th class="align-middle">Category</th>
                                        <th class="align-middle">Date</th>
                                        <th class="align-middle">Status</th>
                                        <th class="align-middle">Amount</th>


                                    </tr>
                                    </thead>
                                    <tbody id="orders">
                                    <?php
                                    $sql = "SELECT * FROM `case` ";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<tr>";

                                            echo "<td>" . $row['case_id'] . "</td>";
                                            echo "<td>" . $row['lawyer_id'] . "</td>";
                                            echo "<td>" . $row['client_id'] . "</td>";
                                            echo "<td>" . $row['C_type'] . "</td>";
                                            echo "<td>" . $row['submit_date'] . "</td>";
                                            echo "<td>";
                                            if ($row['satuts'] == 'Completed') {
                                                echo "<span class='badge badge-success'>Completed</span>";
                                            } elseif ($row['satuts'] == 'Cancelled') {
                                                echo "<span class='badge badge-danger'>Cancelled</span>";
                                            } elseif ($row['satuts'] == 'Pending') {
                                                echo "<span class='badge badge-warning'>Pending</span>";
                                            } elseif ($row['satuts'] == 'Processing') {
                                                echo "<span class='badge badge-primary'>Processing</span>";
                                            } else {
                                                echo $row['satuts']; // Fallback in case of unexpected status values
                                            }
                                            echo "</td>";
                                            echo "<td>" . $row['Amount'] . "</td>";



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

</div>
