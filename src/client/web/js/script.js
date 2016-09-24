function resetActive(event, id, mode) {
    if ( mode == "unfinished" ) {
        document.getElementById(id).style.borderColor = "#C0C0C0";
    }
    else if ( mode == "finised" ) {
        if ( id == "2" && document.getElementById("domain_field").value.length == 0 ) {
            alert('Fill in the blank');
            return;
        }
        else {
            if ( id == "4" ) {
                document.getElementById('target_domain').innerHTML = document.getElementById('domain_field').value;
            }
            document.getElementById(id-1).style.borderColor = "green";
        }
    }

    $("div").each(function () {
        if ($(this).hasClass("activestep")) {
            $(this).removeClass("activestep");
        }
    });

    if (event.target.className == "col-md-3") {
        $(event.target).addClass("activestep");
    }
    else {
        $(event.target.parentNode).addClass("activestep");
    }

    hideSteps();
    showCurrentStepInfo('step-' +id);
}

function hideSteps() {
    $("div").each(function () {
        if ($(this).hasClass("activeStepInfo")) {
            $(this).removeClass("activeStepInfo");
            $(this).addClass("hiddenStepInfo");
        }
    });
}
function showCurrentStepInfo(step) {        
    var id = "#" + step;
    $(id).addClass("activeStepInfo");
}
function submitData() {
    var token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZGVudGl0eSI6ImMwOWFjNzExLTgyYTYtNDE1Zi1iMGI5LTg2NTA3YTM2NDAxMyIsImlhdCI6MTQ3NDcxODk1OSwibmJmIjoxNDc0NzE4OTU5LCJleHAiOjE0NzQ4MDUzNTl9.VB7wbwn2q6Kntsz18xA_a7juCrEA6u-JS6uBUORmSac';
    var domain = document.getElementById('domain_field').value;
    var protocol;
    var port;
    var tmp = $("input[name=protocol]:checked").val();
    if ( tmp == "https" ) protocol = "1";
    else protocol = "0";
    tmp = $("input[name=port]:checked").val();
    if ( tmp == "Other" ) {
        if ( document.getElementById('portText').value.length == 0 ) {
            alert("Need a specific port");
            return;
        }
    }
}

function submitData() {
    var token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZGVudGl0eSI6ImMwOWFjNzExLTgyYTYtNDE1Zi1iMGI5LTg2NTA3YTM2NDAxMyIsImlhdCI6MTQ3NDcxODk1OSwibmJmIjoxNDc0NzE4OTU5LCJleHAiOjE0NzQ4MDUzNTl9.VB7wbwn2q6Kntsz18xA_a7juCrEA6u-JS6uBUORmSac';
    var domain = document.getElementById('domain_field').value;
    var protocol;
    var port;
    var tmp = $("input[name=protocol]:checked").val();
    if ( tmp == "https" ) protocol = "1";
    else protocol = "0";
    tmp = $("input[name=port]:checked").val();
    if ( tmp == "Other" ) {
        if ( document.getElementById('portText').value.length == 0 ) {
            alert("Need a specific port");
            return;
        }
        port = document.getElementById('portText').value;
    }
    else port = tmp;
    var http = new XMLHttpRequest();
    var url = "http://188.166.224.165:5555/domains";
    var e = document.getElementById('sb');
    var params = '{ "url" : "' + domain + '", "description" : "' + e.options[e.selectedIndex].value + '", "port" : "' + port + '", "ssl" : "' + protocol + '" }';
    http.open("POST", url, false);

    http.setRequestHeader("Content-Type", "application/json");
    http.setRequestHeader("Authorization", "JWT " + token);
    http.send(params);
    window.location.replace("domains.php");
}

function enableNext() {
    document.getElementById("success-domain").style.display = 'block';
    document.getElementById("firstNext").disabled = false;
}