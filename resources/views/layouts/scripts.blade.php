
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<!-- Bootstrap JS (with Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

<!--
Spinner
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Show spinner on page load
            document.getElementById('loading-spinner').style.display = 'flex';

            // Hide spinner when the page is fully loaded
            window.addEventListener('load', function() {
                document.getElementById('loading-spinner').style.display = 'none';
            });
        });
    </script>

-->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const backToTopButton = document.getElementById('back-to-top');

        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopButton.style.display = 'block';
            } else {
                backToTopButton.style.display = 'none';
            }
        });

        backToTopButton.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
</script>

<script>
    function load_content(component) {

         // Check if the current URL is not the root URL
         if (window.location.pathname !== '/') {
            // Redirect to the root URL
            window.location.href = '/';
            // return; // Stop further execution
        }

        // Hide all components first
        document.querySelectorAll('#main-content > section').forEach(el => {
            el.style.display = 'none';
        });

        // Show the requested component
        const componentEl = document.getElementById(`${component}-component`);
        if (componentEl) {
            componentEl.style.display = 'block';
        } else {
            console.error(`Component "${component}" not found.`);
        }
    }
</script>

<script>
    $(document).ready(function() {
        getNewsData();
    });
</script>
