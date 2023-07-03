
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

                                        <th class="align-middle">Client ID</th>
                                        <th class="align-middle">Client Name</th>
                                        <th class="align-middle">Email</th>
                                        <th class="align-middle">Contact Number</th>
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
                                                <strong>Ravindu</strong>
                                            </a>
                                        </td>
                                        <td class="py-2">Ravindu Damith</td>
                                        <td class="py-2">Ravindu.P@gmail.com</td>
                                        <td class="py-2">0764247208</td>
                                        <td class="py-2">
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
                                                <input type="checkbox" class="form-check-input" id="checkbox">
                                                <label class="form-check-label" for="checkbox"></label>
                                            </div>
                                        </td>
                                        <td class="py-2">
                                            <a href="#">
                                                <strong>Michael</strong>
                                            </a>
                                        </td>
                                        <td class="py-2">Michael Anderson</td>
                                        <td class="py-2">michael.anderson@example.com</td>
                                        <td class="py-2">7894561230</td>
                                        <td class="py-2">
                                            <div class="dropdown text-sans-serif">
                                                <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-3" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
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
                                                <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-3">
                                                    <div class="py-2">

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
                                                <input type="checkbox" class="form-check-input" id="checkbox">
                                                <label class="form-check-label" for="checkbox"></label>
                                            </div>
                                        </td>
                                        <td class="py-2">
                                            <a href="#">
                                                <strong>Samantha</strong>
                                            </a>
                                        </td>
                                        <td class="py-2">Samantha Williams</td>
                                        <td class="py-2">samantha.williams@example.com</td>
                                        <td class="py-2">0123456789</td>
                                        <td class="py-2">
                                            <div class="dropdown text-sans-serif">
                                                <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-4" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
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
                                                <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-4">
                                                    <div class="py-2">

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
                                                <input type="checkbox" class="form-check-input" id="checkbox">
                                                <label class="form-check-label" for="checkbox"></label>
                                            </div>
                                        </td>
                                        <td class="py-2">
                                            <a href="#">
                                                <strong>John</strong>
                                            </a>
                                        </td>
                                        <td class="py-2">John Davis</td>
                                        <td class="py-2">john.davis@example.com</td>
                                        <td class="py-2">9870123456</td>
                                        <td class="py-2">
                                            <div class="dropdown text-sans-serif">
                                                <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-5" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
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
                                                <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-5">
                                                    <div class="py-2">

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
                                                <input type="checkbox" class="form-check-input" id="checkbox">
                                                <label class="form-check-label" for="checkbox"></label>
                                            </div>
                                        </td>
                                        <td class="py-2">
                                            <a href="#">
                                                <strong>Emily</strong>
                                            </a>
                                        </td>
                                        <td class="py-2">Emily Johnson</td>
                                        <td class="py-2">emily.johnson@example.com</td>
                                        <td class="py-2">3216549870</td>
                                        <td class="py-2">
                                            <div class="dropdown text-sans-serif">
                                                <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-6" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
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
                                                <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-6">
                                                    <div class="py-2">

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
                                                <input type="checkbox" class="form-check-input" id="checkbox">
                                                <label class="form-check-label" for="checkbox"></label>
                                            </div>
                                        </td>
                                        <td class="py-2">
                                            <a href="#">
                                                <strong>Olivia</strong>
                                            </a>
                                        </td>
                                        <td class="py-2">Olivia Thompson</td>
                                        <td class="py-2">olivia.thompson@example.com</td>
                                        <td class="py-2">2468135790</td>
                                        <td class="py-2">
                                            <div class="dropdown text-sans-serif">
                                                <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-7" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
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
                                                <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-7">
                                                    <div class="py-2">

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



</div>
