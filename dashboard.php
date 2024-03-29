<?php
include_once "databaseConnection.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
function isSessionTimedOut()
{
    $timeout = 3600;
    $currentTime = time();

    if (isset($_SESSION['loginTime']) && ($currentTime - $_SESSION['loginTime']) > $timeout) {
        error_log("Session timed out. Elapsed time: " . ($currentTime - $_SESSION['loginTime']) . " seconds");
        session_unset();
        session_destroy();
        return true;
    }
    $_SESSION['loginTime'] = $currentTime;

    return false;
}


if (isSessionTimedOut()) {
    header("Location: CourseLogin.php");
    exit();
}

$hide = "hide";
if ($_SESSION['roli'] == "admin") {
    $hide = "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <title>Document</title>
</head>

<body>
    <header>
        <?php
        include("Header.php");
        ?>
    </header>

    <h3 style="margin-top:100px">REGISTRATIONS:</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>SURNAME</th>
            <th>AGE</th>
            <th>EMAIL</th>
            <th>PASSWORD</th>
            <th>ROLE</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>

        <?php
        include_once "userRepository.php";

        $userRepository = new UserRepository();

        $users = $userRepository->getAllUsers();

        foreach ($users as $User) {
            echo
                "
                <tr>
                     <td>$User[id]</td>
                     <td>$User[name]</td>
                     <td>$User[surname] </td>
                     <td>$User[age] </td>
                     <td>$User[email] </td>
                     <td>$User[password] </td>
                     <td>$User[roli]</td>
                     <td><a href='edit.php?id=$User[id]'>Edit</a> </td>
                     <td><a href='delete.php?id=$User[id]'>Delete</a></td>
                     
                </tr>
                ";
        }



        ?>
    </table>

    <h3 style="margin-top: 100px">PORTFOLIO ITEMS:</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>IMAGE PATH</th>
            <th>DESCRIPTION</th>
            <th>Last Edited By</th>
            <th>Added By</th>
        </tr>

        <?php
        include_once "PortofolioRepository.php";
        include_once "userRepository.php";


        $portofolioRepository = new PortofolioRepository();
        $portofolioData = $portofolioRepository->getAllPortofolios();
        $userRepository = new UserRepository();

        foreach ($portofolioData as $portofolioItem):
            $lastEditedById = $portofolioItem['last_edited_by'];
            $addedById = $portofolioItem['added_by'];

            $lastEditedByUser = $userRepository->getUserById($lastEditedById);
            $addedByUser = $userRepository->getUserById($addedById);

            echo "
        <tr>
            <td>{$portofolioItem['id']}</td>
            <td>{$portofolioItem['image_path']}</td>
            <td>{$portofolioItem['description']}</td>
            <td>";

            if ($lastEditedByUser) {
                echo "{$lastEditedByUser['id']}";
            } else {
                echo "No one edited";
            }

            echo "</td>
            <td>";

            if ($addedByUser) {
                echo "{$addedByUser['id']}";
            } else {
                echo "Added through database";
            }
            echo "</td>
        </tr>";
        endforeach;

        ?>


    </table>

    <h3 style="margin-top: 100px">PORTFOLIO-COUPLES ITEMS:</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>IMAGE PATH</th>
            <th>DESCRIPTION</th>
            <th>Last Edited By</th>
            <th>Added By</th>
        </tr>

        <?php
        include_once "PortofolioRepository.php";
        include_once "userRepository.php";


        $portofolioRepository = new PortofolioRepository();
        $portofolioData = $portofolioRepository->getAllCouples();
        $userRepository = new UserRepository();

        foreach ($portofolioData as $portofolioItem):
            $lastEditedById = $portofolioItem['last_edited_by'];
            $addedById = $portofolioItem['added_by'];

            $lastEditedByUser = $userRepository->getUserById($lastEditedById);
            $addedByUser = $userRepository->getUserById($addedById);

            echo "
        <tr>
            <td>{$portofolioItem['id']}</td>
            <td>{$portofolioItem['image_path']}</td>
            <td>{$portofolioItem['description']}</td>
            <td>";

            if ($lastEditedByUser) {
                echo "{$lastEditedByUser['id']}";
            } else {
                echo "No one edited";
            }

            echo "</td>
            <td>";

            if ($addedByUser) {
                echo "{$addedByUser['id']}";
            } else {
                echo "Added through database";
            }
            echo "</td>
        </tr>";
        endforeach;

        ?>


    </table>

    <h3 style="margin-top: 100px">PORTFOLIO-NATURE ITEMS:</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>IMAGE PATH</th>
            <th>DESCRIPTION</th>
            <th>Last Edited By</th>
            <th>Added By</th>
        </tr>

        <?php
        include_once "PortofolioRepository.php";
        include_once "userRepository.php";


        $portofolioRepository = new PortofolioRepository();
        $portofolioData = $portofolioRepository->getAllNature();
        $userRepository = new UserRepository();

        foreach ($portofolioData as $portofolioItem):
            $lastEditedById = $portofolioItem['last_edited_by'];
            $addedById = $portofolioItem['added_by'];

            $lastEditedByUser = $userRepository->getUserById($lastEditedById);
            $addedByUser = $userRepository->getUserById($addedById);

            echo "
        <tr>
            <td>{$portofolioItem['id']}</td>
            <td>{$portofolioItem['image_path']}</td>
            <td>{$portofolioItem['description']}</td>
            <td>";

            if ($lastEditedByUser) {
                echo "{$lastEditedByUser['id']}";
            } else {
                echo "No one edited";
            }

            echo "</td>
            <td>";

            if ($addedByUser) {
                echo "{$addedByUser['id']}";
            } else {
                echo "Added through database";
            }
            echo "</td>
        </tr>";
        endforeach;

        ?>


    </table>

    <h3 style="margin-top: 100px">PORTFOLIO-WEDDINGS ITEMS:</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>IMAGE PATH</th>
            <th>DESCRIPTION</th>
            <th>Last Edited By</th>
            <th>Added By</th>
        </tr>

        <?php
        include_once "PortofolioRepository.php";
        include_once "userRepository.php";


        $portofolioRepository = new PortofolioRepository();
        $portofolioData = $portofolioRepository->getAllWeddings();
        $userRepository = new UserRepository();

        foreach ($portofolioData as $portofolioItem):
            $lastEditedById = $portofolioItem['last_edited_by'];
            $addedById = $portofolioItem['added_by'];

            $lastEditedByUser = $userRepository->getUserById($lastEditedById);
            $addedByUser = $userRepository->getUserById($addedById);

            echo "
        <tr>
            <td>{$portofolioItem['id']}</td>
            <td>{$portofolioItem['image_path']}</td>
            <td>{$portofolioItem['description']}</td>
            <td>";

            if ($lastEditedByUser) {
                echo "{$lastEditedByUser['id']}";
            } else {
                echo "No one edited";
            }

            echo "</td>
            <td>";

            if ($addedByUser) {
                echo "{$addedByUser['id']}";
            } else {
                echo "Added through database";
            }
            echo "</td>
        </tr>";
        endforeach;

        ?>


    </table>

    <h3 style="margin-top: 100px">CONTACT FORM DATA:</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Fiancé's First Name</th>
            <th>Fiancé's Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Event Date</th>
            <th>Event Type</th>
            <th>Event Location</th>
            <th>Number of Guests</th>
            <th>Love Story</th>
            <th>Contact Method</th>
            <th>How Found</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php
        include_once "ContactFormRepository.php";

        $contactFormRepository = new ContactFormRepository();
        $contactFormData = $contactFormRepository->getAllContactFormData();

        foreach ($contactFormData as $contactForm) {
            echo "
        <tr>
            <td>{$contactForm['id']}</td>
            <td>{$contactForm['first_name']}</td>
            <td>{$contactForm['last_name']}</td>
            <td>{$contactForm['fiance_first_name']}</td>
            <td>{$contactForm['fiance_last_name']}</td>
            <td>{$contactForm['email']}</td>
            <td>{$contactForm['phone']}</td>
            <td>{$contactForm['event_date']}</td>
            <td>{$contactForm['event_type']}</td>
            <td>{$contactForm['event_location']}</td>
            <td>{$contactForm['guests']}</td>
            <td>{$contactForm['love_story']}</td>
            <td>{$contactForm['contact_method']}</td>
            <td>{$contactForm['how_found']}</td>
            <td><a href='edit_contact_form.php?id={$contactForm['id']}'>Edit</a> </td>
            <td><a href='delete_contact_form.php?id={$contactForm['id']}'>Delete</a></td>
        </tr>
    ";
        }
        ?>

    </table>

    <div class="dashboard">
        <h1>Newsletter Subscribers</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('databaseConnection.php');

                $dbConnection = new DatabaseConnection();
                $conn = $dbConnection->startConnection();

                if ($conn) {
                    $query = "SELECT * FROM newsLetter_subscribers";
                    $stmt = $conn->query($query);
                    $subscribers = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
                if ($conn) {
                    foreach ($subscribers as $subscriber) {
                        echo '<tr>';
                        echo '<td>' . $subscriber['id'] . '</td>';
                        echo '<td>' . $subscriber['name'] . '</td>';
                        echo '<td>' . $subscriber['email'] . '</td>';
                        echo '</tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>