<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    $hide = "hide"; 
    
    if (isset($_SESSION['roli']) && $_SESSION['roli'] == "admin") {
        $hide = ""; 
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About-ElaDoe</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Playfair+Display&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Playfair+Display&family=Work+Sans:wght@300&display=swap');
    </style>

    <link rel="stylesheet" href="about.css">
    <link href="https://fonts.cdnfonts.com/css/antro-vectra" rel="stylesheet">
</head>

<body>
    <header>
        <?php include('Header.php'); ?>
    </header>
    <main>
        <div class="bgphoto">
            <h2>ABOUT ME</h2>
        </div>

        <div class="abm">
            <img src="About_Pictures/ElaDoe.jpeg" alt="">
            <div class="textAbMe">
                <h1 style="font-family: 'Dancing Script', cursive; color: gray;">Hey,
                    I'm Ela Doe</h1>
                <p style="overflow: none;">
                    Well hello there! My name is Ela and I'm an adventurous wedding/elopement photographer who lives
                    in Prishtina. I have a love for people who think outside the box and are not afraid to be
                    themselves, and I love being able to capture that on camera. I have a Bachelor's degree in
                    CSE from the University
                    of Bussines and Technology and I'm always listening to a true crime podcast.

                    <br><br>
                    Here are a few things about me!
                    <br><br>
                    The girl who eats stupid amounts of chocolate every day - dark chocolate with sea salt all the way
                    <br>
                    The girl who lives in athleasure wear
                    <br>
                    The girl snuggled under a blanket even when it’s 95 degrees
                    <br>
                    The girl who posts more pictures of her dogs than herself
                    <br>
                    The girl who talks to her parents almost every day
                    <br>
                    The girl who falls asleep during every movie night
                    <br>
                    The girl who “dresses up” a few times a year
                    <br>
                    The girl who would is always down to try something new
                    <br>
                    The girl who wears the same jeans 12 times before washing them
                    <br>
                    The girl who will probably share a new workout program with you because she thinks exercising is fun
                    <br>
                    The girl who would much rather play cards than watch T.V.
                    <br>
                    The girl who over apologizes
                    <br>
                    The girl who will find any excuse to give a gift or do something for you - love languages, anyone?
                    <br>
                    The girl who can’t stand to be late, if she’s not early, she’s already late
                    <br>
                    The girl who's grandma calls “iron Ela” cause she’s always trying a new extreme sport
                    <br>
                    The girl who loves to explore new places
                    <br>
                    The girl who currently is talking in 3rd person, weirdo.
                </p>
            </div>
        </div>

        <div class="travel">

            <div class="t1"><img src="About_Pictures/Travel1.jpg" alt=""></div>
            <div class="t2"><img src="About_Pictures/Travel2.jpg" alt=""></div>
            <div class="t3"><img src="About_Pictures/Travel3.jpg" alt=""></div>
            <div class="t4"><img src="About_Pictures/Travel4.jpg" alt=""></div>

            <div class="travel_title">
                <h1> &emsp;&emsp;&emsp; IF YOU ARE </h1>
                <h1>&emsp;&emsp;<span class="cursive">just like me </span>AND</h1>
                <h1>ITCHING TO <span class="cursive">see the world . . .</span></h1>
            </div>
            <p>
                Traveling is honestly one of my passions. I make it a point to get out and explore this
                beautiful earth
                as often as humanly possible. I am on the move pretty often, so if you happen to be in the
                same place as
                me or if your schedule lines up with my travel dates, we can make your photos happen with no
                travel
                fees! Check out my schedule at the link below!
            </p>
            <h3>AN ELA IN HER NATURAL HABITAT</h3>
            <div class="button">

                <button><a href="travelingSchedule.html">My Travel Schedule</a></button>
            </div>
        </div>
        <div class="best">
            <div id="titlebest">
                <h5>
                    ELOPEMENTS ALLOW ME TO DO WHAT I DO BEST:</h5>
            </div>
            <div class="bestdivs">
                <div>
                    <img src="About_Pictures/best1.jpg" alt="">
                    <p>BE IN AWE OF GORGEOUS SCENERY AS I EXPLORE WITH MY COUPLES THROUGH THE US, EUROPE, AND BEYOND
                        <br>(AND MAYBE MAKE A DAD JOKE OR TWO)
                    </p>
                </div>
                <div>
                    <img src="About_Pictures/best2.jpg" alt="">
                    <p>DEEPLY CONNECT WITH AND CAPTURE THE TRUE DYNAMIC OF EVERY COUPLE I WORK WITH</p>
                </div>
                <div>
                    <img src="About_Pictures/best3.jpg" alt="">
                    <p>TAKE A STEP BACK TO OBSERVE THE REAL CHEMISTRY, AND DIRECT WHEN NEEDED IN ORDER TO GET PHOTOS
                        THAT YOU CAN REALLY FEEL</p>
                </div>
            </div>
        </div>
        <div class="help">
            <ul>
                <li>CONSULTATIONS</li>
                <li>WEDDING DAY COVERAGE</li>
                <li>MEMORIES</li>
                <li>THE DELIVERABLES</li>
            </ul>
        </div>
        <div class="helptxt">
            <div>
                <p>I understand that your day is not just about capturing beautiful images, but also ensuring that
                    everything runs smoothly. While I cannot take the place of a wedding planner (worth their weight in
                    gold), I am here to support you in any way I can.</p>
                <p>From helping you create the perfect photography timeline to offering suggestions for the best
                    locations and lighting for your portraits, I am here to make sure that you have the best possible
                    experience on your wedding day.</p>
            </div>
            <div>
                <p>On your wedding day, my goal is to capture every moment - from the big, emotional moments to the
                    small, candid ones. I want you to relax and enjoy your special day, knowing that every moment is
                    being documented.</p>
                <p>My approach is to capture the natural beauty of your day, without forcing any awkward or
                    uncomfortable poses. So let's have fun, relax, and create beautiful memories together</p>
            </div>
            <div>
                <p>I understand how excited you are to see your wedding photos, so I won't make you wait long. Within 48
                    hours of your special day, I will send you a curated preview of some of the highlights from your
                    wedding.
                </p>
                <p>This way, you can relive the memories while you wait for the full gallery to be completed. Your full
                    gallery will become ready for you within 8-10 weeks after your wedding day.</p>
            </div>
            <div>
                <p>I believe that your wedding day memories should last a lifetime, which is why I provide you with a
                    personalized online gallery of high-resolution digital images after your special day. This gallery
                    will give you easy access to all your wedding day memories, so you can print, download, and share
                    them with your loved ones.</p>
                <p>Whether you want to create a stunning wedding album or simply share the memories on social media, the
                    gallery makes it easy to relive the magic of your special day whenever you want.</p>
            </div>
        </div>

        <div class="work">
        <h1 class="b">INTERESTED IN WORKING TOGETHER?</h1><br><br><br>
        <a href="Booking.html"><button class="butoni2">Contact me</button></a>
        </div>
        
        <?php
        include('aboutdata.php');

        echo '<div id="faq">';
        echo '<h1 style="text-align: center;">FAQ</h1>';
        echo '<div class="faq-container">';
        foreach ($faqItems as $faq) {
            echo '<div class="faq-item">';
            echo '<div class="question">' . $faq["question"] . '</div>';
            echo '<div class="answer">' . $faq["answer"] . '</div>';
            echo '</div>';
        }
        echo '</div>';
        echo '</div>';

        echo '<div class="imgdiv">';
        foreach ($imgDivItems as $imgSrc) {
            echo '<img src="' . $imgSrc . '" alt="">';
        }
        echo '</div>';
        ?>
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