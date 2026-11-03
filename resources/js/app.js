
import 'bootstrap';
import $ from 'jquery';

window.$ = $;
window.jQuery = $;

$(document).ready(function () {

    console.log('JavaScript KursusKu berhasil dimuat');

    function cekKetersediaan(courseId) {

        const availability = $('#availability');
        const message = $('#availability-message');

        if (!courseId) {
            availability.addClass('d-none');
            message.text('');
            return;
        }

        availability
            .removeClass('d-none alert-success alert-danger')
            .addClass('alert-info');

        message.text('Sedang memeriksa ketersediaan kursus...');

        $.ajax({
            url: '/courses/' + courseId + '/availability',
            method: 'GET',
            dataType: 'json',

            success: function (response) {

                availability.removeClass('alert-info');

                if (response.remaining > 0) {
                    availability.addClass('alert-success');

                    message.text(
                        response.course +
                        ' tersedia. Sisa kuota: ' +
                        response.remaining +
                        ' peserta.'
                    );

                } else {
                    availability.addClass('alert-danger');

                    message.text(response.course + ' sudah penuh.');
                }
            },

            error: function (xhr) {

                availability
                    .removeClass('alert-info')
                    .addClass('alert-danger');

                message.text(
                    'Gagal mengambil data. Kode: ' + xhr.status
                );

                console.error(xhr.responseText);
            }
        });
    }

    $('#course_id').on('change', function () {
        cekKetersediaan($(this).val());
    });

    cekKetersediaan($('#course_id').val());

});
