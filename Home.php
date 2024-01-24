<?php
    include('HomeFunctions.php');
    include('HomeData.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElaDoePhoto</title>
    <link rel="stylesheet" href="Home.css">
    <style>
        .slider {
            overflow: hidden;
            width: 100%;
            height: 650px;
            position: relative;
            display: flex;
            background-size: cover;
            background-attachment: fixed;
            z-index: 1;
            transition: transform 1s ease-in-out; 
        }

        .slide {
            flex: 0 0 100%;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            order: 0;
        }
    </style>
</head>
<body>
    <header>
        <img src="Logo.png" alt="Logo">
        <div class="pages">
            <ul>
                <li><a href="Home.html">Home</a></li>
                <li><a href="About.html">About</a></li>
                <li><a href="Portofolio.html">Portofolio</a></li>
                <li><a href="CourseLogin.html">Course Login</a></li>
                <li> <a href="Booking.html">Booking</a></li>
            </ul>
        </div>
    </header>
    <main>
        <div class="slide-content">
            <h1>Ela Doe</h1>
            <p>Capturing moments</p>
        </div>
        <div class="slider">
            <div class="slide" style="background-image: url('Home_Pictures/HomeBackground2.jpg');"></div>
            <div class="slide" style="background-image: url('Home_Pictures/HomeBackground3.jpg');"></div>
            <div class="slide" style="background-image: url('Home_Pictures/HomeBackground4.jpg');"></div>   
        </div><br>
        <div class="spacer"></div>
        <div class="welcome" >
            <h1><b>MORE PRESENCE.</b></h1>
            <h1><b>LESS POSES.</b></h1>
            <h4>If you're looking for something a little off the beaten path, you're in the right place. 
                Let's create something beautiful, and uniquely yours.
            </h4>
        </div>
        <div class="spacer"></div>
        <div class="complete">
            <hr style="width: 70%; margin-left: 15%;"><br>
            <h3 style="white-space: pre-wrap;">SOME OF MY RECENT WORK:</h3><br><br>
            <div class="recentWork">
                <?php
                    foreach($RecentWork as $work){
                        printRecentWork($work[0], $work[1], $work[2]);
                    }
                ?>
            </div>
            <br><br>
            <a href="Portofolio.html">
                <button class="butoni1">CHECK MORE OF MY WORK</button>
            </a>
        </div>
        <div class="spacer"></div>
        <img src="Home_Pictures/mainPart.jpg" alt="" style="width: 100%;">
        <div class="spacer"></div>
        <hr style="width: 70%; margin-left: 15%;"><br>
        <h1 class="a"><b>MORE STORIES</b></h1><br>
        <hr style="width: 70%; margin-left: 15%;"><br>
        <div class="spacer"></div>

        <div class="complete1">
            <?php
            foreach($Stories as $story){
                printStory($story[0], $story[1], $story[2]);
            }
        ?>
        </div>

        <div class="spacer"></div>
        <img src="Home_Pictures/mainPart2.jpg" alt="" style="width: 100%;">
        <div class="spacer"></div>

       <div class="whyEla">
            <hr style="width: 70%; margin-left: 15%;"><br>
            <h1><b>WHY ELA?</b></h1><br><br>
            <h3><b>Experience</b></h3><br>
            <p>I have shot over 100 weddings and have photographed in a wide variety of venues, 
                lighting situations, and family dynamics. You can expect professionalism. 
                Offering guidance, reassurance and a calming presence throughout your wedding day. 
            </p><br>
            <h3><b>Direct Communication</b></h3><br>
            <p>Quick and clear communication throughout the booking and planning process. 
                And over communication on your wedding day to ensure you, your family and guests are informed.  
                You will be in direct contact with me throughout the entire process, 
                no jumping through hoops to get in touch or being deferred to an assistant.
            </p><br>
            <h3><b>Planning Assistance</b></h3><br>
            <p>
                A free wedding guide is given to all couples to help with the planning process. 
                I provide timeline assistance to all couples, even if you have a planner/coordinator. 
                I am never more than a phone call or text away.
            </p>
       </div>
       <div class="spacer"></div>
       <div class="AboutMe">
            <img src="Home_Pictures/AboutMe2jpg.jpg" alt="">
            <div class="abmt">
                <h2>WHAT AM I ALL ABOUT?</h2><br>
                <p>I’m here to tell your story. Not just take pretty pictures - although I will do that too. 
                    I want to tell the truth through photographs. 
                    To share the reality - that your wedding day is the one day all of your closest friends 
                    and family are in one place at the same time. All there to celebrate and witness your 
                    beautiful union. No matter what that looks like I’m here to tell that story.
                </p><br>
                <p>
                    Better known as the one crying on your wedding day. 
                    You’ll find me tearing up at some point, something about watching other people’s love just 
                    gets to me. You’ll also probably find me balancing a camera in one hand, 
                    bouquet in the other and a veil around my neck.
                </p><br>
                <a href="About.html">
                    <button>READ MORE ABOUT ME</button>
                </a>    
            </div>
       </div>
       

       <div class="spacer"></div>
       <hr style="width: 70%; margin-left: 15%;"><br>
       <h1 class="a"><b>WHAT CLIENTS HAVE TO SAY</b></h1><br>
       <hr style="width: 70%; margin-left: 15%;">
       <div class="spacer"></div>
    
       <div class="complete2">
            <?php
            foreach($Sayings as $say){
                printSaying($say[0], $say[1], $say[2]);
            }
            ?>
       </div>
       <div class="spacer"></div>
       <h1 class="b">INTERESTED IN WORKING TOGETHER?</h1><br><br><br>
       <a href="Booking.html"><button class="butoni2">Contact me</button></a>
       <div class="spacer"></div>
    </main>   
        
    <script>
        const slider = document.querySelector('.slider');
        const slides = document.querySelectorAll('.slide');
        let slideIndex = 0;
        let direction = 1; 
    
        function nextSlide() {
            slides.forEach((slide, index) => {
                slide.style.transition = 'transform 1s ease';
                slide.style.transform = `translateX(${-slideIndex * 100}%)`;
            });
    
            slideIndex = slideIndex + direction;
    
            if (slideIndex === slides.length - 1 || slideIndex === 0) {
                direction = -direction;
            }
        }
    
        slides.forEach((slide, index) => {
            slide.style.transition = 'transform 1s ease';
            if (index === slideIndex) {
                slide.style.transform = 'translateX(0)';
            } else {
                slide.style.transform = 'translateX(100%)';
            }
        });
    
        setInterval(nextSlide, 3000);
    </script>
    
    
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

