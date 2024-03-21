<div class="row justify-content-center">
    <a href="user_index.php">
        <div class="btn btn-outline-primary" style="width: 270px;">
            <label>จำนวนโพสต์</label>
            <div><?php include('post_total.php');?></div>
        </div>
    </a>
</div>

<div class="row justify-content-center mt-2">
    <a href="user_list.php">
        <div class="btn btn-outline-primary" style="width: 270px;">
            <label>ผู้ใช้านงานทั้งหมด</label>
            <div><?php include('user_total.php');?></div>
        </div>
    </a>
</div>

<div class="row justify-content-center mt-2">
    <a href="friend_list.php">
        <div class="btn btn-outline-primary" style="width: 270px;">
            <label>เพื่อน</label>
            <div><?php include('friend_total.php');?></div>
        </div>
    </a>
</div>

<div class="row justify-content-center mt-2">
    <a href="friend_ans_list.php">
        <div class="btn btn-outline-primary" style="width: 270px;">
            <label>รอตอบรับการเป็นเพื่อน</label>
            <div><?php include('friend_ans.php');?></div>
        </div>
    </a>
</div>

<div class="row justify-content-center mt-2">
    <a href="friend_unans_list.php">
        <div class="btn btn-outline-primary" style="width: 270px;">
            <label>ยังไม่เพื่อน</label>
            <div><?php include('friend_unans.php');?></div>
        </div>
    </a>
</div>