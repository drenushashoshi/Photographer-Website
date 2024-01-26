<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    footer{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    font-size: 15px;
    background-color:rgb(167, 140, 104); 
    }
    .footermain{
    display: flex;
    justify-content: space-between;
    width: 90%;
    }
    .adresa{
    display: flex;
    flex-direction: column;
    width: 300px;
    justify-content: center;
    font-size: 17px;
    justify-content: space-around;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
    @media (max-width: 768px) {
    .footermain {
        width: 100%;
    }

    .adresa {
        width: 100%;
    }
}

</style>
<body>
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