<div class="modal" id="editcomment<?php echo $value['c_id'];?>">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">แก้ไขคอมเม้น</h5>
            <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="comment_edit_save.php" method="post" enctype="multipart/form-data">
                <input type="text" class="form-control mb-2" name="c_text" value="<?php echo $value['c_text'];?>" placeholder="คุณคิดอะไรอยู่">
            <p class="text-right">
                <input type="hidden" name="c_id" value="<?php echo $value['c_id'];?>">
                <button type="submit" class="btn btn-lg btn-primary mt-2 ml-3" name="edit_comment">แก้ไขคอมเม้น</button>
            </p>
        </form>
        </div>
        </div>
    </div>
</div>