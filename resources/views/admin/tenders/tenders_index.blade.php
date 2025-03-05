@extends('layouts.app')

<style>
    body {
        direction: rtl;
    }

    .top-buttons {
        display: flex;
        justify-content: space-between;
        align-items: center;
        /* Vertically center items */
        margin-bottom: 10px;
    }

    .top-buttons .btn {
        margin-top: 10px;
        /* Consistent margin for buttons */
    }

    .top-buttons .form-select {
        width: 150px;
        /* Consistent width for dropdowns */
    }


    .button-link {
        display: inline-block;
        padding: 2px 2px;
        background-color: transparent;
        font-size: small;
        color: #000000;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        margin: 1px;
        border: none;
        cursor: pointer;
    }

    .button-link:hover {
        background-color: #0056b3;
    }
</style>

@section('content-body')
    <main>
        @include('admin.tenders.partials.tender_editModal')

        <div dir="rtl">
            <div class="container mt-4">

                <div class="top-buttons">
                    <a href="{{ route('admin.tenders.create_tender') }}" class="btn btn-primary"
                        style="margin-top: 10px;">{{ __('إضافة بيانات') }}</a>



                    <!-- Filtering Options -->
                    <div class="d-flex align-items-center gap-2">
                        <!-- Publish Status Dropdown -->
                        <select class="form-select" id="filterPublishStatus" style="width: 150px; margin-top: 10px;">
                            <option value="">{{ 'حالة النشر' }}</option>
                            <option value="1">{{ 'نشط' }}</option>
                            <option value="0">{{ 'متوقف' }}</option>
                        </select>

                        <!-- Tender Type Dropdown -->
                        <select class="form-select" id="filterTenderType" style="width: 150px; margin-top: 10px;">
                            <option value="">{{ 'نوع الاعلان' }}</option>
                            <option value="internal">{{ 'داخلي' }}</option>
                            <option value="external">{{ 'خارجي' }}</option>
                        </select>

                        <!-- Filter Button -->
                        <a id="filterButton" class="btn btn-primary" style="margin-top: 10px;">
                            {{ __('تصفية') }}
                        </a>
                    </div>

                    <a href="{{ route('admin.dashboard.index') }}" class="btn btn-secondary"
                        style="margin-top: 10px;">{{ __('لوحة الإدارة') }}</a>

                    <a onclick="document.getElementById('logout-form').submit()" class="btn btn-danger"
                        style="margin-top: 10px;">{{ __('تسجيل خروج') }}</a>

                    <form hidden action="{{ route('admin.auth.logout') }}" method="POST" id="logout-form">
                        @csrf
                    </form>
                </div>

                <section>
                    <div class="card shadow-lg p-4">
                        <h2 class="text-center mb-4"> {{ 'الاعلانات الداخلية والخارجية' }} </h2>

                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th> {{ 'رقم الإعلان' }} </th>
                                    <th> {{ 'نوع الإعلان' }} </th>
                                    <th> {{ 'موضوع الإعلان' }} </th>
                                    <th> {{ 'تفاصيل / شرح' }} </th>
                                    <th> {{ 'التأمينات الأولية' }} </th>
                                    <th> {{ 'قيمة دفتر الشروط' }} </th>
                                    <th> {{ 'موعد الإغلاق' }} </th>
                                    <th> {{ 'حالة النشر' }} </th>
                                    <th> {{ 'المرفقات' }} </th>
                                    <th> {{ 'العمليات' }} </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tenders as $tender)
                                    <tr>
                                        <td>{{ $tender->tender_number }}</td>

                                        <td>
                                            @if ($tender->tender_type == 'internal')
                                                {{ 'داخلي' }}
                                            @else
                                                {{ 'خارجي' }}
                                            @endif
                                        </td>

                                        <td>{{ $tender->title }}</td>
                                        <td>{{ $tender->details }}</td>
                                        <td>{{ $tender->bond_cost_text }} {{ $tender->bond_currency }} </td>
                                        <td>{{ $tender->tender_cost_text }} {{ $tender->tender_cost_currency }} </td>
                                        <td>{{ $tender->close_date }}</td>

                                        <td>
                                            @if ($tender->publish_status)
                                                <span class="badge bg-success">{{ 'نشط' }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ 'متوقف' }}</span>
                                            @endif
                                        </td>

                                        <td>
                                            @if ($tender->attachments->count() > 0)
                                                @foreach ($tender->attachments as $attachment)
                                                    <div class="mt-1">
                                                        <a href="{{ asset($attachment->file_url) }}"
                                                            class="button-link"
                                                            download>
                                                            <i class="fas fa-download" style="color: green"></i>
                                                            {{ $attachment->file_name }}
                                                        </a>
                                                    </div>
                                                @endforeach
                                            @else
                                                <span class="text-muted">{{ 'لا يوجد مرفقات' }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="mt-1">
                                                <button class="btn btn-warning btn-sm"
                                                    onclick="editRecord({{ $tender->id }}, '{{ $tender->tender_type }}', '{{ $tender->tender_number }}',
                                             '{{ $tender->title }}', '{{ $tender->details }}',
                                              '{{ $tender->bond_cost }}', '{{ $tender->bond_currency }}',
                                              '{{ $tender->tender_cost }}', '{{ $tender->tender_cost_currency }}',
                                              '{{ $tender->close_date }}', '{{ $tender->publish_status }}'
                                                , {{ json_encode($tender->attachments) | e('js') }}  )">
                                                    {{ 'تعديل' }}
                                                </button>
                                            </div>
                                            <div class="mt-1">
                                                <form action="{{ route('admin.tenders.delete_tender', $tender->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('هل أنت متأكد؟')">{{ 'حذف' }}</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>

            </div>
        </div>
    </main>
