
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
                                            <th class="align-middle">Date</th>
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
                                                    <input type="checkbox" class="form-check-input" id="checkbox1">
                                                    <label class="form-check-label" for="checkbox1"></label>
                                                </div>
                                            </td>
                                            <td class="py-2">
                                                <a href="#">
                                                    <strong>C145</strong>
                                                </a>
                                            </td>
                                            <td class="py-2">Robert Taylor</td>
                                            <td class="py-2">Charlotte Davis</td>
                                            <td class="py-2">20/04/2023</td>
                                            <td class="py-2">Traffic Case</td>
                                            <td class="py-2">
                                                <span class="badge badge-success">Completed<span class="ms-1 fa fa-check"></span></span>
                                            </td>
                                            <td class="py-2">Rs.2500</td>
                                            <td class="py-2">
                                                <div class="dropdown text-sans-serif">
                                                    <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-1" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                                <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                                <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-1">
                                                        <div class="py-2">
                                                            <a class="dropdown-item" href="javascript:void(0);">Completed</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Processing</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">On Hold</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Pending</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="btn-reveal-trigger">
                                            <td class="py-2">
                                                <div class="form-check custom-checkbox checkbox-success">
                                                    <input type="checkbox" class="form-check-input" id="checkbox2">
                                                    <label class="form-check-label" for="checkbox2"></label>
                                                </div>
                                            </td>
                                            <td class="py-2">
                                                <a href="#">
                                                    <strong>C267</strong>
                                                </a>
                                            </td>
                                            <td class="py-2">David Johnson</td>
                                            <td class="py-2">Emma Wilson</td>
                                            <td class="py-2">15/06/2023</td>
                                            <td class="py-2">Divorce Case</td>
                                            <td class="py-2">
                                                <span class="badge badge-danger">Cancelled<span class="ms-1 fa fa-cancel"></span></span>
                                            </td>
                                            <td class="py-2">Rs.1800</td>
                                            <td class="py-2">
                                                <div class="dropdown text-sans-serif">
                                                    <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-2" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                        </g>
                                                    </svg>
                                                </span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-2">
                                                        <div class="py-2">
                                                            <a class="dropdown-item" href="javascript:void(0);">Completed</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Processing</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">On Hold</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Pending</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="btn-reveal-trigger">
                                            <td class="py-2">
                                                <div class="form-check custom-checkbox checkbox-success">
                                                    <input type="checkbox" class="form-check-input" id="checkbox3">
                                                    <label class="form-check-label" for="checkbox3"></label>
                                                </div>
                                            </td>
                                            <td class="py-2">
                                                <a href="#">
                                                    <strong>C389</strong>
                                                </a>
                                            </td>
                                            <td class="py-2">Jennifer Adams</td>
                                            <td class="py-2">Oliver Green</td>
                                            <td class="py-2">05/07/2023</td>
                                            <td class="py-2">Real Estate Case</td>
                                            <td class="py-2">
                                                <span class="badge badge-warning">Pending<span class="ms-1 fa fa-pause"></span></span>
                                            </td>
                                            <td class="py-2">Rs.3200</td>
                                            <td class="py-2">
                                                <div class="dropdown text-sans-serif">
                                                    <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-3" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                                <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                                <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-3">
                                                        <div class="py-2">
                                                            <a class="dropdown-item" href="javascript:void(0);">Completed</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Processing</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">On Hold</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Pending</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="btn-reveal-trigger">
                                            <td class="py-2">
                                                <div class="form-check custom-checkbox checkbox-success">
                                                    <input type="checkbox" class="form-check-input" id="checkbox4">
                                                    <label class="form-check-label" for="checkbox4"></label>
                                                </div>
                                            </td>
                                            <td class="py-2">
                                                <a href="#">
                                                    <strong>C512</strong>
                                                </a>
                                            </td>
                                            <td class="py-2">Michael Thompson</td>
                                            <td class="py-2">Sophia Roberts</td>
                                            <td class="py-2">12/08/2023</td>
                                            <td class="py-2">Criminal Case</td>
                                            <td class="py-2">
                                                <span class="badge badge-primary">Processing<span class="ms-1 fa fa-spinner"></span></span>
                                            </td>
                                            <td class="py-2">Rs.4000</td>
                                            <td class="py-2">
                                                <div class="dropdown text-sans-serif">
                                                    <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-4" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                                <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                                <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-4">
                                                        <div class="py-2">
                                                            <a class="dropdown-item" href="javascript:void(0);">Completed</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Processing</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">On Hold</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Pending</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="btn-reveal-trigger">
                                            <td class="py-2">
                                                <div class="form-check custom-checkbox checkbox-success">
                                                    <input type="checkbox" class="form-check-input" id="checkbox5">
                                                    <label class="form-check-label" for="checkbox5"></label>
                                                </div>
                                            </td>
                                            <td class="py-2">
                                                <a href="#">
                                                    <strong>C743</strong>
                                                </a>
                                            </td>
                                            <td class="py-2">Emily Davis</td>
                                            <td class="py-2">Daniel Wilson</td>
                                            <td class="py-2">03/09/2023</td>
                                            <td class="py-2">Family Case</td>
                                            <td class="py-2">
                                                <span class="badge badge-success">Completed<span class="ms-1 fa fa-check"></span></span>
                                            </td>
                                            <td class="py-2">Rs.2800</td>
                                            <td class="py-2">
                                                <div class="dropdown text-sans-serif">
                                                    <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-5" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                                <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                                <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-5">
                                                        <div class="py-2">
                                                            <a class="dropdown-item" href="javascript:void(0);">Completed</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Processing</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">On Hold</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Pending</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="btn-reveal-trigger">
                                            <td class="py-2">
                                                <div class="form-check custom-checkbox checkbox-success">
                                                    <input type="checkbox" class="form-check-input" id="checkbox6">
                                                    <label class="form-check-label" for="checkbox6"></label>
                                                </div>
                                            </td>
                                            <td class="py-2">
                                                <a href="#">
                                                    <strong>C865</strong>
                                                </a>
                                            </td>
                                            <td class="py-2">John Davis</td>
                                            <td class="py-2">Sophia Johnson</td>
                                            <td class="py-2">19/10/2023</td>
                                            <td class="py-2">Property Case</td>
                                            <td class="py-2">
                                                <span class="badge badge-danger">Cancelled<span class="ms-1 fa fa-cancel"></span></span>
                                            </td>
                                            <td class="py-2">Rs.2000</td>
                                            <td class="py-2">
                                                <div class="dropdown text-sans-serif">
                                                    <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-6" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                                    <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                                    <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-6">
                                                        <div class="py-2">
                                                            <a class="dropdown-item" href="javascript:void(0);">Completed</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Processing</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">On Hold</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Pending</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="btn-reveal-trigger">
                                            <td class="py-2">
                                                <div class="form-check custom-checkbox checkbox-success">
                                                    <input type="checkbox" class="form-check-input" id="checkbox7">
                                                    <label class="form-check-label" for="checkbox7"></label>
                                                </div>
                                            </td>
                                            <td class="py-2">
                                                <a href="#">
                                                    <strong>C927</strong>
                                                </a>
                                            </td>
                                            <td class="py-2">Sarah Johnson</td>
                                            <td class="py-2">Michael Davis</td>
                                            <td class="py-2">25/11/2023</td>
                                            <td class="py-2">Divorce Case</td>
                                            <td class="py-2">
                                                <span class="badge badge-warning">On Hold<span class="ms-1 fa fa-pause"></span></span>
                                            </td>
                                            <td class="py-2">Rs.3500</td>
                                            <td class="py-2">
                                                <div class="dropdown text-sans-serif">
                                                    <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-7" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                                    <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                                    <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-7">
                                                        <div class="py-2">
                                                            <a class="dropdown-item" href="javascript:void(0);">Completed</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Processing</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">On Hold</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Pending</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="btn-reveal-trigger">
                                            <td class="py-2">
                                                <div class="form-check custom-checkbox checkbox-success">
                                                    <input type="checkbox" class="form-check-input" id="checkbox8">
                                                    <label class="form-check-label" for="checkbox8"></label>
                                                </div>
                                            </td>
                                            <td class="py-2">
                                                <a href="#">
                                                    <strong>C109</strong>
                                                </a>
                                            </td>
                                            <td class="py-2">Benjamin Wilson</td>
                                            <td class="py-2">Olivia Smith</td>
                                            <td class="py-2">14/02/2024</td>
                                            <td class="py-2">Criminal Case</td>
                                            <td class="py-2">
                                                <span class="badge badge-primary">Processing<span class="ms-1 fa fa-spinner"></span></span>
                                            </td>
                                            <td class="py-2">Rs.3000</td>
                                            <td class="py-2">
                                                <div class="dropdown text-sans-serif">
                                                    <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-8" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                                    <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                                    <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-8">
                                                        <div class="py-2">
                                                            <a class="dropdown-item" href="javascript:void(0);">Completed</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Processing</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">On Hold</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Pending</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="btn-reveal-trigger">
                                            <td class="py-2">
                                                <div class="form-check custom-checkbox checkbox-success">
                                                    <input type="checkbox" class="form-check-input" id="checkbox9">
                                                    <label class="form-check-label" for="checkbox9"></label>
                                                </div>
                                            </td>
                                            <td class="py-2">
                                                <a href="#">
                                                    <strong>C215</strong>
                                                </a>
                                            </td>
                                            <td class="py-2">Sophia Johnson</td>
                                            <td class="py-2">Emily Davis</td>
                                            <td class="py-2">08/05/2024</td>
                                            <td class="py-2">Business Case</td>
                                            <td class="py-2">
                                                <span class="badge badge-warning">On Hold<span class="ms-1 fa fa-pause"></span></span>
                                            </td>
                                            <td class="py-2">Rs.1800</td>
                                            <td class="py-2">
                                                <div class="dropdown text-sans-serif">
                                                    <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-9" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                                    <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                                    <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-9">
                                                        <div class="py-2">
                                                            <a class="dropdown-item" href="javascript:void(0);">Completed</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Processing</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">On Hold</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Pending</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="btn-reveal-trigger">
                                            <td class="py-2">
                                                <div class="form-check custom-checkbox checkbox-success">
                                                    <input type="checkbox" class="form-check-input" id="checkbox10">
                                                    <label class="form-check-label" for="checkbox10"></label>
                                                </div>
                                            </td>
                                            <td class="py-2">
                                                <a href="#">
                                                    <strong>C312</strong>
                                                </a>
                                            </td>
                                            <td class="py-2">Oliver Wilson</td>
                                            <td class="py-2">Emma Thompson</td>
                                            <td class="py-2">12/08/2024</td>
                                            <td class="py-2">Family Case</td>
                                            <td class="py-2">
                                                <span class="badge badge-success">Completed<span class="ms-1 fa fa-check"></span></span>
                                            </td>
                                            <td class="py-2">Rs.2500</td>
                                            <td class="py-2">
                                                <div class="dropdown text-sans-serif">
                                                    <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-10" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                                    <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                                    <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-10">
                                                        <div class="py-2">
                                                            <a class="dropdown-item" href="javascript:void(0);">Completed</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Processing</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">On Hold</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Pending</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="btn-reveal-trigger">
                                            <td class="py-2">
                                                <div class="form-check custom-checkbox checkbox-success">
                                                    <input type="checkbox" class="form-check-input" id="checkbox11">
                                                    <label class="form-check-label" for="checkbox11"></label>
                                                </div>
                                            </td>
                                            <td class="py-2">
                                                <a href="#">
                                                    <strong>C478</strong>
                                                </a>
                                            </td>
                                            <td class="py-2">Isabella Smith</td>
                                            <td class="py-2">Ethan Johnson</td>
                                            <td class="py-2">15/09/2024</td>
                                            <td class="py-2">Divorce Case</td>
                                            <td class="py-2">
                                                <span class="badge badge-danger">Cancelled<span class="ms-1 fa fa-cancel"></span></span>
                                            </td>
                                            <td class="py-2">Rs.1800</td>
                                            <td class="py-2">
                                                <div class="dropdown text-sans-serif">
                                                    <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-11" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                                    <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                                    <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-11">
                                                        <div class="py-2">
                                                            <a class="dropdown-item" href="javascript:void(0);">Completed</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Processing</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">On Hold</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Pending</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="btn-reveal-trigger">
                                            <td class="py-2">
                                                <div class="form-check custom-checkbox checkbox-success">
                                                    <input type="checkbox" class="form-check-input" id="checkbox12">
                                                    <label class="form-check-label" for="checkbox12"></label>
                                                </div>
                                            </td>
                                            <td class="py-2">
                                                <a href="#">
                                                    <strong>C623</strong>
                                                </a>
                                            </td>
                                            <td class="py-2">Liam Wilson</td>
                                            <td class="py-2">Evelyn Thompson</td>
                                            <td class="py-2">05/11/2024</td>
                                            <td class="py-2">Property Case</td>
                                            <td class="py-2">
                                                <span class="badge badge-warning">Processing<span class="ms-1 fa fa-refresh"></span></span>
                                            </td>
                                            <td class="py-2">Rs.3200</td>
                                            <td class="py-2">
                                                <div class="dropdown text-sans-serif">
                                                    <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-12" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                                    <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                                    <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-12">
                                                        <div class="py-2">
                                                            <a class="dropdown-item" href="javascript:void(0);">Completed</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Processing</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">On Hold</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Pending</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="btn-reveal-trigger">
                                            <td class="py-2">
                                                <div class="form-check custom-checkbox checkbox-success">
                                                    <input type="checkbox" class="form-check-input" id="checkbox13">
                                                    <label class="form-check-label" for="checkbox13"></label>
                                                </div>
                                            </td>
                                            <td class="py-2">
                                                <a href="#">
                                                    <strong>C745</strong>
                                                </a>
                                            </td>
                                            <td class="py-2">Ethan Miller</td>
                                            <td class="py-2">Olivia Harris</td>
                                            <td class="py-2">12/02/2025</td>
                                            <td class="py-2">Criminal Case</td>
                                            <td class="py-2">
                                                <span class="badge badge-primary">Pending<span class="ms-1 fa fa-hourglass"></span></span>
                                            </td>
                                            <td class="py-2">Rs.1500</td>
                                            <td class="py-2">
                                                <div class="dropdown text-sans-serif">
                                                    <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-13" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                                <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                                <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-13">
                                                        <div class="py-2">
                                                            <a class="dropdown-item" href="javascript:void(0);">Completed</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Processing</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">On Hold</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Pending</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="btn-reveal-trigger">
                                            <td class="py-2">
                                                <div class="form-check custom-checkbox checkbox-success">
                                                    <input type="checkbox" class="form-check-input" id="checkbox14">
                                                    <label class="form-check-label" for="checkbox14"></label>
                                                </div>
                                            </td>
                                            <td class="py-2">
                                                <a href="#">
                                                    <strong>C896</strong>
                                                </a>
                                            </td>
                                            <td class="py-2">Sophia Davis</td>
                                            <td class="py-2">Mason Anderson</td>
                                            <td class="py-2">27/07/2025</td>
                                            <td class="py-2">Personal Injury Case</td>
                                            <td class="py-2">
                                                <span class="badge badge-success">Completed<span class="ms-1 fa fa-check"></span></span>
                                            </td>
                                            <td class="py-2">Rs.2800</td>
                                            <td class="py-2">
                                                <div class="dropdown text-sans-serif">
                                                    <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-14" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                                    <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                                    <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-14">
                                                        <div class="py-2">
                                                            <a class="dropdown-item" href="javascript:void(0);">Completed</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Processing</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">On Hold</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Pending</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
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

<!--<    -->
<!--//            header('Cache-Control: no cache');-->
<!--//            session_cache_limiter('private_no_expire');-->
<!--//        $host = 'localhost';-->
<!--//        $user = 'root';-->
<!--//        $password = '';-->
<!--//        $dbname = 'lawyerPlus';-->
<!--//-->
<!--//       $conn = new mysqli($host, $user, $password, $dbname);-->
<!--//-->
<!--//        if ($conn->connect_error) {-->
<!--//             die('Connection failed: ' . $conn->connect_error);-->
<!--//        }-->
<!--//        $sql ="SELECT `case_id`, `client_id`, `description`, `type`, `date`, `satuts` FROM `case` WHERE 1";-->
<!--//        $result = $conn->query($sql);-->
<!--//-->
<!--//    ?>-->

</div>
