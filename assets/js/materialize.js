document.addEventListener('DOMContentLoaded', function() {
    M.AutoInit();
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
});
