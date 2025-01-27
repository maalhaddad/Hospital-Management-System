 <script>
        $('#delete_doctor').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var doctor_id = button.data('doctor_id')
            var modal = $(this)
            modal.find('.modal-body #doctor_id').val(doctor_id);

        });

        $('#update_status').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var doctor_id = button.data('doctor_id')
            var modal = $(this)
            modal.find('.modal-body #doctor_id').val(doctor_id);

        });

        $('#update_password').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var doctor_id = button.data('doctor_id')
            var doctor_name = button.data('doctor_name')
            console.log(doctor_name)
            var modal = $(this)
            modal.find('.modal-body #doctor_id').val(doctor_id);
            $('#doctor-name').text(doctor_name);

        });
    </script>