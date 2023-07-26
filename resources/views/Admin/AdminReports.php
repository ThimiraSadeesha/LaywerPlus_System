<?php include 'sidebar.php'; ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a>Administrator</a></li>
                <li class="breadcrumb-item"><a>Case Status</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-xl-6 col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Total Projects</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="barChart_1"></canvas>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-6 col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Project Categories</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="doughnut_chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a>Administrator</a></li>
                <li class="breadcrumb-item"><a>Financial Status</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-xl-6 col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Income Of the Months</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="lineChart_1"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Income by Case Type</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="barChart_2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
