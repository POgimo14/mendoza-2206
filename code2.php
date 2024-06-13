<?php
session_start();
require 'connections1.php';

if(isset($_POST['save_employee']))
{
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $dob = $_POST['dob'];



    $query = "INSERT INTO services (name,gender,address,contact,dob) VALUES
        ('$name','$gender','$address','$contact','$dob')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Employee Added Succesfully!";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Employee Not Added!";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['checking_viewbtn'])) {
    $e_id = $_POST['employee_id'];

    $query = "SELECT * FROM services WHERE id='$e_id' ";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $employee)
        {
            echo $return = '
            <h4> ID: '.$employee['id'].'</h4>
            <h4> NAME: '.$employee['name'].'</h4>
            <h4> GENDER: '.$employee['gender'].'</h4>
            <h4> ADDRESS: '.$employee['address'].'</h4>
            <h4> CONTACT: '.$employee['contact'].'</h4>
            <h4> DATE OF BIRTH: '.$employee['dob'].'</h4>
            
            
            ';
        }
    }
    else
    {
    echo $return = "<h4> No Record Found </h4>";
    }    
}

if(isset($_POST['checking_update_btn'])) {
    $e_id = $_POST['employee_id'];
    $result_array = [];

    $query = "SELECT * FROM services WHERE id='$e_id' ";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $employee)
        {
            array_push($result_array, $employee);
            header('Content-type: application/json');
            echo json_encode($result_array);
        }
    }
    else
    {
    echo $return = "<h4> No Record Found </h4>";
    }    
}

if(isset($_POST['update_employee'])){

    $id = $_POST['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $dob = $_POST['dob'];

    $query = "UPDATE services SET name='$name',gender='$gender',address='$address',contact='$contact',dob='$dob' 
    WHERE id='$id' "; 
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Employee Information Updated!";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Employee Not Updated!";
        header("Location: index.php");
        exit(0);
    }

}

if(isset($_POST['delete_employee'])) {
    $id = $_POST['employee_id'];

    $query = "DELETE FROM services WHERE id='$id' ";
    $query_run = mysqli_query($con, $query); 

    if($query_run)
    {
        $_SESSION['message'] = "Employee Information Deleted!";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Employee Not Deleted!";
        header("Location: index.php");
        exit(0);
    }
}
?>