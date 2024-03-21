<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href="index.php" class="navbar-brand">สังคมออนไลน์</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false"
    aria-label="Toggler Navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <form class="d-flex" action="search.php" method="get">
        <input type="search" class="form-control mr-2" name="search" placeholder="ค้นหา">
        <button type="submit" class="btn btn-primary">ค้นหา</button>
    </form>
    <div class="collapse navbar-collapse justify-content-end" id="navbar">
        <ul class="navbar-nav me-auto my-lg my-2 navbar-nav-scroll">
            <li class="nav-item">
                <a class="nav-link" href="index.php">หน้าหลัก</a>
            </li>
            <li class="nav-item">
                <p class="nav-link"><?php  echo $row['a_name'];?></p>
            </li>
        </ul>
    </div>
</nav>