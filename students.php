<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--Alertify CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css" />
    <title>PHP Ajax CRUD</title>
</head>

<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>PHP Ajax CRUD without page reloading using Bootstrap Modal
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                data-bs-target="#studentAddModal">Add Student</button>
                        </h4>
                    </div>

                    <!-- View Data from database  -->
                    <div class="card-body">
                        <table id="infoTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Course</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require 'dbcon.php';

                                $query = "SELECT * FROM student_tbl";
                                $query_run = mysqli_query($connection, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $student) {
                                ?>
                                <tr>
                                    <td><?php echo $student['id'] ?></td>
                                    <td><?php echo $student['name'] ?></td>
                                    <td><?php echo $student['email'] ?></td>
                                    <td><?php echo $student['phone'] ?></td>
                                    <td><?php echo $student['course'] ?></td>
                                    <td>
                                        <button type="button" value="<?= $student['id']; ?>"
                                            class="viewStudentBtn btn btn-info">View</button>
                                        <button type="button" value="<?= $student['id']; ?>"
                                            class="editStudentBtn btn btn-success">Edit</button>
                                        <button type="button" value="<?= $student['id']; ?>"
                                            class="deleteStudentBtn btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <!--Add Student Modal -->
                    <div class="modal fade" id="studentAddModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="studentAddModal">Add Student</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form id="saveStudent">
                                    <div class="modal-body">
                                        <div id="errorMessage" class="alert alert-warning d-none"></div>
                                        <div class="mb-3">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Phone</label>
                                            <input type="phone" name="phone" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="course">Course</label>
                                            <input type="text" name="course" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save Student</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- edit student modal  -->
                    <div class="modal fade" id="studentEditModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="studentEditModal">Edit Student</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form id="updateStudent">
                                    <div class="modal-body">
                                        <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                                        <input type="hidden" name="student_id" id="student_id">
                                        <div class="mb-3">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" id="email" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Phone</label>
                                            <input type="phone" name="phone" id="phone" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="course">Course</label>
                                            <input type="text" name="course" id="course" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- view student modal  -->
                    <div class="modal fade" id="studentViewModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="studentViewModal">Edit Student</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form id="updateStudent">
                                    <div class="modal-body">
                                        <!-- <div id="errorMessageUpdate" class="alert alert-warning d-none"></div> -->

                                        <div class="mb-3">
                                            <label for="name">Name</label>
                                            <p type="text" name="name" id="view_name" class="form-control"></p>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email">Email</label>
                                            <p type="text" name="email" id="view_email" class="form-control"></p>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Phone</label>
                                            <p type="phone" name="phone" id="view_phone" class="form-control"></p>
                                        </div>
                                        <div class="mb-3">
                                            <label for="course">Course</label>
                                            <p type="text" name="course" id="view_course" class="form-control"></p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jquery cdn link  -->

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!--Alertify JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>


    <script>
    // script for insert form data
    // $(document).ready(function() {
    $(document).on('submit', '#saveStudent', function(e) {
        e.preventDefault();

        var formData = new FormData(this);
        formData.append("save_student", true);

        $.ajax({
            type: "POST",
            url: "code.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log('from ajx');

                var res = jQuery.parseJSON(response);
                if (res.status == 422) {
                    $('#errorMessage').removeClass('d-none');
                    $('#errorMessage').text(res.message);
                } else if (res.status == 200) {
                    $('#errorMessage').addClass('d-none');
                    $('#studentAddModal').modal('hide');
                    $('#saveStudent')[0].reset();

                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(res.message);

                    $('#infoTable').load(location.href + " #infoTable");
                }
            }
        });

    });

    // script for edit form data
    $(document).on('click', '.editStudentBtn', function() {
        var student_id = $(this).val();
        // alert(student_id);
        $.ajax({
            type: "GET",
            url: "code.php?student_id=" + student_id,
            success: function(response) {

                var res = jQuery.parseJSON(response);

                if (res.status == 404) {
                    alert(res.message);

                } else if (res.status == 200) {
                    $('#student_id').val(res.data.id);
                    $('#name').val(res.data.name);
                    $('#email').val(res.data.email);
                    $('#phone').val(res.data.phone);
                    $('#course').val(res.data.course);
                    $('#studentEditModal').modal('show');
                }

            }
        });
    });


    // script for update / save form data
    $(document).on('submit', '#updateStudent', function(e) {
        e.preventDefault();

        var formData = new FormData(this);
        formData.append("update_student", true);

        $.ajax({
            type: "POST",
            url: "code.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {

                var res = jQuery.parseJSON(response);
                if (res.status == 422) {
                    $('#errorMessageUpdate').removeClass('d-none');
                    $('#errorMessageUpdate').text(res.message);
                } else if (res.status == 200) {
                    $('#errorMessageUpdate').addClass('d-none');
                    $('#studentEditModal').modal('hide');
                    $('#updateStudent')[0].reset();

                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(res.message);

                    $('#infoTable').load(location.href + " #infoTable");
                }
            }
        });

    });

    // script for view form data
    $(document).on('click', '.viewStudentBtn', function() {
        var student_id = $(this).val();
        // alert(student_id);
        $.ajax({
            type: "GET",
            url: "code.php?student_id=" + student_id,
            success: function(response) {

                var res = jQuery.parseJSON(response);

                if (res.status == 404) {
                    alert(res.message);

                } else if (res.status == 200) {
                    $('#view_name').text(res.data.name);
                    $('#view_email').text(res.data.email);
                    $('#view_phone').text(res.data.phone);
                    $('#view_course').text(res.data.course);
                    $('#studentViewModal').modal('show');
                }

            }
        });
    });

    //script for delete data
    $(document).on('click', '.deleteStudentBtn', function(e) {
        e.preventDefault();

        if (confirm('Are you sure you want to delete this data?')) {
            var student_id = $(this).val();

            $.ajax({
                type: "POST",
                url: "code.php",
                data: {
                    'delete_student': true,
                    'student_id': student_id
                },
                success: function(response) {
                    var res = jQuery.parseJSON(response);

                    if (res.status == 500) {
                        alert(res.message);
                    } else {
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(res.message);
                        $('#infoTable').load(location.href + " #infoTable");
                    }
                }
            });
        }
    });

    // });
    </script>


    <!-- Optional JavaScript; choose one of the two! -->


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

</body>

</html>