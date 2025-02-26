@yield('script')

<script>
    document.addEventListener('DOMContentLoaded', function () {
    // Show spinner on page load
    document.getElementById('loading-spinner').style.display = 'flex';

    // Hide spinner when the page is fully loaded
    window.addEventListener('load', function () {
        document.getElementById('loading-spinner').style.display = 'none';
    });
});
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
    const backToTopButton = document.getElementById('back-to-top');

    window.addEventListener('scroll', function () {
        if (window.pageYOffset > 300) {
            backToTopButton.style.display = 'block';
        } else {
            backToTopButton.style.display = 'none';
        }
    });

    backToTopButton.addEventListener('click', function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
});
</script>
