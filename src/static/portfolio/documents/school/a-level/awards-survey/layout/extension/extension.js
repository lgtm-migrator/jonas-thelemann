function populateSelects() {
    var selects = document.getElementsByTagName('select');

    var studentNames = [];
    var teacherNames = [];

    studentNames.sort();
    teacherNames.sort();

    for (var i = 0; i < selects.length; i++) {
        if (i < 50) {
            for (var j = 0; j < studentNames.length; j++) {
                var opt = document.createElement('option');
                opt.value = studentNames[j];
                opt.innerHTML = studentNames[j];
                selects[i].appendChild(opt);
            }
        } else {
            for (var j = 0; j < teacherNames.length; j++) {
                var opt = document.createElement('option');
                opt.value = teacherNames[j];
                opt.innerHTML = teacherNames[j];
                selects[i].appendChild(opt);
            }

        }
    }
}

document.addEventListener('DOMContentLoaded', function(event) {
    populateSelects();
    $('select').material_select();
});
