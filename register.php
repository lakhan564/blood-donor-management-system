<?php
// register.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Donor Registration</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f6f9;
            color: #333;
        }

        /* Header */
        header {
            background: linear-gradient(135deg, #b30000, #e00000);
            color: white;
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 3px 12px rgba(0,0,0,0.2);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-icon {
            font-size: 38px;
        }

        .logo h1 {
            font-size: 24px;
        }

        .logo p {
            font-size: 13px;
            margin-top: 4px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-weight: bold;
            font-size: 14px;
        }

        nav a:hover {
            color: #ffdede;
        }

        /* Page Heading */
        .page-title {
            text-align: center;
            padding: 35px 15px 15px;
        }

        .page-title h2 {
            color: #b30000;
            font-size: 34px;
        }

        .page-title p {
            color: #777;
            margin-top: 8px;
        }

        /* Form Area */
        .form-container {
            width: 90%;
            max-width: 850px;
            margin: 20px auto 50px;
        }

        .form-card {
            background: white;
            padding: 35px;
            border-radius: 15px;

            box-shadow: 0 8px 25px rgba(0,0,0,0.10);
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .blood-icon {
            width: 70px;
            height: 70px;

            background: #ffe5e5;
            border-radius: 50%;

            margin: auto;

            display: flex;
            justify-content: center;
            align-items: center;

            font-size: 35px;
        }

        .form-header h3 {
            color: #b30000;
            margin-top: 15px;
            font-size: 25px;
        }

        .form-header p {
            color: #777;
            margin-top: 5px;
        }

        /* Grid */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            font-weight: bold;
            margin-bottom: 7px;
            color: #444;
        }

        label span {
            color: red;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 13px;

            border: 1px solid #ccc;
            border-radius: 7px;

            font-size: 15px;
            outline: none;

            transition: 0.3s;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #d00000;
            box-shadow: 0 0 5px rgba(208,0,0,0.2);
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        /* Button */
        .button-area {
            text-align: center;
            margin-top: 25px;
        }

        .register-btn {
            border: none;

            background: linear-gradient(135deg, #b30000, #e00000);
            color: white;

            padding: 14px 45px;

            border-radius: 7px;

            font-size: 16px;
            font-weight: bold;

            cursor: pointer;

            transition: 0.3s;
        }

        .register-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(180,0,0,0.3);
        }

        /* Info */
        .info-box {
            margin-top: 25px;

            background: #fff5f5;
            border-left: 5px solid #d00000;

            padding: 15px;

            border-radius: 5px;

            color: #555;
        }

        /* Footer */
        footer {
            background: #222;
            color: white;

            text-align: center;

            padding: 25px;
        }

        footer p {
            color: #ccc;
            margin-top: 5px;
        }

        /* Mobile */
        @media(max-width: 700px) {

            header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            nav a {
                margin: 5px;
                display: inline-block;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .form-card {
                padding: 22px;
            }

            .page-title h2 {
                font-size: 28px;
            }
        }
    </style>
</head>

<body>

<!-- HEADER -->
<header>

    <div class="logo">

        <div class="logo-icon">🩸</div>

        <div>
            <h1>Blood Donor Management</h1>
            <p>Donate Blood • Save Lives</p>
        </div>

    </div>

    <nav>
        <a href="index.php">Home</a>
        <a href="register.php">Register</a>
        <a href="search.php">Search Blood</a>
        <a href="request.php">Request Blood</a>
    </nav>

</header>


<!-- PAGE TITLE -->
<section class="page-title">

    <h2>Donor Registration</h2>

    <p>
        Register yourself and become a life-saving blood donor
    </p>

</section>


<!-- FORM -->
<div class="form-container">

    <div class="form-card">

        <div class="form-header">

            <div class="blood-icon">
                🩸
            </div>

            <h3>Register as Blood Donor</h3>

            <p>
                Please enter your correct details
            </p>

        </div>


        <form action="register.php" method="POST">

            <div class="form-grid">


                <!-- Full Name -->
                <div class="form-group">

                    <label>
                        Full Name <span>*</span>
                    </label>

                    <input
                        type="text"
                        name="name"
                        placeholder="Enter your full name"
                        required
                    >

                </div>


                <!-- Age -->
                <div class="form-group">

                    <label>
                        Age <span>*</span>
                    </label>

                    <input
                        type="number"
                        name="age"
                        placeholder="Enter your age"
                        min="18"
                        max="65"
                        required
                    >

                </div>


                <!-- Gender -->
                <div class="form-group">

                    <label>
                        Gender <span>*</span>
                    </label>

                    <select name="gender" required>

                        <option value="">
                            Select Gender
                        </option>

                        <option value="Male">
                            Male
                        </option>

                        <option value="Female">
                            Female
                        </option>

                        <option value="Other">
                            Other
                        </option>

                    </select>

                </div>


                <!-- Blood Group -->
                <div class="form-group">

                    <label>
                        Blood Group <span>*</span>
                    </label>

                    <select name="blood_group" required>

                        <option value="">
                            Select Blood Group
                        </option>

                        <option value="A+">A+</option>
                        <option value="A-">A-</option>

                        <option value="B+">B+</option>
                        <option value="B-">B-</option>

                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>

                        <option value="O+">O+</option>
                        <option value="O-">O-</option>

                    </select>

                </div>


                <!-- Mobile -->
                <div class="form-group">

                    <label>
                        Mobile Number <span>*</span>
                    </label>

                    <input
                        type="tel"
                        name="mobile"
                        placeholder="Enter 10 digit mobile number"
                        pattern="[0-9]{10}"
                        maxlength="10"
                        required
                    >

                </div>


                <!-- Email -->
                <div class="form-group">

                    <label>
                        Email <span>*</span>
                    </label>

                    <input
                        type="email"
                        name="email"
                        placeholder="Enter email address"
                        required
                    >

                </div>


                <!-- Address -->
                <div class="form-group full">

                    <label>
                        Address <span>*</span>
                    </label>

                    <textarea
                        name="address"
                        placeholder="Enter your complete address"
                        required
                    ></textarea>

                </div>


                <!-- City -->
                <div class="form-group">

                    <label>
                        City <span>*</span>
                    </label>

                    <input
                        type="text"
                        name="city"
                        placeholder="Enter your city"
                        required
                    >

                </div>

            </div>


            <div class="info-box">

                🩸 <b>Note:</b>
                Please provide correct contact information
                so that you can be contacted when blood is needed.

            </div>


            <div class="button-area">

                <button
                    type="submit"
                    class="register-btn"
                >
                    🩸 Register Donor
                </button>

            </div>

        </form>

    </div>

</div>


<!-- FOOTER -->
<footer>

    <h3>🩸 Blood Donor Management System</h3>

    <p>
        Donate Blood • Save Lives
    </p>

    <p>
        © 2026 Blood Donor Management System
    </p>

</footer>

</body>
</html>