<?php include("dbcon.php"); ?>

<?php
//delete data
if(isset($_POST['delete_student'])){
    $student_id = mysqli_real_escape_string($connection, $_POST['student_id']);

    $query = "DELETE FROM student_tbl WHERE id = '$student_id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Student Deleted successfully!'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Student not Deleted!'
        ];
        echo json_encode($res);
        return false;
    }
}

// save updated data
if (isset($_POST['update_student'])) {
    $student_id = mysqli_real_escape_string($connection, $_POST['student_id']);
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $course = mysqli_real_escape_string($connection, $_POST['course']);

    if ($name == NULL || $email == NULL || $phone == NULL || $course == null) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory!'
        ];
        echo json_encode($res);
        return false;
    }
    $query = "UPDATE student_tbl SET name='$name', email='$email', phone='$phone', course='$course' WHERE id='$student_id'";
    $query_run = mysqli_query($connection, $query);


    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Student updated successfully!'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Student not updated!'
        ];
        echo json_encode($res);
        return false;
    }
}
 
//  update value from the database
if (isset($_GET['student_id'])) {

    $student_id = mysqli_real_escape_string($connection, $_GET['student_id']);

    $query = "SELECT * FROM student_tbl WHERE id = '$student_id'";
    $query_run = mysqli_query($connection, $query);

    if (mysqli_num_rows($query_run) == 1) {

        $student = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Student data fetch successfully by id',
            'data' => $student
        ];
        echo json_encode($res);
        return false;
    } else {

        $res = [
            'status' => 404,
            'message' => 'Student ID not found'
        ];
        echo json_encode($res);
        return false;
    }
}

// insert the student 
if (isset($_POST['save_student'])) {
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $course = mysqli_real_escape_string($connection, $_POST['course']);

    if ($name == NULL || $email == NULL || $phone == NULL || $course == null) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory!'
        ];
        echo json_encode($res);
        return false;
    }
    $query = "INSERT INTO student_tbl (name, email, phone, course) VALUES ('$name','$email','$phone','$course')";
    $query_run = mysqli_query($connection, $query);


    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Student created successfully!'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Student not created!'
        ];
        echo json_encode($res);
        return false;
    }
}
?>


