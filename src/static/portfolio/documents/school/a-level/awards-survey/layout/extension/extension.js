function populateSelects() {
    var selects = document.getElementsByTagName('select');

    var studentNames = [];
    var teacherNames = [];

    studentNames.sort();
    teacherNames.sort();

    for (var i = 0; i < selects.length; i++) {
        var j, opt;

        if (i < 50) {
            for (j = 0; j < studentNames.length; j++) {
                opt = document.createElement('option');
                opt.value = studentNames[j];
                opt.innerHTML = studentNames[j];
                selects[i].appendChild(opt);
            }
        } else {
            for (j = 0; j < teacherNames.length; j++) {
                opt = document.createElement('option');
                opt.value = teacherNames[j];
                opt.innerHTML = teacherNames[j];
                selects[i].appendChild(opt);
            }

        }
    }
}

document.addEventListener('DOMContentLoaded', function () {
    populateSelects();
    $('select').formSelect();
});
