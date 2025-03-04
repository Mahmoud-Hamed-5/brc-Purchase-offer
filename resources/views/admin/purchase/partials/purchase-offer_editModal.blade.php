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

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST">
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
                        <label for="editMaterialType" class="form-label"> {{'نوع المواد أو الأعمال'}} </label>
                        <input type="text" class="form-control" id="editMaterialType" name="materialType" required>
                    </div>

                    <!-- Ad Date and Close Date on the same line -->
                    <div class="mb-3 d-flex align-items-center gap-3">
                        <div class="flex-grow-1">
                            <label for="editAdDate" class="form-label"> {{'تاريخ الإعلان'}} </label>
                            <input type="date" class="form-control" id="editAdDate" name="adDate" required>
                        </div>
                        <div class="flex-grow-1">
                            <label for="editCloseDate" class="form-label"> {{'تاريخ الإغلاق'}} </label>
                            <input type="date" class="form-control" id="editCloseDate" name="closeDate" required>
                        </div>
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
