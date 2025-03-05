<style>
    .button-link {
        display: inline-block;
        padding: 3px 5px;
        background-color: transparent;
        color: #000000;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        margin: 2px;
        border: none;
        cursor: pointer;
    }

    .button-link:hover {
        background-color: #0056b3;
    }


    .scrollable-section {
        max-height: calc(90vh + 250px);
        /* Set a fixed height */
        overflow-y: auto;
        /* Enable vertical scrollbar */
        border: 1px solid #ccc;
        /* Optional: Add a border */
        padding: 10px;
        /* Optional: Add padding */
    }

    /* Custom scrollbar */
    .scrollable-section::-webkit-scrollbar {
        width: 3px;
        /* Width of the scrollbar */
    }

    .scrollable-section::-webkit-scrollbar-track {
        background: #f1f1f1;
        /* Color of the track */
    }

    .scrollable-section::-webkit-scrollbar-thumb {
        background: #888;
        /* Color of the scrollbar */
        border-radius: 5px;
        /* Rounded corners */
    }

    .scrollable-section::-webkit-scrollbar-thumb:hover {
        background: #555;
        /* Color of the scrollbar on hover */
    }
</style>

<section id="side-board" class="side-board scrollable-section">
    <div>
        <h2>{{ 'لوحة الإعلانات' }}</h2>

        <section style="border-bottom: 2px solid #0000f4;">
            <div class="side-item" id="offersResultsDev">
                <h5> {{ 'نتائج العروض' }} </h5>

            </div>
            <div>
                <a href="{{ route('web.offers_results.index') }}"> {{ 'عرض المزيد..' }} </a>
            </div>
        </section>

        <section style="border-bottom: 2px solid #0000f4;">
            <div class="side-item" id="purchaseOffersDev">
                <h5> {{ 'الشراء المباشر' }} </h5>

            </div>
            <div>
                <a href="{{ route('web.purchase_offers.index') }}"> {{ 'عرض المزيد..' }} </a>
            </div>
        </section>


        <section style="border-bottom: 2px solid #0000f4;">
            <div class="side-item" id="internalTendersDev">
                <h5> {{ 'الاعلانات الداخلية' }} </h5>

            </div>

            <div>
                <a href="{{ route('web.tenders.AR_index') }}"> {{ 'عرض المزيد..' }} </a>
            </div>
        </section>

        <section style="border-bottom: 2px solid #0000f4;">
            <div class="side-item" id="externalTendersDev">
                <h5> {{ 'الاعلانات الخارجية' }} </h5>

            </div>

            <div>
                <a href="{{ route('web.tenders.EN_index') }}"> {{ 'عرض المزيد..' }} </a>
            </div>
        </section>

    </div>
</section>





<script>
    function getNewsData() {

        var getNewsUrl = "{{ route('web.home.get_news_data') }}";

        $.ajax({
            type: "GET",
            url: getNewsUrl,
            success: function(result) {
                if (result.status_code == 200) {
                    resultData = result.data;

                    offersResults = resultData.offers_results;
                    loadOffersResults(offersResults);

                    purchaseOffers = resultData.purchase_offers;
                    loadPurchaseOffers(purchaseOffers);

                    internalTenders = resultData.internal_tenders;
                    loadInternalTenders(internalTenders);

                    externalTenders = resultData.external_tenders;
                    loadExternalTenders(externalTenders);

                } else {
                    console.error('Data format error: ', result.status_code);
                }
            }
        });
    }
</script>

<script>
    function loadOffersResults(offersResults) {
        $.each(offersResults, function(indexInArray, element) {

            fileRef = `{{ asset('`+element.file+`') }}`;
            fileName = `العرض رقم: ${element.offer_number}، موضوع: ${element.title}`;

            var anchor = $('<a>', {
                href: fileRef,
                html: `<i class="fas fa-download" style="color: green"></i> ${fileName}`, // Add icon and text
                title: fileName,
                class: 'button-link',
            });

            // Append the anchor to a container in the DOM
            $('#offersResultsDev').append(anchor);

        });
    }
</script>

<script>
    function loadPurchaseOffers(purchaseOffers) {
        $.each(purchaseOffers, function(indexInArray, element) {

            offerTitle = `العرض رقم: ${element.offer_number}، موضوع: ${element.material_type}`;

            var p = $('<p>', {
                text: offerTitle,
                // class: 'button-link',
            });

            // Append the anchor to a container in the DOM
            $('#purchaseOffersDev').append(p);

        });
    }
</script>

<script>
    function loadInternalTenders(internalTenders) {
        $.each(internalTenders, function(indexInArray, element) {

            tenderTitle = `الاعلان: ${element.tender_number}، موضوع: ${element.title}`;

            var p = $('<p>', {
                text: tenderTitle,
                // class: 'button-link',
            });

            // Append the anchor to a container in the DOM
            $('#internalTendersDev').append(p);

        });
    }
</script>

<script>
    function loadExternalTenders(externalTenders) {
        $.each(externalTenders, function(indexInArray, element) {

            tenderTitle = `الاعلان: ${element.tender_number}، موضوع: ${element.title}`;

            var p = $('<p>', {
                text: tenderTitle,
                // class: 'button-link',
            });

            // Append the anchor to a container in the DOM
            $('#externalTendersDev').append(p);

        });
    }
</script>
