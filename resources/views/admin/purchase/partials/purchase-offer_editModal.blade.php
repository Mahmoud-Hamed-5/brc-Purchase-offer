<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">تعديل المادة أو العمل</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" id="editId" name="id">
                    <div class="mb-3">
                        <label for="editOfferNumber" class="form-label">رقم الاعلان</label>
                        <input type="text" class="form-control" id="editOfferNumber" name="offerNumber" required>
                    </div>
                    <div class="mb-3">
                        <label for="editMaterialType" class="form-label">نوع المواد أو الأعمال</label>
                        <input type="text" class="form-control" id="editMaterialType" name="materialType" required>
                    </div>
                    <div class="mb-3">
                        <label for="editAdDate" class="form-label">تاريخ الإعلان</label>
                        <input type="date" class="form-control" id="editAdDate" name="adDate" required>
                    </div>
                    <div class="mb-3">
                        <label for="editCloseDate" class="form-label">تاريخ الإغلاق</label>
                        <input type="date" class="form-control" id="editCloseDate" name="closeDate" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">حفظ التغييرات</button>
                </form>
            </div>
        </div>
    </div>
</div>
