const foot = document.querySelector('.foot')

if (document.body.scrollHeight >= 444) {
    foot.style.display = 'none';
} else {
    foot.style.display = 'block';
}
