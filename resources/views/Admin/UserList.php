
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

                                            <th class="align-middle">Lawyer ID</th>
                                            <th class="align-middle">Lawyer Name</th>
                                            <th class="align-middle">Title</th>
                                            <th class="align-middle">Category</th>
                                            <th class="align-middle">Status</th>
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
                                                    <strong>U145</strong>
                                                </a>
                                            </td>
                                            <td class="py-2">John Smith</td>
                                            <td class="py-2">Corporate Lawyer</td>
                                            <td class="py-2">Business Law</td>
                                            <td class="py-2"><span class="badge badge-success">Active<span class="ms-1 fa fa-check"></span></span></td>
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
                                                            <a class="dropdown-item" href="javascript:void(0);">Inactive</a>

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
                                                    <strong>U146</strong>
                                                </a>
                                            </td>
                                            <td class="py-2">Sarah Johnson</td>
                                            <td class="py-2">Intellectual Property Lawyer</td>
                                            <td class="py-2">Trademark Law</td>
                                            <td class="py-2"><span class="badge badge-success">Active<span class="ms-1 fa fa-check"></span></span></td>
                                            <td class="py-2">
                                                <div class="dropdown text-sans-serif">
                                                    <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-1" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
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
                                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-1">
                                                        <div class="py-2">
                                                            <a class="dropdown-item" href="javascript:void(0);">Inactive</a>
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
                                                    <strong>U147</strong>
                                                </a>
                                            </td>
                                            <td class="py-2">Michael Brown</td>
                                            <td class="py-2">Immigration Lawyer</td>
                                            <td class="py-2">Visa and Immigration Law</td>
                                            <td class="py-2"><span class="badge badge-success">Active<span class="ms-1 fa fa-check"></span></span></td>
                                            <td class="py-2">
                                                <div class="dropdown text-sans-serif">
                                                    <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-2" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
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
                                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-2">
                                                        <div class="py-2">
                                                            <a class="dropdown-item" href="javascript:void(0);">Inactive</a>
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
                                                    <strong>U148</strong>
                                                </a>
                                            </td>
                                            <td class="py-2">Emily Davis</td>
                                            <td class="py-2">Family Lawyer</td>
                                            <td class="py-2">Divorce and Child Custody Law</td>
                                            <td class="py-2"><span class="badge badge-success">Active<span class="ms-1 fa fa-check"></span></span></td>
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
                                                            <a class="dropdown-item" href="javascript:void(0);">Inactive</a>
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
                                                    <strong>U149</strong>
                                                </a>
                                            </td>
                                            <td class="py-2">David Wilson</td>
                                            <td class="py-2">Real Estate Lawyer</td>
                                            <td class="py-2">Property Law</td>
                                            <td class="py-2"><span class="badge badge-success">Active<span class="ms-1 fa fa-check"></span></span></td>
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
                                                            <a class="dropdown-item" href="javascript:void(0);">Inactive</a>
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
                                                    <strong>U150</strong>
                                                </a>
                                            </td>
                                            <td class="py-2">Sophia Clark</td>
                                            <td class="py-2">Employment Lawyer</td>
                                            <td class="py-2">Labor Law</td>
                                            <td class="py-2"><span class="badge badge-success">Active<span class="ms-1 fa fa-check"></span></span></td>
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
                                                            <a class="dropdown-item" href="javascript:void(0);">Inactive</a>
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
                                                    <strong>U151</strong>
                                                </a>
                                            </td>
                                            <td class="py-2">Ava Harris</td>
                                            <td class="py-2">Intellectual Property Lawyer</td>
                                            <td class="py-2">Copyright Law</td>
                                            <td class="py-2"><span class="badge badge-success">Active<span class="ms-1 fa fa-check"></span></span></td>
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
                                                            <a class="dropdown-item" href="javascript:void(0);">Inactive</a>
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
                                                    <strong>U152</strong>
                                                </a>
                                            </td>
                                            <td class="py-2">Oliver Anderson</td>
                                            <td class="py-2">Immigration Lawyer</td>
                                            <td class="py-2">Visa and Citizenship Law</td>
                                            <td class="py-2"><span class="badge badge-success">Active<span class="ms-1 fa fa-check"></span></span></td>
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
                                                            <a class="dropdown-item" href="javascript:void(0);">Inactive</a>
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
                                                    <strong>U153</strong>
                                                </a>
                                            </td>
                                            <td class="py-2">Emma Walker</td>
                                            <td class="py-2">Family Lawyer</td>
                                            <td class="py-2">Divorce and Child Custody Law</td>
                                            <td class="py-2"><span class="badge badge-success">Active<span class="ms-1 fa fa-check"></span></span></td>
                                            <td class="py-2">
                                                <div class="dropdown text-sans-serif">
                                                    <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-8" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
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
                                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-8">
                                                        <div class="py-2">
                                                            <a class="dropdown-item" href="javascript:void(0);">Inactive</a>
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
                                                    <strong>U154</strong>
                                                </a>
                                            </td>
                                            <td class="py-2">Ethan Martinez</td>
                                            <td class="py-2">Personal Injury Lawyer</td>
                                            <td class="py-2">Accident and Injury Law</td>
                                            <td class="py-2"><span class="badge badge-success">Active<span class="ms-1 fa fa-check"></span></span></td>
                                            <td class="py-2">
                                                <div class="dropdown text-sans-serif">
                                                    <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-9" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
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
                                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-9">
                                                        <div class="py-2">
                                                            <a class="dropdown-item" href="javascript:void(0);">Inactive</a>
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
                                                    <strong>U155</strong>
                                                </a>
                                            </td>
                                            <td class="py-2">Olivia Adams</td>
                                            <td class="py-2">Immigration Lawyer</td>
                                            <td class="py-2">Visa and Citizenship Law</td>
                                            <td class="py-2"><span class="badge badge-success">Active<span class="ms-1 fa fa-check"></span></span></td>
                                            <td class="py-2">
                                                <div class="dropdown text-sans-serif">
                                                    <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-10" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
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
                                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-10">
                                                        <div class="py-2">
                                                            <a class="dropdown-item" href="javascript:void(0);">Inactive</a>
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
                                                    <strong>U156</strong>
                                                </a>
                                            </td>
                                            <td class="py-2">Alexander Wilson</td>
                                            <td class="py-2">Real Estate Lawyer</td>
                                            <td class="py-2">Property Law</td>
                                            <td class="py-2"><span class="badge badge-success">Active<span class="ms-1 fa fa-check"></span></span></td>
                                            <td class="py-2">
                                                <div class="dropdown text-sans-serif">
                                                    <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-11" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
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
                                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-11">
                                                        <div class="py-2">
                                                            <a class="dropdown-item" href="javascript:void(0);">Inactive</a>
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
                                                    <strong>U157</strong>
                                                </a>
                                            </td>
                                            <td class="py-2">Sophia Walker</td>
                                            <td class="py-2">Family Lawyer</td>
                                            <td class="py-2">Divorce and Child Custody</td>
                                            <td class="py-2"><span class="badge badge-success">Active<span class="ms-1 fa fa-check"></span></span></td>
                                            <td class="py-2">
                                                <div class="dropdown text-sans-serif">
                                                    <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-12" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
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
                                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-12">
                                                        <div class="py-2">
                                                            <a class="dropdown-item" href="javascript:void(0);">Inactive</a>
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
</div>
