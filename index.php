<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پلتفرم فارسی - FarsiCoder</title>
    
    <!-- استایل‌ها -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/js/codemirror/lib/codemirror.css">
    
    <!-- فونت‌ها -->
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet">
</head>
<body class="dark-theme">
    
    <!-- نوار بالایی -->
    <nav class="navbar bg-dark shadow">
        <div class="container">
            <span class="navbar-brand text-warning fw-bold">FarsiCoder</span>
            <div class="d-flex">
                <button class="btn btn-sm btn-outline-light mx-1" onclick="toggleTheme()">تغییر تم</button>
            </div>
        </div>
    </nav>

    <!-- ویرایشگر کد -->
    <div class="container mt-4">
        <div class="row">
            <!-- پنل ویرایشگر -->
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-header bg-dark text-light">
                        <select id="language" class="form-select bg-dark text-light">
                            <option value="php">PHP</option>
                            <option value="html">HTML</option>
                            <option value="css">CSS</option>
                            <option value="js">JavaScript</option>
                        </select>
                    </div>
                    <div class="card-body p-0">
                        <textarea id="editor"></textarea>
                    </div>
                    <div class="card-footer bg-dark">
                        <button onclick="executeCode()" class="btn btn-success">اجرا (Ctrl+Enter)</button>
                        <button onclick="saveLibrary()" class="btn btn-outline-light">ذخیره کتابخانه</button>
                    </div>
                </div>
            </div>

            <!-- خروجی و کتابخانه‌ها -->
            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="card shadow h-100">
                    <div class="card-header bg-dark text-light">خروجی</div>
                    <div id="output" class="card-body overflow-auto"></div>
                </div>
            </div>
        </div>

        <!-- کتابخانه‌های ابری -->
        <div class="card shadow mt-4">
            <div class="card-header bg-dark text-light">
                <div class="input-group">
                    <input type="text" id="searchCloud" class="form-control bg-dark text-light" placeholder="جستجوی کتابخانه...">
                    <button onclick="searchCloud()" class="btn btn-outline-light">جستجو</button>
                </div>
            </div>
            <div id="cloudResults" class="card-body row"></div>
        </div>
    </div>

    <!-- اسکریپت‌ها -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/codemirror/lib/codemirror.js"></script>
    <script src="assets/js/codemirror/mode/htmlmixed/htmlmixed.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>