@endsection

@section('script')
    <script>
        function editRecord(id, tender_type, tender_number, title, details, bond_cost, bond_currency, tender_cost,
            tender_currency, close_date, publish_status, attachments) {

            document.getElementById('tenderEditId').value = id;
            // document.getElementById('tenderEditType').value = tender_type;
            document.getElementById('tenderEditTenderNumber').value = tender_number;
            document.getElementById('tenderEditTitle').value = title;

            document.getElementById('tenderEditDetails').value = details;
            document.getElementById('tenderEditBondCost').value = bond_cost;
            document.getElementById('tenderEditBondCurrency').value = bond_currency;
            document.getElementById('tenderEditTenderCost').value = tender_cost;
            document.getElementById('tenderEditTenderCurrency').value = tender_currency;

            document.getElementById('tenderEditCloseDate').value = close_date;
            // document.getElementById('tenderEditPublishStatus').value = publish_status;

            if (tender_type == 'internal') {
                document.getElementById('tenderEditTypeInternal').checked = true;
            } else if (tender_type == 'external') {
                document.getElementById('tenderEditTypeExternal').checked = true;
            }

            // Set the publish status switch and label
            const publishStatusSwitch = document.getElementById('tenderEditPublishStatus');
            const publishStatusLabel = document.getElementById('publishStatusLabel');
            publishStatusSwitch.checked = publish_status == 1 ? 1 : 0; // Set switch state
            publishStatusLabel.textContent = publish_status == 1 ? 'نشط' : 'متوقف'; // Set label text


            // Populate existing files
            const existingFilesContainer = document.getElementById('existingFilesContainer');
            existingFilesContainer.innerHTML = ''; // Clear previous content
            console.log(attachments);
            attachments = JSON.parse(attachments);

            console.log(attachments);

            attachments.forEach(file => {
                const fileDiv = document.createElement('div');
                fileDiv.className = 'd-flex align-items-center gap-2 mb-2';

                // File name
                const fileNameSpan = document.createElement('span');
                fileNameSpan.textContent = file.file_name;
                fileDiv.appendChild(fileNameSpan);

                // Delete button (X mark)
                const deleteButton = document.createElement('button');
                deleteButton.className = 'btn btn-danger btn-sm';
                deleteButton.innerHTML = '&times;'; // X mark
                deleteButton.onclick = function() {
                    fileDiv.remove(); // Remove the file from the UI
                    addHiddenInput(file.id, 'delete'); // Add hidden input to mark the file for deletion
                };
                fileDiv.appendChild(deleteButton);

                // Hidden input to track file status
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = `files[${file.id}]`;
                hiddenInput.value = 'keep'; // Default value
                fileDiv.appendChild(hiddenInput);

                existingFilesContainer.appendChild(fileDiv);
            });


            editRoute =
                "{{ route('admin.tenders.edit_tender', ['tender' => ':tenderId']) }}";
            editRoute =
                editRoute.replace(':tenderId', id);

            document.getElementById('editForm').action = editRoute;
            var editModal = new bootstrap.Modal(document.getElementById('tenderEditModal'));
            editModal.show();
        }

        function addHiddenInput(fileId, action) {
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = `files[${fileId}]`;
            hiddenInput.value = action; // 'delete' or 'keep'
            document.getElementById('editForm').appendChild(hiddenInput);
        }
    </script>

    <script>
        document.getElementById('filterButton').addEventListener('click', function() {
            // Get selected values
            const publishStatus = document.getElementById('filterPublishStatus').value;
            const tenderType = document.getElementById('filterTenderType').value;

            // Construct the filter URL
            let filterUrl = "{{ route('admin.tenders.index') }}?";
            if (publishStatus) {
                filterUrl += `publish_status=${publishStatus}&`;
            }
            if (tenderType) {
                filterUrl += `tender_type=${tenderType}&`;
            }

            // Remove the trailing '&' or '?' if no filters are applied
            filterUrl = filterUrl.replace(/[&?]$/, '');

            // Redirect to the filtered URL
            window.location.href = filterUrl;
        });
    </script>
@endsection
