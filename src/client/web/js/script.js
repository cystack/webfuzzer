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

function enableNext() {
    document.getElementById("success-domain").style.display = 'block';
    document.getElementById("firstNext").disabled = false;
}