let dp = document.getElementsByClassName('datepicker');

var tempusConfig = {
    today: 'Dnes',
    clear: 'Smazat výběr',
    close: 'Zavřít',
    selectMonth: 'Vybrat měsíc',
    previousMonth: 'Předchozí měsíc',
    nextMonth: 'Další měsíc',
    selectYear: 'Vybrat rok',
    previousYear: 'Předchozí rok',
    nextYear: 'Další rok',
    selectDecade: 'Vybrat dekádu',
    previousDecade: 'Předchozí dekáda',
    nextDecade: 'Další dekáda',
    previousCentury: 'Předchozí století',
    nextCentury: 'Další století',
    pickHour: 'Vybrat hodinu',
    incrementHour: 'Přidat hodinu',
    decrementHour: 'Ubrat hodinu',
    pickMinute: 'Vybrat minutu',
    incrementMinute: 'Přidat minutu',
    decrementMinute: 'Ubrat minutu',
    pickSecond: 'Vybrat vteřinu',
    incrementSecond: 'Přidat vteřinu',
    decrementSecond: 'Ubrat vteřinu',
    selectTime: 'Zvolit čas',
    selectDate: 'Zvolit datum',
    dayViewHeaderFormat: { month: 'long', year: '2-digit' },
    locale: 'cs-CZ',
    startOfTheWeek: 1,
    hourCycle: 'h23',
    dateFormats: {
        L: 'dd. MM. yyyy',
        LT: 'HH:mm'
    }
}

if (dp.length > 0) {
    for (let d = 0; d < dp.length; d++) {
        new tempusDominus.TempusDominus(dp.item(d), {
            localization: {
                ...tempusConfig,
                format: 'L'
            },
            allowInputToggle: true,
            display: {
                viewMode: 'calendar',
                components: {
                    decades: true,
                    year: true,
                    month: true,
                    date: true,
                    hours: false,
                    minutes: false,
                    seconds: false
                }
            }
        });
    }
}