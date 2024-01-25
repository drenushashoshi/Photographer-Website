<?php

include 'databaseConnection.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function isAdmin()
{
    return isset($_SESSION["admin"]) && $_SESSION["admin"] === true;
}

$hide = "hide"; 
    
if (isset($_SESSION['roli']) && $_SESSION['roli'] == "admin") {
    $hide = ""; 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["add"]) && isAdmin()) {
        $description = $_POST["description"];
        $imagePath = $_POST["image_path"];

        $conn = (new DatabaseConnection())->startConnection();
        $stmt = $conn->prepare("INSERT INTO portofolio_couples (description, image_path) VALUES (?, ?)");
        $stmt->execute([$description, $imagePath]);
    }

    if (isset($_POST["delete"]) && isAdmin()) {
        $itemId = $_POST["item_id"];

        $conn = (new DatabaseConnection())->startConnection();
        $stmt = $conn->prepare("DELETE FROM portofolio_couples WHERE id = ?");
        $stmt->execute([$itemId]);
    }

    
    if (isset($_POST["update"]) && isAdmin()) {
        $itemId = $_POST["item_id"];
        $description = $_POST["description"];
        $imagePath = $_POST["image_path"];
    
        $lastEditedBy = $_SESSION['id']; 
       
        $conn = (new DatabaseConnection())->startConnection();
    
        $stmt = $conn->prepare("UPDATE portofolio_couples SET description = ?, image_path = ?, last_edited_by = ? WHERE id = ?");
        $stmt->execute([$description, $imagePath, $lastEditedBy, $itemId]);
    }
    
}


$conn = (new DatabaseConnection())->startConnection();
$sql = "SELECT * FROM portofolio_couples";
$result = $conn->query($sql);

$portofolioData = [];

if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $portofolioData[] = $row;
    }
}

$conn = null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio-Couples</title>
    <link rel="stylesheet" href="Portofolio-Couples.css">
</head>
<body>
    <header>
        <?php include('Header.php');?>
    </header>
    <main>
        <div class="bgphoto">
            <h1>RELIVE THE STORY OF THE DAY</h1>
            <h3>see a glimpse into the story of couples wedding days, engagement season and more below  </h3>
        </div>

        <div class="categories">
            <ul class="list">
                <li id="categ">Categories</li>
                <li><a href="Portofolio.php">All</a> </li>
                <li><a href="Portofolio_Wedding.php">Weddings</a> </li>
                <li><a href="Portofolio-Couples.php">Couples</a></li>
                <li><a href="Portofolio-Nature.php">Nature</a> </li>
            </ul>
        </div>

        <div class="portofoliopics">
            <?php foreach ($portofolioData as $portofolioItem): ?>
                <div class="portfolio-item">
                    <img src="<?php echo $portofolioItem['image_path']; ?>" alt="Photo">
                    <p><?php echo $portofolioItem['description']; ?></p>

                    <?php if (isAdmin()): ?>
                        <form method="post" action="">
                            <input type="hidden" name="delete" value="1">
                            <input type="hidden" name="item_id" value="<?php echo $portofolioItem['id']; ?>">
                            <button type="submit">Delete</button>
                        </form>

                        <form method="post" action="">
                            <input type="hidden" name="update" value="1">
                            <input type="hidden" name="item_id" value="<?php echo $portofolioItem['id']; ?>">
                            <label for="editDescription">Description:</label>
                            <input type="text" name="description" value="<?php echo $portofolioItem['description']; ?>" required>
                            <label for="editImagePath">Image Path:</label>
                            <input type="text" name="image_path" value="<?php echo $portofolioItem['image_path']; ?>" required>
                            <button type="submit" name="update">Update Item</button>
                        </form>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
            <?php if (isAdmin()): ?>
                <form method="post" action="">
                    <label for="description">Description:</label>
                    <input type="text" name="description" required>
                    <label for="image_path">Image Path:</label>
                    <input type="text" name="image_path" required>
                    <button type="submit" name="add">Add New Item</button>
                </form>
            <?php endif; ?>
        </div>
    </main>
    <footer>
        <br>
        <div class="logot">
            <img src="instagram1.png" alt="">
            <img src="Facebook1.png" alt="">
            <img src="Pinterest1.png" alt="">
        </div>
        <div class="footermain">
            <div class="adresa">
                <p>CONTACT</p>
                <p>865-323-7622</p>
                <p>eladoe@gmail.com</p>
                <hr>
                <p>Colorado, Arizona and Beyond</p>
            </div>
            <div class="footerfoto">
                <img src="footer.png" alt="">
            </div>   
        </div><br><br>
    </footer>
    <script>
        function openEditModal(itemId) {
            var item = <?php echo json_encode($portofolioData); ?>;
            var selectedItem = item.find(i => i.id === itemId);

            document.getElementById("editItemId").value = selectedItem.id;
            document.getElementById("editDescription").value = selectedItem.description;
            document.getElementById("editImagePath").value = selectedItem.image_path;
            document.getElementById("editModal").style.display = "block";
        }

        function closeEditModal() {
            document.getElementById("editModal").style.display = "none";
        }
    </script>
</body>
</html>