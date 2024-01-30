<?php
session_start();
include 'header.php';
?>

    <form>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="surname">Surname:</label>
        <input type="text" id="surname" name="surname" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <input type="submit" value="Submit">
    </form>
    <script>
       
    document.addEventListener('DOMContentLoaded', function () {
       
        var contactForm = document.getElementById('contactForm');

        contactForm.addEventListener('submit', function (event) {
            event.preventDefault(); 

            
            var formData = new FormData(contactForm);

           
            fetch('url', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
              
                console.log(data);
                alert('Forma u dergua me sukses!');
            })
            .catch(error => {
                console.error(error);
                alert('Diqka shkoi keq. Ju lutemi provoni perseri.');
            });
        });
    });



    </script>

</body>
</html>
<?php
include 'footer.php'
?>
