<!-- Edit Modal -->
<style>
    .form-label {
        font-size: 1.1rem;
        font-weight: bold;
        color: darkblue;
    }

    .form-switch .form-check-input {
        width: 3em !important;
        height: 1.5em !important;
        margin-left: 0 !important;
        cursor: pointer !important;
    }

    .form-switch .form-check-input:checked {
        background-color: #28a745;
        border-color: #28a745;
    }

    .form-switch .form-check-input:not(:checked) {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    /* Green label when switch is checked (active) */
    #editPublishStatus:checked~#editPublishStatusLabel {
        font-size: 1.1rem;
        color: #28a745; /* Bootstrap green color */
    }

    /* Red label when switch is unchecked (inactive) */
    #editPublishStatus:not(:checked)~#editPublishStatusLabel {
        font-size: 1.1rem;
        color: #dc3545; /* Bootstrap red color */
    }
</style>

<div class="modal fade" id="offerResultEditModal" tabindex="-1" aria-labelledby="offerResultEditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input type="hidden" id="editId" name="id">

                    <!-- Offer Number and Publish Status on the same line -->
                    <div class="mb-3 d-flex align-items-center gap-3">
                        <div class="flex-grow-1">
                            <label for="editOfferNumber" class="form-label"> {{'رقم الاعلان'}} </label>
                            <input type="text" class="form-control" id="editOfferNumber" name="offerNumber" required>
                        </div>
                        <div>
                            <label for="editPublishStatus" class="form-label">{{ 'حالة النشر' }}</label>
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" id="editPublishStatus" name="publishStatus" role="switch">
                                <label class="form-check-label" for="editPublishStatus" id="editPublishStatusLabel">
                                    {{'متوقف'}}
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Material Type -->
                    <div class="mb-3">
                        <label for="editTitle" class="form-label"> {{'نوع المواد أو الأعمال'}} </label>
                        <input type="text" class="form-control" id="editTitle" name="title" required>
                    </div>

                    <!-- File -->
                    <div class="mb-3">
                        <label for="editFile" class="form-label"> {{'الملف المرفق'}} </label>
                        <span class="text-danger small d-block mt-1"> {{'لا تقم بتحميل ملف اذا لم ترد تعديل الملف الاصلي'}} </span>
                        <input type="file" class="form-control" id="editFile" name="file">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-success w-100"> {{'حفظ التغييرات'}} </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('editPublishStatus').addEventListener('change', function() {
        const publishStatusLabel = document.getElementById('editPublishStatusLabel');
        publishStatusLabel.textContent = this.checked ? 'نشط' : 'متوقف';
    });
</script>
