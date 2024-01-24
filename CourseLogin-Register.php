<?php
include_once 'user.php';
include_once 'userRepository.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElaDoe-CourseLogin</title>
    <link rel="stylesheet" href="CourseLogin-Register.css">
    <meta charset="UTF-8">
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
                <li><a href="Booking.html">Booking</a></li>
            </ul>
        </div>
    </header>

   <div>
        <?php
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $age = $_POST['age'];
            $email = $_POST['email'];
            $password = $_POST['password'];

           $user=new User($name, $surname, $age, $email, $password);
           $userRepository = new UserRepository();
           $userRepository->insertUser($user);
           header('location:dashboard.php');
        }
        
        ?>
   </div>
    <div class="login-form">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

            <h1>Hello! You can register to the course here:</h1>
            <div class="content">
                <div class="input-field">
                    <input type="text" id="name" name="name"placeholder="Name" autocomplete="name" required>
                    <div class="error-message" id="nameError"></div>
                </div>
                <div class="input-field">
                    <input type="text" id="surname" name="surname" placeholder="Surname" autocomplete="surname" required>
                    <div class="error-message" id="surnameError"></div>
                </div>
                <div class="input-field">
                    <input type="text" id="age" name="age" placeholder="Age" autocomplete="age" required>
                    <div class="error-message" id="ageError"></div>
                </div>
                <div class="input-field">
                    <input type="text" id="email" name="email" placeholder="Email" autocomplete="email" required>
                    <div class="error-message" id="emailError"></div>
                </div>
                <div class="input-field">
                    <input type="password" id="password" name="password" placeholder="Password" autocomplete="new-password" required>
                    <div class="error-message" id="passwordError"></div>
                </div>
            </div>
          <div class="action">
            <button type="submit" name="submit">Sign in </button>
          </div>
        </form>
    </div>

    <div class="Teksti">
        <div class="spacer"></div>
        <div class="Info">     
                <hr style="width: 70%; margin-left: 15%;"><br>
                <h2>COURSE LOGIN INFO</h2><br>
                <hr style="width: 70%; margin-left: 15%;"><br>
                <p>
                    This beginner`s photography course will take you to an advanced level in no 
                    time and fill any gaps of knowledge that may be causing you not to reach your full potential. 
                    You’ll be able to use your camera in all the manual modes and apply the knowledge learnt to 
                    any situation. This course will make you feel completely camera confident and ensure your 
                    pictures stack up against any professional-looking photography.
                    For only <b>13$/month</b>, by login in, this course will put an end to any confusion, 
                    whilst giving you accurate and thorough knowledge in photography. And all that <b>ONLINE</b>.
                </p>
        </div><br><br>
        <div class="courseContent">
            <hr style="width: 70%; margin-left: 15%;"><br>
            <h2>TOPICS YOU WILL LEARN DURING THE COURSE:</h2><br>
            <hr style="width: 70%; margin-left: 15%;"><br>
                <p>
                    Some of the topics that you are going to master through this course are:
                    camera kits and recommended equipment, introduction to camera settings, focusing, getting your 
                    pictures pin sharp, composition, lenses, focal lengths, crop and full frame sensors ,metering, ISO,
                    apertures and depth of field, shutter speeds, controlling movement and slow sync flash, balancing exposures,
                    resolution, understanding light and white balance, night photography and...Painting with Light! 
                </p>
        </div><br><br>
        <div class="questions">
                <h3>HOW LONG DOES IT TAKE TO COMPLETE THIS COURSE?</h3><br>
                <hr style="width: 70%; margin-left: 15%;"><br>
                <p>
                    The course can be completed in your own time, at your own pace. 
                    On average someone with a full-time job will take 1 to 2 months to complete the course.
                </p><br>
                <h3>WHAT EQUIPMENT TO I NEED?</h3><br>
                <p>You will need a camera that has manual settings and a standard kit lens. 
                    This is generally a DSLR or mirrorless camera, but some bridge cameras are also fine. 
                    An easy way to tell if your camera is suitable is to look at the top of it and see if it has a 
                    dial with the letter M (for manual) on it. You will also need a tripod.
                </p><br>
                <h3>DO I GET A CERTIFICATE WITH THIS COURSE?</h3><br>
                <p>
                    Yes - On completion of all our all courses, you receive a certificate from The School of Photography.
                </p>
        </div><br><br>
        <hr style="width: 70%; margin-left: 15%;"><br><br>
    </div>

    <div class="fundi">
        <img src="CourseLogin_Pictures/CourseLogin2.jpg" alt="">
        <img src="CourseLogin_Pictures/CourseLogin1.jpg" alt="">
        <img src="CourseLogin_Pictures/CourseLogin3.jpg" alt="">
    </div>
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

    <script>
        let nameRegex = /^[A-Z][a-z]{2,}$/;
        let surnameRegex=/^[A-Z][a-z]{2,}$/;
        let ageRegex=/^(1[4-9]|[2-4]\d|50)$/;
        let emailRegex= /[a-zA-Z.-_]+@+[a-z]+\.+[a-z]{2,3}$/;
        let passwordRegex=/^(?=.*\d.*\d)[A-Za-z\d]{5,8}$/;

        function validateForm(event){
            event.preventDefault(); 
            let nameInput = document.getElementById('name');
            let nameError = document.getElementById('nameError');

            let surnameInput = document.getElementById('surname');
            let surnameError = document.getElementById('surnameError');

            let ageInput=document.getElementById('age');
            let ageError=document.getElementById('ageError');

            let emailInput =document.getElementById('email');
            let emailError=document.getElementById('emailError');

            let passwordInput =document.getElementById('password');
            let passwordError=document.getElementById('passwordError');

            nameError.innerText = '';
            surnameError.innerText = '';
            ageError.innerText='';
            emailError.innerText='';
            passwordError.innerText='';

            if(!nameRegex.test(nameInput.value)){
                nameError.innerText = '*invalid name, must begin with a capital letter';
                return;
            }
            if(!surnameRegex.test(surnameInput.value)){
                surnameError.innerText = '*invalid surname, must begin with a capital letter';
                return;
            }
            if(!ageRegex.test(ageInput.value)){
                ageError.innerText='*You must be between the age of 14-50';
                return;
            }
            if(!emailRegex.test(emailInput.value)){
                emailError.innerText='*Invalid email';
                return;
            }
            if(!passwordRegex.test(passwordInput.value)){
                passwordError.innerText='*Length of the password must be 5-8 characters and include at least 2 numbers';
                return;
            }
            alert('Succesfully registered!');
        }
    </script> 

</body>
</html>