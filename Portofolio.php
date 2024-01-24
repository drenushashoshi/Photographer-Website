<?php
session_start();

include 'databaseConnection.php';

// Function to check if the user is an admin
function isAdmin()
{
    return isset($_SESSION["admin"]) && $_SESSION["admin"] === true;
}

// Handle form submissions to add or delete portofolio items
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Add portofolio item
    if (isset($_POST["add"])) {
        $description = $_POST["decription"];
        $imagePath = $_POST["image_path"];

        // Perform database insert (you should validate and sanitize inputs)
        $conn = (new DatabaseConnection())->startConnection();
        $stmt = $conn->prepare("INSERT INTO portofolio (description, image_path) VALUES (?, ?)");
        $stmt->execute([$description, $imagePath]);
    }

    // Delete portofolio item
    if (isset($_POST["delete"])) {
        $itemId = $_POST["item_id"];

        // Perform database delete (you should validate and sanitize inputs)
        $conn = (new DatabaseConnection())->startConnection();
        $stmt = $conn->prepare("DELETE FROM portofolio WHERE id = ?");
        $stmt->execute([$itemId]);
    }
}

// Fetch portofolio items
$conn = (new DatabaseConnection())->startConnection();
$sql = "SELECT * FROM portofolio";
$result = $conn->query($sql);

$portofolioData = [];

if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $portofolioData[] = $row;
    }
}

$conn->null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElaDoe-Portofolio</title>
    <link rel="stylesheet" href="<?php echo isAdmin() ? 'AdminStyles.css' : 'Portofolio.css'; ?>">
    <!-- Use different CSS styles for admin and user -->
</head>

<body>
    <header>
        <img src="Logo.png" alt="Logo">
        <div class="pages">
            <ul>
                <li><a href="Home.html">Home</a></li>
                <li><a href="About.html">About</a> </li>
                <li><a href="Portofolio.html">Portofolio</a> </li>
                <li><a href="CourseLogin.html">Course Login</a></li>
                <li><a href="Booking.html">Booking</a> </li>
            </ul>
        </div>
    </header>
    <main>
        <div class="bgphoto">
            <h1>RELIVE THE STORY OF THE DAY</h1>
            <h3>see a glimpse into the story of couples wedding days, engagement season and more below  </h3>
        </div>

        <?php if (isAdmin()) : ?>
            <!-- Admin-specific HTML content -->
            <div class="admin-interface">
                <!-- Your admin-specific content, including the form to add/delete items -->
                <?php foreach ($portofolioData as $portofolioItem) : ?>
                    <div>
                        <img src="<?php echo $portofolioItem['image_path']; ?>" alt="Photo">
                        <p><?php echo $portofolioItem['description']; ?></p>
                        <!-- Add a delete button here -->
                        <form method="post" action="">
                            <input type="hidden" name="delete" value="1">
                            <input type="hidden" name="item_id" value="<?php echo $portofolioItem['id']; ?>">
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                <?php endforeach; ?>

                <!-- Add a form to add new items -->
                <form method="post" action="">
                    <label for="description">Description:</label>
                    <input type="text" name="description" required>
                    <label for="image_path">Image Path:</label>
                    <input type="text" name="image_path" required>
                    <button type="submit" name="add">Add New Item</button>
                </form>
            </div>
        <?php else : ?>
            <!-- User-specific HTML content -->
            <div class="categories">
                <ul class="list">
                    <li id="categ">Categories</li>
                    <li><a href="Portofolio.html">All</a> </li>
                    <li><a href="Portofolio_Wedding.html">Weddings</a> </li>
                    <li><a href="Portofolio-Couples.html">Couples</a></li>
                    <li><a href="Portofolio-Nature.html">Nature</a> </li>
                </ul>
            </div>

            <div class="portofoliopics">
                <?php foreach ($portofolioData as $portofolioItem) : ?>
                    <div>
                        <img src="<?php echo $portofolioItem['image_path']; ?>" alt="Photo">
                        <p><?php echo $portofolioItem['description']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>
    <footer>
        <br>
        <div class="logot">
            <a href=""><img src="instagram1.png" alt="" width="40px" height="40px"></a>
            <a href=""><img src="Facebook1.png" alt="" width="60px" height="40px"></a>
            <a href=""><img src="Pinterest1.png" alt="" width="40px" height="40px"></a>
        </div>
        <div class="footermain">
            <div class="adresa">
                <p>CONTACT</p><br>
                <p>865-323-7622</p><br>
                <p>eladoe@gmail.com</p><br>
                <hr><br>
                Colorado, Arizona and Beyond
                <p></p><br>
            </div>
            <div class="footerfoto">
                <img src="footer.png" alt="">
            </div>
        </div>
        <p>Privacy Policy</p><br>
    </footer>
</body>

</html>
