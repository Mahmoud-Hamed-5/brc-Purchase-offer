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
    /* أنماط عامة */
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

    /* الهيدر مع صورة الخلفية */
    header {
        background-image: url('../../../assets/images/bg/brc-bg.jpg');
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
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        padding: 10px 20px;
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
        background-color: lightgray;
        /* White background for the content */
        border-radius: 10px;
        /* Rounded corners */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        /* Subtle shadow */
    }

    /* Sections Styling */
    section {
        margin-bottom: 10px;
    }

    section h2 {
        text-align: center;
        color: #000000;
        /* Consistent heading color */
        margin-bottom: 20px;
        font-size: 2rem;
        /* Slightly smaller than main content headings */
        border-bottom: 2px solid #f4b400;
        /* Yellow underline for headings */
        padding-bottom: 10px;
    }

    section h5 {
        text-align: start;
        color: #ff0000;
        /* Consistent heading color */
        margin-bottom: 20px;
        font-size: 1.5rem;
        /* Slightly smaller than main content headings */
        /* border-bottom: 2px solid #0000f4; */
        /* Yellow underline for headings */
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

    .contact {
        max-width: 1400px;
        margin: 15px auto;
        padding: 20px;
        background-color: lightgray;
        /* White background for the content */
        border-radius: 10px;
        /* Rounded corners */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        /* Subtle shadow */
    }

    /* Contact Info Section */
    .contact-info {
        background-color: #ffffff;
        /* White background */
        padding: 20px;
        border-radius: 10px;
        /* Rounded corners */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        /* Subtle shadow */

    }

    .contact-info h2 {
        font-size: 2rem;
        color: #333;
        /* Consistent heading color */
        margin-bottom: 20px;
        border-bottom: 3px solid #f4b400;
        /* Yellow underline for headings */
        padding-bottom: 10px;
    }

    .contact-item {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
        /* Space between items */
    }

    .contact-icon {
        font-size: 1.5rem;
        /* color: #f4b400; */
        /* Yellow accent color for icons */
        margin-left: 10px;
        /* Space between icon and text */
    }

    .contact-item p {
        font-size: 1.1rem;
        color: #555;
        /* Consistent text color */
        margin: 0;
        /* Remove default margin */
    }

    .contact-item a {
        color: #007bff;
        /* Blue color for links */
        text-decoration: none;
        /* Remove underline */
    }

    .contact-item a:hover {
        text-decoration: underline;
        /* Underline on hover */
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

    /* Back to Top Button */
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



    /* Main container for content and ads board */
    .main-container {
        display: flex;
        flex-direction: row-reverse;
        /* Reverse the flex direction */
        margin-top: 20px;
        /* Adjust as needed */
        /* height: calc(100vh - 150px); */
        /* Full viewport height minus header/footer height */
    }

    /* Main content */
    .content {
        flex: 1;
        /* Take remaining space */
        padding: 15px;
    }

    /* Ads board */
    .side-board {
        width: 300px;
        /* Adjust ads board width */
        background-color: lightgray;
        /* Consistent background color */
        padding: 20px;
        /* Consistent padding */
        box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
        /* Shadow on the left */
        border-left: 1px solid #ddd;
        /* Optional: Add a border */
        margin-right: 20px;
        /* Space between content and sidebar */

        margin-bottom: 35px;
        margin-top: 35px;

        border-radius: 10px;
        /* Rounded corners */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        /* Subtle shadow */

        overflow-y: auto;
        /* Enable vertical scrolling */
    }

    .side-board h2 {
        text-align: center;
        color: black;
        /* Consistent heading color */
        margin-bottom: 20px;
        font-size: 1.8rem;
        /* Slightly smaller than main content headings */
        border-bottom: 2px solid #f4b400;
        /* Yellow underline for headings */
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
        /* Consistent text size */
        color: black;
        /* Consistent text color */
        line-height: 1.3;
        /* Consistent line height */
    }



    /* Responsive Design */
    @media (max-width: 768px) {
        .main-container {
            flex-direction: column;
            /* Stack content and sidebar on small screens */
        }

        .side-board {
            width: 100%;
            /* Full width on small screens */
            margin-right: 0;
            /* Remove margin on small screens */
            margin-top: 20px;
            /* Space between content and sidebar */
            border-left: none;
            /* Remove border on small screens */
            box-shadow: none;
            /* Remove shadow on small screens */
        }
    }

    .dropdown-menu a {
        cursor: pointer;
    }

</style>

<style>
    ul.custom-list {
        list-style-type: none; /* Remove default bullets */
    }
    ul.custom-list li::before {
        content: "* "; /* Add custom dash */
        margin-right: 5px;
        font-size: 1.5rem;
        color: black;
    }
</style>

<style>
    th , td {
        text-align: center;
        vertical-align: middle;
    }
</style>
