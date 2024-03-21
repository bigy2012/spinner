
<div class="modal" id="commentpost<?php echo $value['p_id'];?>">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">แสดงความคิดเห็น</h5>
            <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="comment_post_save.php" method="post" enctype="multipart/form-data">
                <input type="text" class="form-control mb-2" name="c_text" placeholder="ข้อความ" required>
            <p class="text-right">
                <input type="hidden" name="p_id" value="<?php echo $value['p_id'];?>">
                <button type="submit" class="btn btn-lg btn-primary mt-2 ml-3" name="comment_post">บันทึก</button>
            </p>
        </form>
        </div>
        </div>
    </div>
</div>