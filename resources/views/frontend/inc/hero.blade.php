<section class="relative w-full md:py-56 py-36 bg-blue-500">
    <!-- Slider container -->
    <div class="absolute inset-0 w-full h-full">
        <div class="slider">
            <!-- Slides -->
            <div class="mySlides fade">
                <img src="frontend/ac.png" alt="Slider Image 1">
            </div>
            <div class="mySlides fade">
                <img src="frontend/acc.png" alt="Slider Image 2">
                <div class="text">Explore Interactive Features</div>
            </div>
        </div>
    </div>
</section>

<style>
 /* Slider */
.slider {
    max-width: 50%;
    position: relative;
    margin: auto;
    overflow: hidden;
    top: 70px; /* Adjust this value as needed to move the slider down */
}

.mySlides {
    display: none;
    position: relative;
    animation: fade 8s infinite;
    width: 100%; /* Full width of the container */
    height: 100%; /* Full height adjusted */
}

.mySlides img {
    width: 80%; /* Makes the image take full width of the container */
    height: 50%; /* Adjusts height automatically to maintain aspect ratio */
    display: block;
    margin: auto;
    border-radius: 0; /* Removes the border radius to have sharp corners */
    transition: border-color 0.3s ease; /* Smooth transition for hover effects */
}

.mySlides:hover img {
    border: 5px solid #4CAF50; /* Highlight the image on hover with a green border */
}

.text {
    position: absolute;
    bottom: 20px;
    left: 20px;
    color: white;
    font-size: 24px;
    font-weight: bold;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.6); /* Text shadow for better visibility */
}

/* Fading animation */
@keyframes fade {
    0% {opacity: 0}
    20% {opacity: 1}
    80% {opacity: 1}
    100% {opacity: 0}
}



</style>

<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].classList.remove("fade-up"); // Ensure no animation class is present initially
            slides[i].style.display = "none";  
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}    
        slides[slideIndex-1].style.display = "block";  
        slides[slideIndex-1].classList.add("fade-up"); // Add the animation class to start animation
        setTimeout(showSlides, 6000); // Change image every 6 seconds
    }
</script>

