<?php
    require_once '../../config/config.php';
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin | Servicecenteruser</title>
        <?php require_once('../../includes/link.php')  ?>
        <style>
        .pass_show {
        position: relative;
        }

        .pass_show .input-append {
        position: absolute;
        top: 40%;
        right: 10%;
        transform: translateY(-50%);
        padding: 0;
        }

        .pass_show .invalid-feedback {
        position: absolute;
        top: 100%;
        left: 0;
        transform: translateY(5px);
        transition: opacity 0.3s, transform 0.3s;
        }

        .pass_show .invalid-feedback.show {
        opacity: 1;
        transform: translateY(0);
        }
    </style>
        
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <?php require_once('../../includes/preloder.php') ?>
            <?php require_once('../../includes/navbar.php') ?>
            <?php require_once('../../includes/asidde-st.php') ?>
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1><strong>Servicecenteruser Management <i class="fas fa-user-ninja"></i></strong></h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>pages/dashboard/admin.php">Home</a></li>
                                    <li class="breadcrumb-item active"><a href="<?php echo BASE_URL; ?>pages/servicecenteruser/show.php">Servicecenteruser</a></li>
                                    <li class="breadcrumb-item active">Show</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>
                <div class="container-fluid">
                    <div class="card card-warning card-outline">
                        <div class="card-header d-flex justify-content-between">
                            <div class="ml-auto">
                                <!-- Button to open the modal -->
                                <button type="button" class="btn btn-block bg-gradient-success" data-toggle="modal" data-target="#registerServicecenteruserModal">
                                <i class="fas fa-user-plus"></i> Register
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="servicecenteruserTable" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Primary Mobile No</th>
                                        <th>Secondary Mobile No</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Last Login</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Table rows will be inserted here via AJAX -->
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <!-- Register Modal -->
                    <div class="modal fade" id="registerServicecenteruserModal" tabindex="-1" role="dialog" aria-labelledby="registerServicecenteruserModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
                            <form id="registerServicecenteruserForm" novalidate>
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title" id="registerServicecenteruserModalLabel"><b>Register Servicecenteruser</b></h2>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card card-success card-outline mt-2">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="registerServicecenteruserUsername" class="form-label">Username <span class="text-danger"> * </span></label>
                                                        <input type="text" class="form-control shadow-none" autocomplete="off" name="username" id="registerServicecenteruserUsername" required>
                                                        <div class="invalid-feedback">Please enter a username.</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="registerServicecenteruserPassword" class="form-label">Password <span class="text-danger"> * </span></label>
                                                        <input type="password" class="form-control shadow-none" name="password" id="registerServicecenteruserPassword" required>
                                                        <div class="invalid-feedback">Please enter a Password.</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="registerServicecenteruserPrimaryMobile" class="form-label">Primary Mobile No <span class="text-danger"> * </span></label>
                                                        <input type="tel" class="form-control shadow-none mobile-input" name="primaryMobile" id="registerServicecenteruserPrimaryMobile" autocomplete="off" pattern="[0-9]{10}" maxlength="10" inputmode="numeric" required>
                                                        <div class="invalid-feedback">Please enter a valid 10-digit mobile number.</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="registerServicecenteruserSecondaryMobile" class="form-label">Secondary Mobile No <span class="text-danger"> * </span></label>
                                                        <input type="tel" class="form-control shadow-none mobile-input" name="secondaryMobile" id="registerServicecenteruserSecondaryMobile" autocomplete="off" pattern="[0-9]{10}" maxlength="10" inputmode="numeric" required>
                                                        <div class="invalid-feedback">Please enter a valid 10-digit mobile number.</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="registerServicecenteruserFirstName" class="form-label">First Name <span class="text-danger"> * </span></label>
                                                        <input type="text" class="form-control shadow-none" name="firstName" id="registerServicecenteruserFirstName" required>
                                                        <div class="invalid-feedback">Please enter a first name.</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="registerServicecenteruserLastName" class="form-label">Last Name <span class="text-danger"> * </span></label>
                                                        <input type="text" class="form-control shadow-none" name="lastName" id="registerServicecenteruserLastName" required>
                                                        <div class="invalid-feedback">Please enter a last name.</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="registerServicecenteruserAddress" class="form-label">Address <span class="text-danger"> * </span></label>
                                                        <input type="text" class="form-control shadow-none" name="address" id="registerServicecenteruserAddress" required>
                                                        <div class="invalid-feedback">Please enter an address.</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="registerServicecenteruserCity" class="form-label">City <span class="text-danger"> * </span></label>
                                                        <input type="text" class="form-control shadow-none" name="city" id="registerServicecenteruserCity" required>
                                                        <div class="invalid-feedback">Please enter a city.</div>
                                                    </div>
                                                </div>
                                            </div><!-- /.card-body -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-secondary shadow-none mr-2" id="resetButton">Reset</button>
                                        <button type="submit" class="btn btn-primary shadow-none">Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Update Modal -->
                    <div class="modal fade" id="updateServicecenteruserModal" tabindex="-1" role="dialog" aria-labelledby="updateServicecenteruserModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
                            <form id="updateServicecenteruserForm" novalidate>
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title" id="updateServicecenteruserModalLabel"><b>Update Servicecenteruser</b></h2>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <h3 id="servicecenteruserUserName"> </h3>
                                        <div class="card card-primary card-outline mt-2">
                                            <div class="card-body">
                                                <div class="row">
                                                    <input type="hidden" id="servicecenteruserId" name="servicecenteruserId">
                                                    <div class="col-md-6">
                                                        <label for="servicecenteruserPrimaryMobile" class="form-label">Primary Mobile No <span class="text-danger"> * </span></label>
                                                        <input type="tel" class="form-control shadow-none mobile-input" name="primaryMobile" id="servicecenteruserPrimaryMobile" pattern="[0-9]{10}" maxlength="10" inputmode="numeric" required>
                                                        <div class="invalid-feedback">Please enter a valid 10-digit mobile number.</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="servicecenteruserSecondaryMobile" class="form-label">Secondary Mobile No <span class="text-danger"> * </span></label>
                                                        <input type="tel" class="form-control shadow-none mobile-input" name="secondaryMobile" id="servicecenteruserSecondaryMobile" pattern="[0-9]{10}" maxlength="10" inputmode="numeric" required>
                                                        <div class="invalid-feedback">Please enter a valid 10-digit mobile number.</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="servicecenteruserFirstName" class="form-label">First Name <span class="text-danger"> * </span></label>
                                                        <input type="text" class="form-control shadow-none" name="firstName" id="servicecenteruserFirstName" required>
                                                        <div class="invalid-feedback">Please enter a first name.</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="servicecenteruserLastName" class="form-label">Last Name <span class="text-danger"> * </span></label>
                                                        <input type="text" class="form-control shadow-none" name="lastName" id="servicecenteruserLastName" required>
                                                        <div class="invalid-feedback">Please enter a last name.</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="servicecenteruserAddress" class="form-label">Address <span class="text-danger"> * </span></label>
                                                        <input type="text" class="form-control shadow-none" name="address" id="servicecenteruserAddress" required>
                                                        <div class="invalid-feedback">Please enter an address.</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="servicecenteruserCity" class="form-label">City <span class="text-danger"> * </span></label>
                                                        <input type="text" class="form-control shadow-none" name="city" id="servicecenteruserCity" required>
                                                        <div class="invalid-feedback">Please enter a city.</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="servicecenteruserStatus" class="form-label">Servicecenteruser Status</label>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="servicecenteruserStatus" name="isActive" value="Y">
                                                            <label class="custom-control-label" for="servicecenteruserStatus" id="statusLabel">Inactive</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="servicecenteruser_password" class="form-label">Password</label>
                                                        <!-- <input type="tel" class="form-control shadow-none" name="servicecenteruser_password" id="servicecenteruser_password" required> -->
                                                        <div class="form-group pass_show" style="position: relative;"> 
                                                            <input type="password" class="form-control shadow-none" name="servicecenteruser_password" id="servicecenteruser_password" required> 
                                                            <div class="input-append">
                                                                <span class="ptxt" style="position: absolute; top: 50%; right: 10px; z-index: 1; color: #f36c01; margin-top: -10px; cursor: pointer; transition: .3s ease all;"><i class="fas fa-eye"></i></span>
                                                            </div>
                                                            <div class="invalid-feedback">Please enter a valid Password.</div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div><!-- /.card-body -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary shadow-none">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <?php require_once('../../includes/footer.php') ?>
            <?php require_once('../../includes/asidde-end.php') ?>

        </div>

        <?php require_once('../../includes/script.php')  ?>
        <script>

            // Get all elements with the class 'mobile-input'
            var mobileInputs = document.querySelectorAll('.mobile-input');

            // Loop through each input field and apply the event listener
            mobileInputs.forEach(function(inputField) {
                inputField.addEventListener('input', function (e) {
                    this.value = this.value.replace(/[^0-9]/g, ''); // Removes non-numeric characters
                });
            });

            $(document).on('click', '.pass_show .ptxt', function() {
            $(this).find('i').toggleClass('fa-eye fa-eye-slash');
            $(this).closest('.form-group').find('input').attr('type', function(index, attr) {
                return attr == 'password' ? 'text' : 'password';
            });
            });

            // Optional: Validate password length
            $('#servicecenteruser_password').on('input', function() {
            var password = $(this).val();
            if (password.length < 8) {
                $(this).siblings('.invalid-feedback').addClass('show');
            } else {
                $(this).siblings('.invalid-feedback').removeClass('show');
            }
            });
        </script>
        <script>
            $(document).ready(function() {

                // Initialize the servicecenteruser DataTable
                var table = $('#servicecenteruserTable').DataTable({
                    "processing": true, // Show a processing indicator
                    "serverSide": true, // Server-side processing for pagination, sorting, and searching
                    "ajax": {
                        "url": "../../controllers/servicecenteruser/ajax/fetchServicecenteruser.php", // URL of the PHP file handling the AJAX request
                        "type": "POST", // Type of HTTP request
                        "data": {
                            "action": "getAllData" // Action to be performed (fetch data)
                        },
                        "dataSrc": function(json) {
                            if (json.error) {
                                alert(json.error); // Alert the user if there's an error
                                return []; // Return an empty array if there's an error
                            } else {
                                return json.data; // Otherwise, return the data
                            }
                        }
                    },
                    "columns": [
                        // { "data": "id" },  // Servicecenteruser ID
                        {
                            "data": "username", // Username
                            "render": function(data, type, row) {
                                var statusDot = '<span class="badge badge-pill badge-' + (row.isactive == 'Y' ? 'success' : 'danger') + ' ml-1 p-1"> </span>';
                                return data + statusDot; // Show username with a status dot
                            }
                        },
                        {
                            "data": "firstname"
                        }, // First name
                        {
                            "data": "lastname"
                        }, // Last name
                        {
                            "data": "primarymobileno"
                        }, // Primary mobile number
                        {
                            "data": "secondmobileno"
                        }, // Secondary mobile number
                        {
                            "data": "address", // Address
                            "orderable": false // Disable sorting for the address column
                        },
                        {
                            "data": "city"
                        },
                        {
                            "data": "lastlogindate"
                        },
                        {
                            "data": null, // Action buttons (Edit)
                            "orderable": false, // Disable sorting for this column
                            "render": function(data, type, row) {
                                return `  <button
                                            class="btn btn-outline-warning btn-edit"
                                            data-id="${row.id}"
                                            title="Edit"
                                        >
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>`;
                            }
                        }
                    ],
                    "responsive": true, // Make the table responsive
                    "pageLength": 10, // Default number of rows per page
                    "lengthChange": true, // Allow the user to change the number of rows displayed
                    "lengthMenu": [5, 10, 25, 50, 100], // Options for the rows-per-page dropdown
                    "autoWidth": false, // Disable automatic column width calculation
                    "order": [
                        [0, 'asc']
                    ], // Default sorting: ascending by ID
                    "language": {
                        "paginate": {
                            "previous": "<i class='fas fa-angle-left'></i>", // Customize the "previous" pagination button
                            "next": "<i class='fas fa-angle-right'></i>" // Customize the "next" pagination button
                        }
                    },
                    // "dom": 'lBfrtip',  // Include the length menu and buttons
                });

                // Registration Form Submission
                $("#registerServicecenteruserForm").on("submit", function(event) {
                    event.preventDefault();
                    var form = $(this);

                    // Check username uniqueness
                    checkUsername(function(isUnique) {
                        if (isUnique) {
                            submitForm(form, '../../controllers/Servicecenteruser/process_servicecenteruser.php', function() {
                                table.ajax.reload();
                                resetForm(form);
                                $('#registerServicecenteruserModal').modal('hide');
                            });
                        } else {
                            event.stopPropagation();
                        }
                    });
                });

                // Update Form Submission
                $('#updateServicecenteruserForm').on('submit', function(e) {
                    e.preventDefault();
                    var form = $(this);

                    submitForm(form, '../../controllers/Servicecenteruser/processUpdate_servicecenteruser.php', function() {
                        $('#updateServicecenteruserModal').modal('hide');
                        table.ajax.reload();
                        resetForm(form);
                    });
                });

                // Edit Servicecenteruser
                $('#servicecenteruserTable').on('click', '.btn-edit', function() {
                    var servicecenteruserId = $(this).data('id');

                    $.ajax({
                        url: '../../controllers/servicecenteruser/ajax/fetchServicecenteruser.php',
                        method: 'POST',
                        data: {
                            action: 'getById',
                            id: servicecenteruserId
                        },
                        dataType: 'json',
                        success: function(response) {
                            // Populate the form fields with fetched data
                            $('#servicecenteruserId').val(response.id);
                            $('#servicecenteruserUserName').text(response.username);
                            $('#servicecenteruserPrimaryMobile').val(response.primarymobileno);
                            $('#servicecenteruserSecondaryMobile').val(response.secondmobileno);
                            $('#servicecenteruserFirstName').val(response.firstname);
                            $('#servicecenteruserLastName').val(response.lastname);
                            $('#servicecenteruserAddress').val(response.address);
                            $('#servicecenteruserCity').val(response.city);
                            $('#servicecenteruser_password').attr('type', 'password');
                            $('#servicecenteruser_password').val(response.password);

                            // Update status switch and label
                            if (response.isactive === 'Y') {
                                $('#servicecenteruserStatus').prop('checked', true);
                                $('#statusLabel').text('Active');
                            } else {
                                $('#servicecenteruserStatus').prop('checked', false);
                                $('#statusLabel').text('Inactive');
                            }

                            // Show the modal
                            $('#updateServicecenteruserModal').modal('show');
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });

                // Status Label Update on Switch Toggle
                $('#servicecenteruserStatus').change(function() {
                    if ($(this).is(':checked')) {
                        $('#statusLabel').text('Active');
                        $(this).val('Y');
                    } else {
                        $('#statusLabel').text('Inactive');
                        $(this).val('N');
                    }
                });

                // Handle Modal Hidden Event to Reset Form
                $('#updateServicecenteruserModal').on('hidden.bs.modal', function() {
                    resetForm($('#updateServicecenteruserForm'));
                });

                // Handle Username Input to Check Uniqueness
                $("#registerServicecenteruserUsername").on("input", function() {
                    checkUsername(function() {});
                });

                // Handle Reset Button Click (Optional)
                $("#resetButton").on("click", function() {
                    resetForm($('#registerServicecenteruserForm'));
                });

                // Check Username Uniqueness
                function checkUsername(callback) {
                    var registerServicecenteruserUsername = $("#registerServicecenteruserUsername").val();

                    if (registerServicecenteruserUsername.length > 0) {
                        $.ajax({
                            url: '../../controllers/Servicecenteruser/process_servicecenteruser.php',
                            type: 'POST',
                            data: {
                                registerServicecenteruserUsername: registerServicecenteruserUsername,
                                username_check: true
                            },
                            success: function(response) {
                                if (response.exists) {
                                    $("#registerServicecenteruserUsername").addClass("is-invalid");
                                    $("#registerServicecenteruserUsername").siblings(".invalid-feedback").text("This username is already taken.");
                                    callback(false);
                                } else {
                                    $("#registerServicecenteruserUsername").removeClass("is-invalid");
                                    $("#registerServicecenteruserUsername").siblings(".invalid-feedback").text("");
                                    callback(true);
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log('Full Response:', xhr.responseText);
                                alert('Error: ' + xhr.responseText);
                                callback(false);
                            }
                        });
                    } else {
                        $("#registerServicecenteruserUsername").removeClass("is-invalid");
                        $("#registerServicecenteruserUsername").siblings(".invalid-feedback").text("");
                        callback(true);
                    }
                }

                // Function to handle form reset and clear validation
                function resetForm(form) {
                    form[0].reset();
                    form.removeClass('was-validated');
                    form.find('.is-invalid').removeClass('is-invalid');
                    form.find('.invalid-feedback').text('');
                }

                // Function to handle AJAX form submission with validation
                function submitForm(form, url, successCallback) {
                    form.addClass('was-validated');

                    if (form[0].checkValidity() === true) {
                        $.ajax({
                            url: url,
                            method: 'POST',
                            data: form.serialize(),
                            dataType: 'json',
                            success: function(response) {
                                if (response.status.trim() === 'success') {
                                    $(document).Toasts('create', {
                                        class: response.class,
                                        title: response.title,
                                        subtitle: response.subtitle,
                                        body: response.body,
                                        delay: 5000,
                                        autohide: true
                                    });
                                    successCallback();
                                } else {
                                    alert(response.message); // Handle response message
                                }

                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                            }
                        });
                    }
                }
            });
        </script>

    </body>

    </html>