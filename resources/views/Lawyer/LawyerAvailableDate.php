<?php
include "Sidebar.php";
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
                    <div class="col-xl-6">
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="datepicker">Select Date</label>
                                    <input type="date" class="form-control" id="datepicker">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Left Placement</label>
                                    <div class="input-group clockpicker" data-placement="left" data-align="top"
                                         data-autobtn-close="true">
                                        <input type="text" class="form-control" value="13:14:PM">
                                        <span class="input-group-text"><i class="far fa-clock"></i></span>
                                    </div>
                                </div>
                                <div>
                            </form>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>