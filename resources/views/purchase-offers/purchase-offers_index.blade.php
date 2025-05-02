@extends('layouts.app')

<style>
    body {
        direction: rtl;
    }

    .top-buttons {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }
</style>

@section('content-body')
    <main>
        <div dir="rtl">
            <div class="container mt-4">

                <section>
                    <div class="card shadow-lg p-4">
                        <h2 class="text-center mb-4">{{ 'عروض المواد أو الأعمال' }}</h2>
                        <div class="table-responsive">
                            <table id="offersTable" class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>{{ 'رقم الاعلان' }}</th>
                                        <th>{{ 'نوع المواد أو الأعمال' }}</th>
                                        <th>{{ 'تاريخ الإعلان' }}</th>
                                        <th>{{ 'تاريخ الإغلاق' }}</th>
                                        <th>{{ 'نسخة عرض السعر' }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchase_offers as $purchase_offer)
                                        <tr>
                                            <td>{{ $purchase_offer->offer_number }}</td>
                                            <td>{{ $purchase_offer->material_type }}</td>
                                            <td>{{ $purchase_offer->ad_date }}</td>
                                            <td>{{ $purchase_offer->close_date }}</td>
                                            <td>
                                                @if ($purchase_offer->file)
                                                    <a href="{{ asset($purchase_offer->file) }}"
                                                        class="btn btn-primary btn-sm" download>تحميل</a>
                                                @else
                                                    <span class="text-muted">{{ 'لا يوجد ملف' }}</span>
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Pagination Controls -->
                            <div id="pagination" class="mt-3 d-flex justify-content-center"></div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
@endsection

@section('script')

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let table = document.getElementById("offersTable");
        let tbody = table.querySelector("tbody");
        let rows = tbody.getElementsByTagName("tr");
        let rowsPerPage = 5; // Change this to adjust how many rows per page
        let currentPage = 1;

        function showPage(page) {
            let start = (page - 1) * rowsPerPage;
            let end = start + rowsPerPage;

            for (let i = 0; i < rows.length; i++) {
                rows[i].style.display = (i >= start && i < end) ? "" : "none";
            }
        }

        function setupPagination() {
            let pageCount = Math.ceil(rows.length / rowsPerPage);
            let paginationContainer = document.getElementById("pagination");
            paginationContainer.innerHTML = "";

            for (let i = 1; i <= pageCount; i++) {
                let btn = document.createElement("button");
                btn.textContent = i;
                btn.classList.add("btn", "btn-sm", "btn-secondary", "mx-1");

                if (i === currentPage) btn.classList.add("btn-primary");

                btn.addEventListener("click", function () {
                    currentPage = i;
                    showPage(currentPage);
                    setupPagination(); // Refresh buttons
                });

                paginationContainer.appendChild(btn);
            }
        }

        showPage(currentPage);
        setupPagination();
    });
</script>
@endsection
