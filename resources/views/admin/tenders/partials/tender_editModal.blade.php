<!-- Edit Modal -->

<style>
    .radio-group {
        display: flex;
        gap: 20px;
        font-family: Arial, sans-serif;
    }

    .radio-label {
        display: flex;
        align-items: center;
        cursor: pointer;
        position: relative;
        padding-left: 30px;
    }

    .radio-input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .radio-custom {
        position: absolute;
        left: 0;
        height: 20px;
        width: 20px;
        background-color: #fff;
        border: 2px solid #ccc;
        border-radius: 50%;
        transition: all 0.3s ease;
    }

    .radio-label:hover .radio-custom {
        border-color: #007bff;
    }

    .radio-input:checked~.radio-custom {
        background-color: #007bff;
        border-color: #007bff;
    }

    .radio-input:checked~.radio-custom::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 10px;
        height: 10px;
        background-color: #fff;
        border-radius: 50%;
    }

    .radio-text {
        margin-left: 10px;
        font-size: 16px;
        color: #333;
    }

    .radio-custom {
        transition: all 0.3s ease;
    }

    .radio-input:checked~.radio-custom {
        transform: scale(1.3);
    }
</style>

<style>
    .form-switch .form-check-input {
        width: 3em;
        /* Adjust width */
        height: 1.5em;
        /* Adjust height */
        margin-left: 0;
        /* Align properly */
        cursor: pointer;
    }

    .form-switch .form-check-input:checked {
        background-color: #28a745;
        /* Green for active */
        border-color: #28a745;
    }

    .form-switch .form-check-input:not(:checked) {
        background-color: #dc3545;
        /* Red for inactive */
        border-color: #dc3545;
    }
</style>

<style>
    .form-label {
        font-size: 1.1rem;
        font-weight: bold;
        color: darkblue;
    }

    /* Green label when switch is checked (active) */
    #tenderEditPublishStatus:checked~#publishStatusLabel {
        font-size: 1.1rem;
        color: #28a745;
        /* Bootstrap green color */
    }

    /* Red label when switch is unchecked (inactive) */
    #tenderEditPublishStatus:not(:checked)~#publishStatusLabel {
        font-size: 1.1rem;
        color: #dc3545;
        /* Bootstrap red color */
    }
</style>

<div class="modal fade" id="tenderEditModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form id="editForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input type="hidden" id="tenderEditId" name="id">

                    <!-- Tender Number and Tender Type on the same line -->
                    <div class="mb-3 d-flex align-items-center gap-3">
                        <div class="flex-grow-1">
                            <label for="tenderEditTenderNumber" class="form-label"> {{ 'رقم الاعلان' }} </label>
                            <input type="text" class="form-control" id="tenderEditTenderNumber" name="tenderNumber"
                                required>
                        </div>
                        <div>
                            <label class="form-label"> {{ 'نوع الاعلان' }} </label>
                            <div class="radio-group">
                                <label class="radio-label">
                                    <input type="radio" id="tenderEditTypeInternal" name="tenderType" value="internal"
                                        class="radio-input">
                                    <span class="radio-custom"></span>
                                    <span class="radio-text"> {{ 'داخلي' }} </span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" id="tenderEditTypeExternal" name="tenderType" value="external"
                                        class="radio-input">
                                    <span class="radio-custom"></span>
                                    <span class="radio-text"> {{ 'خارجي' }} </span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Tender Title -->
                    <div class="mb-3">
                        <label for="tenderEditTitle" class="form-label">{{ 'موضوع الاعلان' }}</label>
                        <input type="text" class="form-control" id="tenderEditTitle" name="tenderTitle" required>
                    </div>

                    <!-- Tender Details as Textarea -->
                    <div class="mb-3">
                        <label for="tenderEditDetails" class="form-label">{{ 'تفاصيل الاعلان' }}</label>
                        <textarea class="form-control" id="tenderEditDetails" name="tenderDetails" rows="4" required></textarea>
                    </div>

                    <!-- Bond Cost and Currency -->
                    <div class="mb-3 d-flex align-items-center gap-3">
                        <div class="flex-grow-1">
                            <label for="tenderEditBondCost" class="form-label"> {{ 'التأمينات الأولية' }} </label>
                            <input type="number" class="form-control" id="tenderEditBondCost" name="bondCost" required>
                        </div>
                        <div>
                            <label for="tenderEditBondCurrency" class="form-label"> {{ 'العملة' }} </label>
                            <select class="form-select" id="tenderEditBondCurrency" name="bondCurrency" required>
                                <option value="SYP">{{ 'ل.س' }}</option>
                                <option value="USD">{{ 'دولار' }}</option>
                                <option value="EUR">{{ 'يورو' }}</option>
                            </select>
                        </div>
                    </div>

                    <!-- Tender Cost and Currency -->
                    <div class="mb-3 d-flex align-items-center gap-3">
                        <div class="flex-grow-1">
                            <label for="tenderEditTenderCost" class="form-label"> {{ 'قيمة دفتر الشروط' }} </label>
                            <input type="number" class="form-control" id="tenderEditTenderCost" name="tenderCost"
                                required>
                        </div>
                        <div>
                            <label for="tenderEditTenderCurrency" class="form-label"> {{ 'العملة' }} </label>
                            <select class="form-select" id="tenderEditTenderCurrency" name="tenderCurrency" required>
                                <option value="SYP">{{ 'ل.س' }}</option>
                                <option value="USD">{{ 'دولار' }}</option>
                                <option value="EUR">{{ 'يورو' }}</option>
                            </select>
                        </div>
                    </div>

                    <!-- Close Date and Publish Status Switch -->
                    <div class="mb-3 d-flex align-items-center gap-3">
                        <!-- Close Date -->
                        <div class="flex-grow-1 w-50">
                            <label for="tenderEditCloseDate" class="form-label"> {{ 'تاريخ الإغلاق' }} </label>
                            <input type="date" class="form-control" id="tenderEditCloseDate" name="closeDate"
                                required>
                        </div>

                        <!-- Publish Status Switch -->
                        <div class="w-50">
                            <label for="tenderEditPublishStatus" class="form-label">{{ 'حالة النشر' }}</label>
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" id="tenderEditPublishStatus"
                                    name="publishStatus" role="switch">
                                <label class="form-check-label" for="tenderEditPublishStatus"
                                    id="publishStatusLabel">
                                    متوقف
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Existing Files Section -->
                    <div class="mb-3">
                        <label class="form-label"> {{ 'الملفات المرفقة' }} </label>
                        <div id="existingFilesContainer">
                            <!-- Existing files will be dynamically added here -->
                        </div>
                    </div>

                    <!-- Add New Files -->
                    <div class="mb-3">
                        <label for="newFiles" class="form-label"> {{ 'إضافة ملفات جديدة' }} </label>
                        <input type="file" class="form-control" id="newFiles" name="newFiles[]" multiple>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-success w-100"> {{ 'حفظ التغييرات' }} </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('tenderEditPublishStatus').addEventListener('change', function() {
        const publishStatusLabel = document.getElementById('publishStatusLabel');
        publishStatusLabel.textContent = this.checked ? 'نشط' : 'متوقف';
        this.value = this.checked ? '1' : '0';
    });
</script>
