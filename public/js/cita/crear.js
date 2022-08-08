let $dentista, $date, $specialty, iRadio;
let $hoursMorning, $hoursAfternoon, $titleMorning, $titleAfternoon;

const titleMorning =`En la mañana`;

const titleAfternoon =`En la tarde`;

const noHours =`<h5 class="text-danger">No hay horas disponibles en este momento</h5>`

$(function () {
    $specialty = $('#speciality_id');
    $dentista = $('#dentista');
    $date = $('#date');

    $titleMorning = $('#titleMorning');
    $hoursMorning = $('#hoursMorning');
    $titleAfternoon = $('#titleAfternoon');
    $hoursAfternoon = $('#hoursAfternoon');

    $specialty.change(() => {
        const specialtyId = $specialty.val();
        const url = `/especialidades/${specialtyId}/dentistas`;
        $.getJSON(url, onDentistaLoaded);

    });

    $dentista.change(loadHours);
    $date.change(loadHours);
});

function onDentistaLoaded(dentistas) {
   //console.log(dentista);
    let htmlOptions = '';

    dentistas.forEach(dentista => {
        console.log(dentista);

        htmlOptions += `<option value="${dentista.id}">${dentista.name}</option>`

    });
    $dentista.html(htmlOptions);
   loadHours();
}

function loadHours() {
    const selectedDate = $date.val();
    const dentistaID = $dentista.val();
    console.log('aas',selectedDate);
    console.log(dentistaID);
    const url = `/horario/horas?date=${selectedDate}&&dentista_id=${dentistaID}`;
    $.getJSON(url, displayHours);
}

function displayHours(data) {
    console.log(data);
    let htmlHoursM = '',
        htmlHoursA = '';

    iRadio = 0;

    if (data.morning) {
        const morning_intervalos = data.morning;
        morning_intervalos.forEach(intervalo => {
            htmlHoursM += getRadioIntervaloHTML(intervalo);
        });
    }

    if(!htmlHoursM != "") {
        htmlHoursM+=noHours;
    }

    if (data.afternoon) {
        const afternoon_intervalos = data.afternoon;
        afternoon_intervalos.forEach(intervalo => {
            htmlHoursA += getRadioIntervaloHTML(intervalo);
        });
    }
   if(!htmlHoursA != "") {
        htmlHoursA+=noHours;
    }
    $hoursMorning.html(htmlHoursM);
    $hoursAfternoon.html(htmlHoursA);
    $titleMorning.html(titleMorning);
    $titleAfternoon.html(titleAfternoon);

 }
function getRadioIntervaloHTML(intervalo) {
    const text = `${intervalo.start} - ${intervalo.end}`;

    return `<div class="custom-control custom-radio mb-3">
            <input type="radio" name="interval" id="interval${iRadio}" class="custom-control-input" value="${text}">
            <label for="interval${iRadio++}" class="custom-control-label">
            ${text}
            </label>
            </div>`;
}
