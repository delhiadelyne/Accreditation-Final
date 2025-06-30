<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<footer class="bg-slate-900 text-gray-300">
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Logo and Brand Name -->
            <div>
                <a href="#" class="flex justify-center md:justify-start focus:outline-none">
                    <span class="text-xl font-bold text-white">SCAW</span>
                </a>
                <p class="mt-2 text-gray-400">Streamlining school accreditation in Rwanda.</p>
                <!-- Social Media Icons -->
                <div class="flex justify-center md:justify-start space-x-4 mt-4">
                    <a href="https://facebook.com" class="hover:text-gray-400">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com" class="hover:text-gray-400">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://linkedin.com" class="hover:text-gray-400">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://instagram.com" class="hover:text-gray-400">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>

            <!-- Footer Navigation -->
            <div class="col-span-3 flex justify-around">
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="hover:text-gray-400">Home</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-gray-400">About</a></li>
                    <li><a href="{{ route('getTrades') }}" class="hover:text-gray-400">Training Programs</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-gray-400">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="py-4 border-t border-gray-700 text-center">
        <p class="text-gray-400">&copy; <script>document.write(new Date().getFullYear())</script> SCAW. All rights reserved.</p>
    </div>
</footer>
<style>
    footer i {
    font-size: 1.25rem; /* Size of the social media icons */
}

footer a {
    color: inherit; /* Ensures links inherit the footer's text color */
    text-decoration: none; /* Removes underline from links */
    transition: color 0.3s; /* Smooth transition for hover effects */
}

footer ul {
    list-style-type: none; /* Removes bullet points from list */
}

/* Additional hover effect for social media icons */
footer a:hover {
    color: #4CAF50; /* Changes icon color on hover */
}

</style>