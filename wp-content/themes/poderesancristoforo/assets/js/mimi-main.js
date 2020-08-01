jQuery(document).ready(function($) {
     
    "use strict";
    /*masonry*/
    var arrival_date;
    var leaving_date;

    /*scroll-header*/
    $('#checkin-calendar').datepicker({
                format: 'dd/mm/yyyy',
                inline: true,
                sideBySide: true,
                weekStart: 1,
                startDate: new Date(),
                todayHighlight: true
            }).on('changeDate', function (selected) {

        $('#arrival-day').text('');
        $('#arrival-month').text('');
        $('#arrival-year').text('');
        $('#leaving-day').text('');
        $('#leaving-month').text('');
        $('#leaving-year').text('');



        var chosenDate = new Date(selected.date.valueOf());
        var minDate = new Date(selected.date.valueOf() + (1000 * 60 * 60 * 24 * 1)); /* add 1 day */
        if ($('#checkout-calendar').datepicker('getDate') != null && $('#checkout-calendar').datepicker('getDate').getTime() == chosenDate.getTime()) {
            $('#checkout-calendar').datepicker('setDate', minDate);
        }
        $('#checkout-calendar').datepicker('setStartDate', minDate);

        arrival_date = chosenDate;
        styleTextDate("arrival", chosenDate);

        //alert(month + " " + day + " " + year);

        //alert(chosenDate.toLocaleString('default', { month: 'long' }));
        
        if ($('#checkout-calendar').datepicker('getDate') != null && $('#checkout-calendar').datepicker('getDate').getTime() >  chosenDate.getTime()) {
            evaluatePrice();
        }       
    });

    $('#checkout-calendar').datepicker({
                format: 'dd/mm/yyyy',
                inline: true,
                sideBySide: true,
                startDate: new Date(),
                weekStart: 1
            }).on('changeDate', function (selected) {

                $('#leaving-day').text('');
                $('#leaving-month').text('');
                $('#leaving-year').text('');

            var maxDate = new Date(selected.date.valueOf());

            leaving_date = maxDate;
            styleTextDate("leaving", maxDate);

            //$('#arrival-date').datepicker('setEndDate', maxDate);
        if ($('#checkin-calendar').datepicker('getDate') != null && $('#checkin-calendar').datepicker('getDate').getTime() <  new Date(selected.date.valueOf())) {
            evaluatePrice();
        }
    });

    $('#visits-calendar').datepicker({
                format: 'dd/mm/yyyy',
                inline: true,
                sideBySide: true,
                weekStart: 1,
                startDate: new Date(),
                todayHighlight: true
            }).on('changeDate', function (selected) {

                $('#visits-day').text('');
                $('#visits-month').text('');
                $('#visits-year').text('');
        
        var chosenDate = new Date(selected.date.valueOf());
        

        styleTextDate("visits", chosenDate);

        //alert(month + " " + day + " " + year);

        //alert(chosenDate.toLocaleString('default', { month: 'long' }));       
    });

    
    function styleTextDate(arrivalOrLeavingOrVisits, chosenDate) {

        var month = ("0" + (chosenDate.getMonth() + 1)).slice(-2);
        var day = chosenDate.getDate();
        var year = chosenDate.getFullYear();

        var txtDay = document.createTextNode(day);
        document.getElementById(arrivalOrLeavingOrVisits + "-day").style.border = "none";
        document.getElementById(arrivalOrLeavingOrVisits + "-day").appendChild(txtDay);

        var txtMonth = document.createTextNode(month);
        document.getElementById(arrivalOrLeavingOrVisits + "-month").style.border = "none";
        document.getElementById(arrivalOrLeavingOrVisits + "-month").appendChild(txtMonth);

        var txtYear = document.createTextNode(year);
        document.getElementById(arrivalOrLeavingOrVisits + "-year").style.border = "none";
        document.getElementById(arrivalOrLeavingOrVisits + "-year").appendChild(txtYear);

        if (arrivalOrLeavingOrVisits == 'arrival') {
            document.getElementById('checkin').value = day + "/" + month + "/" + year;
        }
        if (arrivalOrLeavingOrVisits == 'leaving') {
            document.getElementById('checkout').value = day + "/" + month + "/" + year;
        }
        if (arrivalOrLeavingOrVisits == 'visits') {
            document.getElementById('visit-checkin').value = day + "/" + month + "/" + year;
        }
    }    

    function evaluatePrice() {
        var diff = parseInt((leaving_date.getTime()-arrival_date.getTime())/(24*3600*1000));

        $("#total-nights").text(diff);
        var tt = diff*190;
        $("#total-cost").text(tt + " \u20AC");
    }

    // Mail Sections

    $("#reservation-send").submit(function(e){

        e.preventDefault(); // if the clicked element is a link
        //alert($('#total span').text());
        //alert(platform.version);

        var data = { action:'siteWideMessage', mi_name:$('#name').val(), mi_email:$('#email').val(), mi_nationality:$('#nationality').val(), mi_phone:$('#phone').val(), mi_num_people:$('#numPeople').val(), mi_additional_notes: $('#textarea-additional-notes').val(), mi_checkin: $('#checkin').val(), mi_checkout: $('#checkout').val() };
        $.post($("#ajax_url").val(), data, function(response) {
            $('#warning-msg').fadeIn('fast').delay(4000).fadeOut('fast');
        });

    });

    $("#leave-contact-send").submit(function(e){

        e.preventDefault(); // if the clicked element is a link
        //alert($('#total span').text());
        //alert(platform.version);

        var data = { action:'collectMailMessage', mi_email:$('#contact-email').val() };
        $.post($("#ajax_url").val(), data, function(response) {
            $('#thankyou-msg').fadeIn('fast').delay(4000).fadeOut('fast');
            $('#request-contact').attr('disabled',true);
            $('input[type="email"][name="contact-email"]').val('');
        });

    });

    $("#request-visit-send").submit(function(e){

        e.preventDefault(); // if the clicked element is a link
        //alert($('#total span').text());
        //alert(platform.version);

        if ($('#visit-checkin').val() == '') {
            $('#visits-checkin-missing-msg').show();
        } else {
            var data = { action:'requestVisitMessage', mi_name:$('#visit-name').val(), mi_phone:$('#visit-phone').val(), mi_email:$('#visit-email').val(), mi_country:$('#visit-country').val(), mi_num_people:$('#visit-numPeople').val(), mi_city: $('#visit-city').val(), mi_checkin: $('#visit-checkin').val() };
            $.post($("#ajax_url").val(), data, function(response) {
                var tempValue = $(".btn-visits").text();
                $('#visits-checkin-missing-msg').hide();
                $(".btn-visits").text("Thank you");
                setInterval(function(){
                    $(".btn-visits").text(tempValue);
                    $('#visit-phone').val('');
                    $('#visit-email').val('');
                    $('#visit-country').val('');
                    $('#visit-numPeople').val('');
                    $('#visit-city').val('');
                    $('#visit-checkin-privacy').prop('checked','false');
                }, 3000);
                
            });
        }

    });


    $('input[type="email"][name="contact-email"]').on('keypress', function (e) {
        $('#request-contact').attr('disabled',!validateEmail($(this).val()));
    });

    function validateEmail($email) {
      var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
      return emailReg.test( $email );
    }




});
