<?php
include "db.php";

$message = "";
$message_type = "";

if (isset($_POST['submit_request'])) {

    $patient_name = trim($_POST['patient_name']);
    $blood_group  = $_POST['blood_group'];
    $units        = $_POST['units'];
    $hospital     = trim($_POST['hospital']);
    $mobile       = trim($_POST['mobile']);
    $city         = trim($_POST['city']);
    $reason       = trim($_POST['reason']);

    // Validation
    if ($patient_name == "" || $hospital == "" || $mobile == "" || $city == "") {

        $message = "Please fill all required fields.";
        $message_type = "error";

    } elseif (!preg_match("/^[A-Za-z ]+$/", $patient_name)) {

        $message = "Patient name should contain only letters and spaces.";
        $message_type = "error";

    } elseif (!preg_match("/^[0-9]{10}$/", $mobile)) {

        $message = "Mobile number must contain exactly 10 digits.";
        $message_type = "error";

    } elseif ($units < 1) {

        $message = "Units must be at least 1.";
        $message_type = "error";

    } else {

        // Secure insert
        $stmt = mysqli_prepare(
            $conn,
            "INSERT INTO blood_requests
            (patient_name, blood_group, units, hospital, mobile, city, reason, status)
            VALUES (?, ?, ?, ?, ?, ?, ?, 'Pending')"
        );

        mysqli_stmt_bind_param(
            $stmt,
            "ssissss",
            $patient_name,
            $blood_group,
            $units,
            $hospital,
            $mobile,
            $city,
            $reason
        );

        if (mysqli_stmt_execute($stmt)) {

            $message = "Blood request submitted successfully!";
            $message_type = "success";

            // Form clear
            $_POST = array();

        } else {

            $message = "Error: " . mysqli_error($conn);
            $message_type = "error";
        }

        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Request Blood</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
        }

        /* Navbar */

        nav {
            background: #e60000;
            min-height: 70px;

            display: flex;
            align-items: center;
            justify-content: center;

            gap: 10px;
            flex-wrap: wrap;

            padding: 10px;
        }

        nav a {
            color: white;
            text-decoration: none;

            font-size: 16px;
            font-weight: bold;

            padding: 12px 15px;
            border-radius: 5px;
        }

        nav a:hover {
            background: #b30000;
        }

        /* Main Container */

        .container {
            width: 90%;
            max-width: 700px;

            background: white;

            margin: 35px auto;

            padding: 30px;

            border-radius: 12px;

            box-shadow: 0 5px 20px rgba(0,0,0,0.12);
        }

        h1 {
            text-align: center;
            color: #c62828;
            margin-bottom: 25px;
        }

        /* Message */

        .success {
            background: #d4edda;
            color: #155724;

            padding: 15px;
            margin-bottom: 20px;

            border-radius: 6px;

            text-align: center;

            font-weight: bold;
        }

        .error {
            background: #f8d7da;
            color: #721c24;

            padding: 15px;
            margin-bottom: 20px;

            border-radius: 6px;

            text-align: center;

            font-weight: bold;
        }

        /* Form */

        label {
            display: block;

            margin-top: 15px;
            margin-bottom: 6px;

            font-weight: bold;

            color: #333;
        }

        input,
        select,
        textarea {

            width: 100%;

            padding: 12px;

            border: 1px solid #ccc;

            border-radius: 6px;

            font-size: 15px;

            outline: none;
        }

        input:focus,
        select:focus,
        textarea:focus {

            border-color: #e60000;

            box-shadow: 0 0 4px rgba(230,0,0,0.3);
        }

        textarea {
            height: 100px;

            resize: vertical;
        }

        button {

            width: 100%;

            background: #e60000;

            color: white;

            border: none;

            padding: 14px;

            margin-top: 25px;

            border-radius: 6px;

            font-size: 17px;

            font-weight: bold;

            cursor: pointer;
        }

        button:hover {
            background: #b30000;
        }

        .required {
            color: red;
        }

        /* Responsive */

        @media(max-width: 600px) {

            .container {
                width: 95%;
                padding: 20px;
            }

            nav a {
                font-size: 14px;
                padding: 8px;
            }

        }

    </style>

</head>

<body>

<!-- Navigation -->

<nav>

    <a href="index.php">Home</a>

    <a href="register.php">
        Donor Registration
    </a>

    <a href="search.php">
        Search Blood
    </a>

    <a href="donors.php">
        Donors
    </a>

    <a href="request_blood.php">
        Request Blood
    </a>

    <a href="requests.php">
        Requests
    </a>

    <a href="admin/login.php">
        Admin
    </a>

</nav>


<!-- Request Form -->

<div class="container">

    <h1>🩸 Request Blood</h1>


    <?php if ($message != "") { ?>

        <div class="<?php echo $message_type; ?>">

            <?php echo htmlspecialchars($message); ?>

        </div>

    <?php } ?>


    <form method="POST"
          action="">


        <!-- Patient Name -->

        <label>
            Patient Name <span class="required">*</span>
        </label>

        <input
            type="text"
            name="patient_name"
            placeholder="Enter patient name"
            value="<?php echo isset($_POST['patient_name']) ? htmlspecialchars($_POST['patient_name']) : ''; ?>"
            required
        >


        <!-- Blood Group -->

        <label>
            Blood Group <span class="required">*</span>
        </label>

        <select name="blood_group" required>

            <option value="">-- Select Blood Group --</option>

            <option value="A+">A+</option>
            <option value="A-">A-</option>

            <option value="B+">B+</option>
            <option value="B-">B-</option>

            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>

            <option value="O+">O+</option>
            <option value="O-">O-</option>

        </select>


        <!-- Units -->

        <label>
            Required Units <span class="required">*</span>
        </label>

        <input
            type="number"
            name="units"
            min="1"
            max="20"
            placeholder="Enter blood units"
            value="<?php echo isset($_POST['units']) ? htmlspecialchars($_POST['units']) : ''; ?>"
            required
        >


        <!-- Hospital -->

        <label>
            Hospital Name <span class="required">*</span>
        </label>

        <input
            type="text"
            name="hospital"
            placeholder="Enter hospital name"
            value="<?php echo isset($_POST['hospital']) ? htmlspecialchars($_POST['hospital']) : ''; ?>"
            required
        >


        <!-- Mobile -->

        <label>
            Mobile Number <span class="required">*</span>
        </label>

        <input
            type="text"
            name="mobile"
            maxlength="10"
            placeholder="Enter 10 digit mobile number"
            value="<?php echo isset($_POST['mobile']) ? htmlspecialchars($_POST['mobile']) : ''; ?>"
            required
        >


        <!-- City -->

        <label>
            City <span class="required">*</span>
        </label>

        <input
            type="text"
            name="city"
            placeholder="Enter city"
            value="<?php echo isset($_POST['city']) ? htmlspecialchars($_POST['city']) : ''; ?>"
            required
        >


        <!-- Reason -->

        <label>
            Reason
        </label>

        <textarea
            name="reason"
            placeholder="Enter reason for blood requirement"><?php echo isset($_POST['reason']) ? htmlspecialchars($_POST['reason']) : ''; ?></textarea>


        <!-- Submit -->

        <button type="submit"
                name="submit_request">

            🩸 SUBMIT BLOOD REQUEST

        </button>

    </form>

</div>

</body>

</html>