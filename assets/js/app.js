// تنظیمات ویرایشگر کد
const editor = CodeMirror.fromTextArea(document.getElementById('editor'), {
    lineNumbers: true,
    mode: 'htmlmixed',
    theme: 'darcula',
    direction: 'rtl',
    lineWrapping: true,
});

// اجرای کد با Ctrl+Enter
document.addEventListener('keydown', (e) => {
    if (e.ctrlKey && e.key === 'Enter') executeCode();
});

// تابع اجرای کد
function executeCode() {
    const code = editor.getValue();
    const language = document.getElementById('language').value;

    fetch('core/execute.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ code, language })
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('output').innerHTML = data.output;
    })
    .catch(error => console.error('خطا:', error));
}

// جستجوی کتابخانه‌های ابری
function searchCloud() {
    const query = document.getElementById('searchCloud').value;
    
    fetch(`api/list.php?search=${encodeURIComponent(query)}`)
    .then(res => res.json())
    .then(libs => {
        const results = document.getElementById('cloudResults');
        results.innerHTML = libs.map(lib => `
            <div class="col-md-6 mb-3">
                <div class="cloud-library-card card p-3">
                    <h5>${lib.name}</h5>
                    <small>نوع: ${lib.type}</small>
                    <div class="mt-2">
                        <button onclick="importLibrary('${lib.url}')" 
                                class="btn btn-sm btn-success">وارد کردن</button>
                        <a href="${lib.url}" target="_blank" 
                           class="btn btn-sm btn-info">مشاهده</a>
                    </div>
                </div>
            </div>
        `).join('');
    });
}

// تغییر تم
function toggleTheme() {
    document.body.classList.toggle('dark-theme');
    editor.setOption('theme', 
        editor.getOption('theme') === 'darcula' ? 'default' : 'darcula'
    );
}
