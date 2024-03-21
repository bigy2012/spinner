<form action="reg_insert.php" method="post">
    <div class="row mb-2">
        <div class="col-4">
            <label for="">ชื่อ :</label>
        </div>
        <div class="col-8">
            <input type="text" name="fname" class="form-control" required>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-4">
            <label for="">นามสกุล :</label>
        </div>
        <div class="col-8">
        <input type="text" name="lname" class="form-control" required>
        </div>
    </div>
    <div class="row mb-2">
    <div class="col-4">
            <label for="">อีเมล :</label>
        </div>
        <div class="col-8">
        <input type="email" name="email" class="form-control" required>
        </div>
    </div>
    <div class="row mb-2">
    <div class="col-4">
            <label for="">รหัสผ่าน :</label>
        </div>
        <div class="col-8">
        <input type="password" name="pass" class="form-control" minlength="8" required>
        </div>
    </div>
    <div class="row mb-2">
    <div class="col-4">
            <label for="">ยืนยันรหัสผ่าน :</label>
        </div>
        <div class="col-8">
        <input type="password" name="passcomf" class="form-control" minlength="8" required>
        </div>
    </div>
    <div class="row md-2">
            <div class="col-4">
                <label for="">เพศ :</label>
            </div>
        <div class="col-4">
            <input type="radio" name="sex" id="sex1" class="form-check" value="M" checked required>
            <label class="form-check-label">ผู้ชาย</label>
        </div>
        <div class="col-4">
            <input type="radio" name="sex" id="sex2" class="form-check" value="F" required>
            <label class="form-check-label">ผู้หญิง</label>
        </div>
       
    </div>
    <button type="submit" class="btn btn-outline-primary col-12" name="reguser">สมัครสมาชิก</button>
</form>