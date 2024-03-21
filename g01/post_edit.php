
<div class="modal" id="editpost<?php echo $value['p_id'];?>">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">แก้ไขโพส</h5>
            <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="post_edit_save.php" method="post" enctype="multipart/form-data">
                <input type="text" class="form-control mb-2" name="p_text" value="<?php echo $value['p_text'];?>" placeholder="คุณคิดอะไรอยู่">
            <div class="row mb-2">
                <div class="col-12">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="p_img">
                        <label class="custom-file-label">รูปภาพ</label>
                    </div>
                </div>
            </div>
            <p class="text-right">
                <input type="hidden" name="p_id" value="<?php echo $value['p_id'];?>">
                <button type="submit" class="btn btn-lg btn-primary mt-2 ml-3" name="edit_post">แก้ไขโพสต์</button>
            </p>
        </form>
        </div>
        </div>
    </div>
</div>