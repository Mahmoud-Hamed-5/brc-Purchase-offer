@yield('script')

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>

<!-- Bootstrap JS (with Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}

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
