<!-- Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>


<!-- Fonts -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
{{-- <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet"> --}}

<!-- Style -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js"
    integrity="sha512-2bMhOkE/ACz21dJT8zBOMgMecNxx0d37NND803ExktKiKdSzdwn+L7i9fdccw/3V06gM/DBWKbYmQvKMdAA9Nw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">

<style>

    /* أنماط عامة */
    body {
        font-family: 'Tajawal', Arial, sans-serif;
        /* Use a modern Arabic font */
        margin: 0;
        padding: 0;
        line-height: 1.8;
        color: #333;
        text-align: right;
        background-color: #f9f9f9;
        /* Light background for the page */
    }

    /* الهيدر مع صورة الخلفية */
    header {
        background-image: url('../../assets/images/bg/brc-bg.jpg');
        /* استبدل بمسار الصورة الخاصة بك */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        color: white;
        text-align: center;
        height: 300px;
        /* Default height for smaller screens */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    @media (min-width: 768px) {
        header {
            height: 500px;
            /* Adjust height for larger screens */
        }
    }

    header p {
            font-size: 1.2rem;
            margin: 10px 0 0;
        }

        /* Navigation Bar */
        nav {
            background-color: #333;
            padding: 10px 0;
            text-align: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 1.1rem;
        }

        nav a:hover {
            color: #f4b400;
        }

        /* Main Content Section */
        main {
            max-width: 1400px;
            margin: 20px auto;
            padding: 20px;
            background-color: white; /* White background for the content */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }

        /* Sections Styling */
        section {
            margin-bottom: 40px;
        }

        section h2 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
            border-bottom: 3px solid #f4b400; /* Yellow underline for headings */
            padding-bottom: 10px;
        }

        section p {
            font-size: 1.1rem;
            color: #555;
        }

        section ul {
            list-style-type: none;
            padding: 0;
        }

        section ul li {
            background: #f4f4f4;
            margin: 10px 0;
            padding: 15px;
            border-right: 5px solid #f4b400;
            font-size: 1.1rem;
            color: #333;
        }

        /* Contact Section Enhancements */
        #contact p {
            font-size: 1.1rem;
            color: #555;
        }

        #contact a {
            color: #f4b400;
            text-decoration: none;
        }

        #contact a:hover {
            text-decoration: underline;
        }

        /* Footer */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 40px;
        }

        footer p {
            margin: 0;
            font-size: 1rem;
        }
</style>
