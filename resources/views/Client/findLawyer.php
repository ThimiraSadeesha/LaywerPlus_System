<div id="main-wrapper">
    <?php
    include "sidebar.php";
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'lawyerPlus';

    // Connect to the database
    $conn = new mysqli($host, $user, $password, $dbname);
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $query = "SELECT `lawyer_id`, `title`, `name`, `email`, `category`, `contact_number`, `status` FROM lawyer";

    $result = $conn->query($query);

    ?>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <?php
                if ($result && $result->num_rows > 0) {
                    // Loop through the rows to process each record and display them
                    while ($row = $result->fetch_assoc()) {
                        $lawyer_id = $row['lawyer_id'];
                        $title = $row['title'];
                        $name = $row['name'];
                        $email = $row['email'];
                        $category = $row['category'];
                        $contact_number = $row['contact_number'];
                        $status = $row['status'];


                        ?>

                        <div class="col-lg-12 col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row m-b-30">
                                        <div class="col-md-5 col-xxl-12">
                                            <div class="new-lawyer mb-4 mb-xxl-4 mb-md-0">
                                                <img class="img-fluid" src="../../images/2.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-xxl-12">
                                            <div class="new-arrival-content position-relative">
                                                <h4><a href=""><?php echo "Dr." . " " . $title . " " . $name ?></a></h4>
                                                <p>Availability: <span class="item"> <?php echo $status ?><i class="fa fa-check-circle text-success"></i></span></p>
                                                <p>Lawyer code: <span class="item"><?php echo $lawyer_id ?></span></p>
                                                <p>Category: <span class="item"><?php echo $category ?></span></p>
                                                <p>Location: <span class="item">Colombo</span></p>
                                                <p class="text-content">There are many variations of passages of Lorem Ipsum
                                                    available, but the majority have suffered alteration in some form, by injected
                                                    humour, or randomised words.</p>
                                                <br>
                                                <button type="button" class="btn btn-primary btn-xs">Hire Lawyer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "No lawyer records found.";
                }
                ?>
            </div>
        </div>
        </div>
    </div>
</div>




