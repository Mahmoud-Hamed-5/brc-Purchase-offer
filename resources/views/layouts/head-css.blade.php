<!-- Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script> --}}

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
    body {
        font-family: 'Tajawal', Arial, sans-serif;
        /* Use a modern Arabic font */
        margin: 0;
        padding: 0;
        line-height: 1.8;
        color: #333;
        text-align: right;
        background-color: lightsteelblue;
        /* Light background for the page */
    }

    /* Header with Background Image */
    header {
        background-image: url('../../../assets/images/bg/brc-bg.jpg');

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


    /* Main Content Section */
    main {
        max-width: 1400px;
        margin: 20px auto;
        padding: 20px;
        background-color: lightgray;
        /* White background for the content */
        border-radius: 10px;
        /* Rounded corners */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        /* Subtle shadow */
    }

    /* Main container for content and ads board */
    .main-container {
        display: flex;
        flex-direction: row-reverse;
        margin-top: 20px;
    }

    /* Main content */
    .content {
        flex: 1;
        padding: 15px;
    }

    .dropdown-menu a {
        cursor: pointer;
    }
</style>


{{-- Navigation Bar --}}
<style>
    nav {
        background-color: #333;
        padding: 10px 20px;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        /* Allow wrapping on small screens */
        gap: 10px;
    }

    nav a {
        color: white;
        text-decoration: none;
        margin: 5px 10px;
        /* Reduce margin for better spacing */
        font-size: 1.1rem;
        white-space: nowrap;
        /* Prevent text from breaking */
    }

    nav a:hover {
        color: #f4b400;
    }

    /* Make navbar scrollable on very small screens */
    @media screen and (max-width: 600px) {
        nav {
            flex-direction: column;
            /* Stack links vertically on small screens */
        }

        nav a {
            margin: 5px 0;
            display: block;
        }
    }
</style>

{{-- Side Board Style --}}
<style>
    /* Ads board */
    .side-board {
        width: 300px;
        background-color: lightgray;
        padding: 20px;
        box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
        border-left: 1px solid #ddd;
        margin-right: 20px;
        margin-bottom: 35px;
        margin-top: 35px;

        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);

        overflow-y: auto;
        /* Enable vertical scrolling */
    }

    .side-board h2 {
        text-align: center;
        color: black;
        margin-bottom: 20px;
        font-size: 1.8rem;
        border-bottom: 2px solid #f4b400;
        padding-bottom: 10px;
    }

    .side-item {
        margin-bottom: 20px;
        text-align: start;
    }

    .side-item img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        /* Rounded corners for images */
    }

    .side-item p {
        margin-top: 10px;
        font-size: 1.1rem;
        color: black;
        line-height: 1.3;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .main-container {
            flex-direction: column;
            /* Stack content and sidebar on small screens */
        }

        .side-board {
            width: 100%;
            margin-right: 0;
            margin-top: 20px;
            border-left: none;
            box-shadow: none;
        }
    }
</style>

{{-- ul list --}}
<style>
    ul.custom-list {
        list-style-type: none;
        /* Remove default bullets */
    }

    ul.custom-list li::before {
        content: "* ";
        /* Add custom dash */
        margin-right: 5px;
        font-size: 1.5rem;
        color: black;
    }
</style>

<style>
    th,
    td {
        text-align: center;
        vertical-align: middle;
    }
</style>

{{-- Responsive Table on smaller screens --}}
<style>
    @media screen and (max-width: 768px) {
        .table-responsive {
            overflow-x: auto;
        }

        table {
            white-space: nowrap;
        }
    }
</style>

{{-- Back to top Button --}}
<style>
    #back-to-top {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 99;
        font-size: 18px;
        border: none;
        outline: none;
        background-color: #007bff;
        color: white;
        cursor: pointer;
        padding: 10px 15px;
        border-radius: 50%;
    }

    #back-to-top:hover {
        background-color: #0056b3;
    }
</style>

{{-- Loading Spinner --}}
<style>
    /* Loading Spinner */
    #loading-spinner {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.8);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .spinner {
        border: 4px solid #f3f3f3;
        border-top: 4px solid #3498db;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

{{-- Contact Info Section --}}
<style>
    .contact {
        max-width: 1400px;
        margin: 15px auto;
        padding: 20px;
        background-color: lightgray;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Ensure the contact info box is responsive */
    .contact-info {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Improve heading style */
    .contact-info h2 {
        font-size: 2rem;
        color: #333;
        margin-bottom: 20px;
        border-bottom: 3px solid #f4b400;
        padding-bottom: 10px;
    }

    /* Ensure the items are aligned properly */
    .contact-item {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
        flex-wrap: wrap;
        /* Allow text to wrap on smaller screens */
    }

    .contact-icon {
        font-size: 1.5rem;
        margin-left: 10px;
    }

    .contact-item p {
        font-size: 1.1rem;
        color: #555;
        margin: 0;
    }

    /* Ensure links are styled correctly */
    .contact-item a {
        color: #007bff;
        text-decoration: none;
    }

    .contact-item a:hover {
        text-decoration: underline;
    }

    /* 📱 Responsive Fix for Mobile */
    @media screen and (max-width: 768px) {
        .contact {
            padding: 15px;
        }

        .contact-info {
            padding: 15px;
        }

        .contact-info h2 {
            font-size: 1.5rem;
            text-align: center;
        }

        .contact-item {
            flex-direction: column;
            align-items: flex-start;
        }

        .contact-icon {
            font-size: 1.3rem;
            margin-bottom: 5px;
        }
    }
</style>

{{-- Sections Styling --}}
<style>
    section {
        margin-bottom: 10px;
    }

    section h2 {
        text-align: center;
        color: #000000;
        margin-bottom: 20px;
        font-size: 2rem;
        border-bottom: 2px solid #f4b400;
        padding-bottom: 10px;
    }

    section h5 {
        text-align: start;
        color: #ff0000;
        margin-bottom: 20px;
        font-size: 1.5rem;
        padding-bottom: 10px;
    }

    section p {
        font-size: 1.1rem;
        color: #555;
        /* Consistent text color */
        line-height: 1.8;
        /* Consistent line height */
    }

    section ul {
        list-style-type: none;
        padding: 0;
    }

    section ul li {
        margin: 2px 0;
        padding: 5px;
        font-size: 1.3rem;
        color: #333;
    }
</style>

{{-- Footer --}}
<style>
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
