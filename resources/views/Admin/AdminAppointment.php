<div id="main-wrapper">
    <?php
    session_start();
    include 'Sidebar.php';
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'lawyerPlus';

    // Connect to database
    $conn = new mysqli($host, $user, $password, $dbname);
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }



    ?>

    <!-- Content body start -->
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a>Administrator</a></li>
                    <li class="breadcrumb-item"><a>Appointments</a></li>
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
                                        <th class="align-middle"><strong>Appointment ID</strong></th>
                                        <th class="align-middle"><strong>Case Type</strong></th>
                                        <th class="align-middle"><strong>Lawyer ID</strong></th>
                                        <th class="align-middle"><strong>Client ID</strong></th>

                                    </tr>
                                    </thead>
                                    <tbody id="orders">
                                    <?php
                                    $sql = "SELECT * FROM `appointment` ";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<tr>";
                                            echo '<tr class="btn-reveal-trigger">';

                                            echo '<td class="py-2">
                                                            <a href="#">
                                                                <strong>' . $row['Appointment_id'] . '</strong>
                                                            </a>
                                                        </td>';

                                            echo "<td>" . $row['Case_Type'] . "</td>";
                                            echo "<td>" . $row['Lawyer_Id'] . "</td>";
                                            echo "<td>" . $row['client_id'] . "</td>";

                                            echo '</tr>';

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




